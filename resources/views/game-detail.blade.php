@extends('template.main')

@section('main-content')
<div class="container-fluid p-5">
        @foreach ($game as $item)
        <div class="mb-3 text-dark">
            <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
              </svg></a>
              >
              <a href="/?category={{$item->genre->slug}}">{{$item->genre->name}}</a>
              >
              {{$item->name}}
        </div>
        <div class="d-flex flex-row">
            <div class="mr-2">
                <video width="1000" controls autoplay muted>
                    <source src="{{ asset('game_assets/video/'.$item->gameDetail->game_trailer) }}">
                  Your browser does not support the video tag.
                  </video> 
            </div>
            <div class="w-25">
                <img class="card-img" src="{{ asset('game_assets/img/'.$item->gameDetail->game_cover)}}" alt="Bologna">
                <div class="mt-3">
                    <h3><b>{{ $item->name }}</b></h3>
                    <p>{{$item->gameDetail->description}}</p>
                    
                    <h5><b>Genre: </b>{{$item->genre->name}}</h5>
                    <h5><b>Release at: </b>{{$item->created_at}}</h5>
                    <h5><b>Developer: </b>{{$item->gameDetail->developer}}</h5>
                    <h5><b>Publisher: </b>{{$item->gameDetail->publisher}}</h5>

                </div>
            </div>
        </div>
        @php
            $count=0;
        @endphp
        @member
            @foreach (json_decode(Cookie::get('user_trans')) as $item1)
                @if ($item1->game_id==$item->id)
                    @php
                        $count++;
                    @endphp
                @endif
            @endforeach  
            @endmember
        
        @if ($count==0)
            <div class="position-relative card shadow p-4 mt-2 bg-white rounded buy-card">
                <h3><b>Buy {{ $item->name }}</b></h3>
                <div class="position-absolute translate-middle bottom-right">
                    <a href="/game-detail/add-cart/{{ $item->slug }}" class="btn btn-dark">Rp. {{$item->gameDetail->price}} | Add to Cart</a>
                </div>
            </div>
        @endif
        <div class="mt-3">
            <h4><b>About This Game</b></h4>
            <hr class="bg-dark h-2">
            <div class="line"></div>
            <p>{{ $item->gameDetail->long_description }}</p>
        </div>
        @endforeach                  
    </div>
@endsection