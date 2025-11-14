<?php

namespace App\Http\Controllers;

use App\Services\DonationService;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Http\Requests\SubmitProofAction as SubmitProofRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Donation;
use App\Models\Comment;
use App\Models\Barangay;
use App\Models\DonationImage;
use Illuminate\Http\RedirectResponse;

class DonationController extends Controller
{

    protected $donationService;
    public function __construct(DonationService $donationService)
    {
        $this->donationService = $donationService;
    }
    public function index(): View
    {
        $donations = $this->donationService->getDonationsByUser(Auth::id());
        return view('donations.index', compact('donations'));
    }
  
    public function create()
    {
        $categories = Categories::all(); 
        $barangays = Barangay::all();

        return view('donations.create', compact('categories','barangays'));
    }

    /**
     * Store a newly created resource in storage.
     */
   
    public function store(StoreDonationRequest $request)
    {
        // Validate request data
        $validated = $request->validated();

        // Attach authenticated user ID
        $validated['user_id'] = Auth::id();

        // Handle images safely (if any)
        $images = $request->hasFile('images') ? $request->file('images') : [];

        // Create donation via service layer
        $this->donationService->createDonation($validated, $images);

        // Redirect with success message
        return redirect()
            ->route('donations.index')
            ->with('success', 'Donation created successfully!');
    }


    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Cache::forget("donation_{$id}_comments");
        Cache::forget("donation_{$id}_with_comments");

        $donation = Donation::with(['user', 'category', 'donationImages'])->findOrFail($id);
        $allComments = Comment::with(['user'])
            ->where('donation_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        $byParent = $allComments->groupBy('parent_id');
        $topLevel = $byParent->get(null, collect())->sortByDesc('created_at')->values();

        $topLevel->each(function ($root) use ($byParent) {
            $flatReplies = collect();
            $stack = [];
            foreach ($byParent->get($root->id, collect()) as $child) {
                $flatReplies->push($child);
                $stack[] = $child;
            }
            while (!empty($stack)) {
                $node = array_pop($stack);
                foreach ($byParent->get($node->id, collect()) as $child) {
                    $flatReplies->push($child);
                    $stack[] = $child;
                }
            }
            $root->setRelation('replies', $flatReplies);
        });

        $donation->setRelation('comments', $topLevel);

        $moreDonations = $this->donationService->getMoreDonationsByUser($donation->user_id, $donation->id);

        return response()
            ->view('donations.show', compact('donation', 'moreDonations'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0')
            ->header('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT')
            ->header('ETag', md5(serialize($donation->comments)));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $categories = Categories::all();
       $donation = $this->donationService->getDonationById($id);
    
       return view('donations.edit', ['donation' => $donation, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(UpdateDonationRequest $request, Donation $donation)
    {
        // 1️⃣ Validate request
        $validated = $request->validated();

        // 2️⃣ Prepare images array for service
        $images = [
            'main' => $request->file('image'),       // Main product image
            'gallery' => $request->file('images', []) // Gallery images
        ];

        // 3️⃣ Call service to handle update including S3 uploads
        $this->donationService->updateDonation($donation, $validated, $images);

        // 4️⃣ Handle deletion of gallery images if any
        $deleteIds = collect($request->input('deletedImages', []))
            ->map(fn($id) => (int)$id)
            ->filter()
            ->unique()
            ->values()
            ->all();

        if (!empty($deleteIds)) {
            $imagesToDelete = $donation->donationImages()->whereIn('id', $deleteIds)->get(['id', 'image']);
            foreach ($imagesToDelete as $img) {
                if ($img->image && Storage::disk('s3')->exists($img->image)) {
                    Storage::disk('s3')->delete($img->image);
                }
            }
            DonationImage::where('donation_id', $donation->id)->whereIn('id', $deleteIds)->delete();
        }

        // 5️⃣ Redirect with success message
        return redirect()->route('donations.show', $donation)
            ->with('success', 'Donation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donation = $this->donationService->getDonationById($id);
        $donation->delete();
        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully!');
    }

    public function getAllDonations()
    {
        $donations = $this->donationService->getApprovedDonations();
        return view('donations.donation-hub', compact('donations'));
    }

    public function markAsDonated(SubmitProofRequest $request, Donation $donation): RedirectResponse
    {
        // Store proof image
        $proofPath = $request->file('proof')->store('proofs', 'public');

        $this->donationService->updateDonation($donation, [
            'proof' => $proofPath,
            'verification_status' => 'pending',
        ]);

        return redirect()
            ->route('donations.index')
            ->with('success', 'Proof submitted successfully! Awaiting admin verification to redeem points.');
    }

}
