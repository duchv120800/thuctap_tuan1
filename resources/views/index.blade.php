@extends('layout')

@section('content')
    <h1>List</h1>
    <table class="table">
        <thead>
            <th>#Id</th>
            <th>Name</th>
            <th>Location</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{$hotel->id}}</td>
                    <td>{{$hotel->name}}</td>
                    <td>{{$hotel->location}}</td>
                    <td>
                        <a href="" class="btn btn-info">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$hotels->links()}}
@endsection