@extends('layout')

@section('title', $title)

@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>{{ $title }}</h2>

        @if ($errors->any())
        <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
        @endif

        <form
            method="POST"
            action="{{ $author->exists ? '/authors/update/' . $author->id : '/authors/store' }}"
        >
            @csrf

            <div class="form-group">
                <label for="author-name">Name</label>

                <input
                    type="text"
                    name="name"
                    id="author-name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $author->name) }}"
                    placeholder="Name, surname"
                >

                @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @enderror
            </div>

            <div class="form-group form-check">
                <input
                    type="checkbox"
                    name="display"
                    id="author-display"
                    class="form-check-input @error('display') is-invalid @enderror"
                    @if ($author->display) checked @endif
                >

                <label for="author-display" class="form-check-label">Publicate</label>

                @error('display')
                <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
</div>

@endsection


