<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the 'status' filter from the query parameters
        $status = $request->query('status');

        // Fetch reviews, filter by status if provided
        $reviews = Review::when($status, function ($query, $status) {
            $query->where('status', $status);
        })->paginate(10); // Paginate to show results in pages

        // Pass the current status filter and reviews to the view
        return view('reviews.index', compact('reviews', 'status'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jet_id' => 'required|exists:jets,id',
            'reviewer_name' => 'required|string|max:255',
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($validated);

        return redirect()->route('jets.show', $validated['jet_id'])->with('success', 'Review submitted!');
    }

    public function changeStatus(Review $review, $status)
    {
        if (in_array($status, ['approved', 'declined'])) {
            $review->update(['status' => $status]);
            return redirect()->back()->with('success', 'Review status updated!');
        }

        return redirect()->back()->with('error', 'Invalid status!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
