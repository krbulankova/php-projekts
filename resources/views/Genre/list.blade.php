@extends('layout')

@section('title', $title)

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">{{ $title }}</h2>

            @if (count($items) > 0)

                <table class="table table-striped table-hover table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $genre)

                        <tr>
                            <td>{{ $genre->id }}</td>
                            <td>{{ $genre->name }}</td>
                            <td>
                                <a href="/genre/edit/{{ $genre->id }}" class="btn btn-outline-primary">Edit</a>
                                <a href="/genre/delete/{{ $genre->id }}"
                                   class="btn btn-outline-danger link-delete">Delete</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @else

                <p>No genres :(</p>

            @endif

            <a href="/genre/create" class="btn btn-primary mt-4">Add genre</a>
        </div>
    </div>

@endsection
