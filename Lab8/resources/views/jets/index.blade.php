@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Jets</h1>
        <form action="{{ route('jets.index') }}" method="GET" class="mb-3">
            <input type="text" name="search" placeholder="Search by name or model" value="{{ request('search') }}" class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>
        <a href="{{ route('jets.create') }}" class="btn btn-success mb-3">Add Jet</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Capacity</th>
                <th>Hourly Rate</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jets as $jet)
                <tr>
                    <td>{{ $jet->name }}</td>
                    <td>{{ $jet->model }}</td>
                    <td>{{ $jet->capacity }}</td>
                    <td>${{ $jet->hourly_rate }}</td>
                    <td>
                        <a href="{{ route('jets.show', $jet->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('jets.edit', $jet->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jets.destroy', $jet->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $jets->links() }}
    </div>
@endsection
