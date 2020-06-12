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
                action="{{ $genre->exists ? '/genre/update/' . $genre->id : '/genre/store' }}"
            >
                @csrf

                <div class="form-group">
                    <label for="genre-name">Genre</label>

                    <input
                        type="text"
                        name="name"
                        id="genre-name"
                        class="form-control @error('genre') is-invalid @enderror"
                        value="{{ old('name', $genre->name) }}"
                        placeholder="Genre"
                    >

                    @error('name')
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input
                        type="checkbox"
                        name="display"
                        id="genre-display"
                        class="form-check-input @error('display') is-invalid @enderror"
                        @if ($genre->display) checked @endif
                    >

                    <label for="genre-display" class="form-check-label">Publish</label>

                    @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>

@endsection
