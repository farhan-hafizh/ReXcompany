@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <h1>Add Game</h1>
        <form action="">
            <div class="form-group">
                <label for="game-name">Game Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="game-desc">Game Description</label>
                <textarea class="form-control" name="description" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="game-desc-long">Game Long Description</label>
                <textarea class="form-control" name="description" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="game-category">Game Category</label>
                <select class="form-control" name="category">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="game-developer">Game Developer</label>
                <input class="form-control" type="text" name="game_dev">
            </div>
            <div class="form-group">
                <label for="game-publisher">Game Publisher</label>
                <input class="form-control" type="text" name="game_publisher">
            </div>
            <div class="form-group">
                <label for="game-price">Game Price</label>
                <input class="form-control" type="number" name="price">
            </div>
            <div class="form-group">
                <label for="game-cover">Game Cover</label>
                <input class="form-control" type="file" name="price">
            </div>
            <div class="form-group">
                <label for="game-trailer">Game Trailer</label>
                <input class="form-control" type="file" name="price">
            </div>
            <button class="btn btn-dark" type="submit">Save</button>
            <a href="/manage-game" class="btn btn-light">Cancel</a>
        </form>         
    </div>
@endsection