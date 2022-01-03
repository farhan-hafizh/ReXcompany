@extends('template.main')

@section('main-content')
<div class="m-4">    
    <h3 class="ml-3"><b>Transaction Receipt</b></h3>
        <div class="card m-3 p-3">
            <p>Transaction Id: {{$transId}}</p>
            @foreach ($trans as $item)
                @if ($loop->index==0)
                    <p>Purchased Date: {{$item->updated_at}}</p>
                    <hr/>
                @endif
            <div class="d-flex flex-row mt-2 pr-2 pl-2">
                <div>
                    <img class="cart-img card-img" src="{{ asset('game_assets/img/'.$item->game[0]->gameDetail->game_cover)}}" alt="Bologna">
                 </div>
                 <div class="ml-3 w-50">
                      <div class="d-flex flex-row">
                          <p class="mr-2"><b>{{$item->game[0]->name}}</b></p>
                          <p class="text-white bg-dark pl-1 pr-1 rounded">{{$item->game[0]->genre->name}}</p>
                      </div>
                      <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                          <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                          <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                        </svg> Rp. {{number_format($item->game[0]->gameDetail->price,2)}}</p>
                 </div>
            </div>
            @endforeach
        </div>
        <div>
            <p class="ml-3">Total Price: <b>Rp. {{number_format($price,2)}}</b></p>
        </div>
        <div class="m-3">
            <a href="/home" class="btn btn-dark">Home</a>
        </div>
</div>
@endsection