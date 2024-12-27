@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $jet->name }}</h1>
        <p><strong>Model:</strong> {{ $jet->model }}</p>
        <p><strong>Capacity:</strong> {{ $jet->capacity }}</p>
        <p><strong>Hourly Rate:</strong> ${{ $jet->hourly_rate }}</p>
        <a href="{{ route('jets.index') }}" class="btn btn-secondary">Back</a>

        <h2>Reviews</h2>
        <form action="{{ route('reviews.store') }}" method="POST" class="mb-3">
            @csrf
            <input type="hidden" name="jet_id" value="{{ $jet->id }}">
            <div class="form-group">
                <label for="reviewer_name">Your Name</label>
                <input type="text" name="reviewer_name" id="reviewer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="text">Review</label>
                <textarea name="text" id="text" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Reviewer Name</th>
                <th>Text</th>
                <th>Rating</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jet->reviews as $review)
                <tr>
                    <td>{{ $review->reviewer_name }}</td>
                    <td>{{ $review->text }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->status }}</td>
                    <td>
                        <form action="{{ route('reviews.changeStatus', ['review' => $review->id, 'status' => 'approved']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('reviews.changeStatus', ['review' => $review->id, 'status' => 'declined']) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
