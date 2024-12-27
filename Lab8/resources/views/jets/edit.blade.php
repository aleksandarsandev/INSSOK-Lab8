@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Jet</h1>
        <form action="{{ route('jets.update', $jet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $jet->name }}" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control" value="{{ $jet->model }}" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="form-control" min="1" value="{{ $jet->capacity }}" required>
            </div>
            <div class="form-group">
                <label for="hourly_rate">Hourly Rate</label>
                <input type="number" step="0.01" name="hourly_rate" id="hourly_rate" class="form-control" min="0.01" value="{{ $jet->hourly_rate }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Jet</button>
        </form>
    </div>
@endsection
