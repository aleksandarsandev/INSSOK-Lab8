@extends('layouts.app')

@section('title', 'Reviews')

@section('content')
    <h1>Reviews</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('reviews.index') }}" class="mb-4">
        <label for="status">Filter by Status:</label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="declined" {{ request('status') == 'declined' ? 'selected' : '' }}>Declined</option>
        </select>
    </form>

    <!-- Reviews Table -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Reviewer Name</th>
            <th>Jet Name</th>
            <th>Text</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @forelse($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->reviewer_name }}</td>
                <td>{{ $review->jet->name }}</td>
                <td>{{ $review->text }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ ucfirst($review->status) }}</td>
                <td>{{ $review->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No reviews found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $reviews->links() }}
@endsection
