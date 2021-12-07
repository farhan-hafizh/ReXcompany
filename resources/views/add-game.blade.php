@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <h1>Add Game</h1>
        <form action="/add-game" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="game-name">Game Name</label>
                <input class="form-control" type="text" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-desc">Game Description</label>
                <textarea class="form-control" name="description" rows="1"></textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-desc-long">Game Long Description</label>
                <textarea class="form-control" name="long_description" rows="5"></textarea>
                @error('long-description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-category">Game Category</label>
                <select class="form-control" name="genre">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('genre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-developer">Game Developer</label>
                <input class="form-control" type="text" name="developer">
                @error('developer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-publisher">Game Publisher</label>
                <input class="form-control" type="text" name="publisher">
                @error('publisher')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-price">Game Price</label>
                <input class="form-control" type="number" name="price">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-cover">Game Cover</label>
                <input class="form-control" type="file" name="game_cover">
                @error('game_cover')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="game-trailer">Game Trailer</label>
                <input class="form-control" type="file" name="game_trailer">
                @error('game_trailer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" name="forAdult" type="checkbox" value="1" id="adultOnly">
                <label class="form-check-label" for="adultOnly">
                  Only for Adult?
                </label>
              </div>
            <button class="btn btn-dark" type="submit">Save</button>
            <a href="/manage-game" class="btn btn-light">Cancel</a>
        </form>         
    </div>
@endsection