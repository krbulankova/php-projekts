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
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Published</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $book)

                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->genre->name }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ Str::limit($book->description, 64) }}</td>
                            <td>{!! $book->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
                            <td>
                                <a href="/books/edit/{{ $book->id }}" class="btn btn-outline-primary">Edit</a>
                                <a href="/books/delete/{{ $book->id }}"
                                   class="btn btn-outline-danger link-delete">Delete</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @else

                <p>No books :(</p>

            @endif

            <a href="/books/create" class="btn btn-primary mt-4">Add book</a>
        </div>
    </div>

@endsection
