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
                        <th>ID</td>
                        <th>Name</td>
                        <th>Publicated</td>
                        <th>&nbsp;</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $author)

                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{!! $author->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
                            <td>
                              <a
                                  href="/authors/edit/{{ $author->id }}"
                                  class="btn btn-outline-primary"
                              >Edit</a>
                                <a
                                    href="/authors/delete/{{ $author->id }}"
                                    class="btn btn-outline-danger link-delete"
                                >Delete</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @else

                <p>There are no author in database :(</p>

            @endif

            <a href="/authors/create" class="btn btn-primary">Add author</a>

        </div>
    </div>

@endsection






















