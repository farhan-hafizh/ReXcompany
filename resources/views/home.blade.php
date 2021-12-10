@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
      @if ($search)
      <h1>Search result of '{{$search['search']}}'</h1>
      @else
      <h1>Top Picks</h1>
      @endif
        <div>
          <div class="row">
        @foreach ($game as $item)
              <div class="col-8 col-sm-6 col-md-4 col-lg-3 pt-2">
                  <a href="/game-detail/{{ $item->slug }}">
                    <div class="card h-100 w-100">
                            <img class="card-img" src="{{ asset('game_assets/img/'.$item->gameDetail->game_cover)}}" alt="Bologna">
                          <div class="card-img-overlay box bg-white">
                            <h4 class="card-title">{{ $item->name }}</h4>
                            <h6 class="card-subtitle mb-2">{{ $item->genre->name }}</h6>
                          </div>
                    </div>
                  </a>
                  </div>
                  @endforeach
                </div>
                {{$game->links()}}                  
          </div>
    </div>
@endsection