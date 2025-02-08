
@extends('layout')
@section('content')
    <form action="{{route('hotels.update', $hotel->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-2">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')??$hotel->name}}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" value="{{old('location')??$hotel->location}}">
        </div>
        <div class="mb-2">
            <a href="{{route('hotels.index')}}" class="btn btn-info">Back</a>
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
@endsection
