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
                action="{{ $book->exists ? '/books/update/' . $book->id : '/books/store' }}"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-group">
                    <label for="book-name">Name</label>

                    <input
                        type="text"
                        name="name"
                        id="book-name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $book->name) }}"
                        placeholder="The title of a book"
                    >

                    @error('name')
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="book-author">Author</label>

                    <select
                        name="author_id"
                        id="book-author"
                        class="form-control @error('author_id') is-invalid @enderror"
                    >
                        <option value="">Select author!</option>
                        @foreach($authors as $author)
                            <option
                                value="{{ $author->id }}"
                                @if ($author->id == old('author_id', $book->author->id ?? false)) selected @endif
                            >{{ $author->name }}</option>
                        @endforeach
                    </select>

                    @error('author_id')
                    <p class="invalid-feedback">{{ $errors->first('author_id') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="book-genre">Genre</label>

                    <select
                        name="genre_id"
                        id="book-genre"
                        class="form-control @error('genre_id') is-invalid @enderror"
                    >
                        <option value="">Select genre!</option>
                        @foreach($genres as $genre)
                            <option
                                value="{{ $genre->id }}"
                                @if ($genre->id == old('genre_id', $book->genre->id ?? false)) selected @endif
                            >{{ $genre->name }}</option>
                        @endforeach
                    </select>

                    @error('genre_id')
                    <p class="invalid-feedback">{{ $errors->first('genre_id') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="book-description">Description</label>

                    <textarea
                        name="description"
                        id="book-description"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Description"
                    >{{ old('description', $book->description) }}</textarea>

                    @error('description')
                    <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="book-name">Price</label>

                    <input
                        type="number"
                        name="price"
                        id="book-price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $book->price) }}"
                        placeholder="12.34"
                        step="0.01"
                        min="0.00"
                        lang="en"
                    >

                    @error('price')
                    <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="book-year">Year</label>

                    <input
                        type="number"
                        name="year"
                        id="book-year"
                        class="form-control @error('year') is-invalid @enderror"
                        value="{{ old('year', $book->year) }}"
                        placeholder="2020"
                        step="1"
                    >

                    @error('year')
                    <p class="invalid-feedback">{{ $errors->first('year') }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="book-image">Image</label>

                    @if ($book->image)
                        <div>
                            <img
                                src="{{ asset('images/' . $book->image) }}"
                                alt="{{ $book->name }}"
                                class="img-thumbnail"
                            >
                        </div>
                    @endif

                    <input
                        type="file"
                        name="image"
                        id="book-image"
                        class="form-control-file @error('image') is-invalid @enderror"
                    >

                    @error('image')
                    <p class="invalid-feedback">{{ $errors->first('image') }}</p>
                    @enderror
                </div>

                <div class="form-group form-check">
                    <input
                        type="checkbox"
                        name="display"
                        id="book-display"
                        class="form-check-input @error('display') is-invalid @enderror"
                        @if ($book->display) checked @endif
                    >

                    <label for="book-display" class="form-check-label">Publish</label>

                    @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>

@endsection

