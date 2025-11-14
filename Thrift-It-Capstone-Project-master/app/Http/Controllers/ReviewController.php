<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\View\View;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }
    
    public function index(){

        $submittedReviews = $this->reviewService->getSubmittedReviews(Auth::id());

        return view('reviews.index',compact('submittedReviews'));
    }


    public function create(User $user): View
    {
        if ($user->id === Auth::id()) {
            abort(403, 'You cannot review yourself.');
        }

        return view('reviews.create', compact('user'));
    }

    public function store(StoreReviewRequest $request, User $user){

       $result = $this->reviewService->createReviewWithValidation(Auth::id(), $user->id, $request->validated());

       if (isset($result['error'])) {
           return redirect()->back()->withError($result['error']);
       }

       return redirect()->route('dashboard')->with('success','Review submitted successfully!');
    }
    

    public function show(Review $review){

        $review = $this->reviewService->getReviewWithRelations($review->id);

        return view('reviews.show',compact('review'));
    }
}
