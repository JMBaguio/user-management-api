<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Events\CommentNotification;
use App\Models\Donation;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use Exception;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        try {
            $comment = $this->commentService->createComment([
                'user_id'     => Auth::id(),
                'product_id'  => $request->product_id,   // null for donation comments
                'donation_id' => $request->donation_id,  // null for product comments
                'content'     => $request->content,
                'parent_id'   => $request->parent_id,
            ]);

            // Clear cache for this product's comments
            if ($request->product_id) {
                Cache::forget("product_{$request->product_id}_comments");
                Cache::forget("product_{$request->product_id}_with_comments");
                
                $product = Product::find($request->product_id);

            if ($product && $product->user_id !== Auth::id()) {
                // Save notification to DB
               Notification::create([
                    'user_id' => $product->user_id,
                    'type'    => 'comment',
                    'data'    => [
                    'from_user'  => Auth::user()->fname . ' ' . Auth::user()->lname,
                    'content'    => $comment->content,
                    'product_id' => $product->id,
                    ],
                ]);

                // Fire real-time event
                broadcast(new CommentNotification($comment, $product->user_id))->toOthers();
            }
            }
            
            // Clear cache for this donation's comments
            if ($request->donation_id) {
                Cache::forget("donation_{$request->donation_id}_comments");
                Cache::forget("donation_{$request->donation_id}_with_comments");

                $donation = Donation::find($request->donation_id);

                if ($donation && $donation->user_id !== Auth::id()) {
                    // Save notification to DB
                    Notification::create([
                        'user_id' => $donation->user_id,
                        'type'    => 'comment',
                        'data'    => [
                            'from_user'   => Auth::user()->fname . ' ' . Auth::user()->lname,
                            'content'     => $comment->content,
                            'donation_id' => $donation->id,
                        ],
                    ]);
    
                    // Fire real-time event
                    broadcast(new CommentNotification($comment, $donation->user_id))->toOthers();
                }
            }

            if ($request->expectsJson()) {
                $comment->load('user');
                return response()->json([
                    'success' => true,
                    'comment' => [
                        'id'        => $comment->id,
                        'content'   => $comment->content,
                        'created_at'=> $comment->created_at,
                        'parent_id' => $comment->parent_id, // 👈 add this
                        'user'      => [
                            'id'    => $comment->user->id,
                            'fname' => $comment->user->fname,
                            'lname' => $comment->user->lname,
                            'verification_status' => $comment->user->verification_status,
                            'profile_pic_url'      => $comment->user->profile_pic
                                            ? Storage::disk('s3')->url($comment->user->profile_pic)
                                            : asset('images/default-profile.jpg'),
                        ],
                    ],
                ], 201);
            }
            

            return redirect()->back();
        } catch (Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 422);
            }
            
            return redirect()->back()->withErrors(['content' => $e->getMessage()]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comment = $this->commentService->getCommentById($id);
    
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $comment = $this->commentService->getCommentById($id);

    if ($comment->user_id !== Auth::id()) {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized action.'], 403);
        }
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    // Update comment
    $this->commentService->updateComment($id, [
        'content' => $request->input('content'),
    ]);

    // Clear cache for this product's comments
    if ($comment->product_id) {
        Cache::forget("product_{$comment->product_id}_comments");
        Cache::forget("product_{$comment->product_id}_with_comments");
    }
    
    // Clear cache for this donation's comments
    if ($comment->donation_id) {
        Cache::forget("donation_{$comment->donation_id}_comments");
        Cache::forget("donation_{$comment->donation_id}_with_comments");
    }
    
    // Clear all comment-related cache
    Cache::flush();

    // Reload the updated comment so we send fresh data
    $comment->refresh();

    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'comment' => [
                'id'      => $comment->id,
                'content' => $comment->content,
            ],
        ]);
    }

    // Fallback for non-AJAX with cache control headers
    return redirect()->back()
        ->with('success', 'Comment updated successfully!')
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized action.'], 403);
            }
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Clear cache for this product's comments
        if ($comment->product_id) {
            Cache::forget("product_{$comment->product_id}_comments");
            Cache::forget("product_{$comment->product_id}_with_comments");
        }
        
        // Clear cache for this donation's comments
        if ($comment->donation_id) {
            Cache::forget("donation_{$comment->donation_id}_comments");
            Cache::forget("donation_{$comment->donation_id}_with_comments");
        }
        
        // Clear all comment-related cache
        Cache::flush();

        $this->commentService->deleteComment($comment->id);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true
            
            ]);
        }

        return redirect()->back()->with('success');
    }
}