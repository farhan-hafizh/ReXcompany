@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <div>
            {{-- link --}}
        </div>
        @foreach ($game as $item)
        <div class="d-flex flex-row">
            <div class="mr-2">
                <video width="1000" controls>
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
                    <h5><b>Genre: </b>{{$item->created_at}}</h5>
                    <h5><b>Developer: </b>{{$item->gameDetail->developer}}</h5>
                    <h5><b>Publisher: </b>{{$item->gameDetail->publisher}}</h5>

                </div>
            </div>
        </div>
        @php
            $count=0;
        @endphp
        {{-- @if (is_array(Cookie::get('cart'))||is_object(Cookie::get('cart'))) --}}
            @foreach (json_decode(Cookie::get('cart')) as $item1)
                @if ($item1->game_id==$item->id)
                    @php
                        $count++;
                    @endphp
                @endif
            @endforeach
        {{-- @endif --}}
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