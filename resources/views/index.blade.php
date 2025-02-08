@extends('layout')

@section('content')
    <h1>List</h1>
    <a href="{{ route('hotels.create') }}" class="btn btn-success">Add new +</a>
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
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->location }}</td>
                    <td>
                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $hotels->links() }}
@endsection
