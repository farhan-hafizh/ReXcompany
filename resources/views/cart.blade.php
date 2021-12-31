@extends('template.main')

@section('main-content')
<div class="container-fluid">
    <div class="p-5">
        <div class="card">
            @php
                $totalPrice=0;
            @endphp
            <h3 class="m-3"><b>Shopping Cart</b></h3>
            @foreach ($game as $item)
            @php
                $totalPrice+=$item->game[0]->gameDetail->price;
                @endphp
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
               <div class="w-25">
                    <form class="float-right mt-4" action="{{route('cart.destroy',$item->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game from your shopping cart? All of your data will be permanently removed from our server forever. This action cannot be undone!')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg> Delete</button>
                    </form>
               </div>
            </div>
                <hr/>
            @endforeach
            <p class="ml-3">Total Cart: <b> Rp. {{number_format($totalPrice,2)}}</b></p>
            <div class="ml-3 mb-3">
                <a href="/checkout/{{$totalPrice}}" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-sunglasses" viewBox="0 0 16 16">
                    <path d="M4.968 9.75a.5.5 0 1 0-.866.5A4.498 4.498 0 0 0 8 12.5a4.5 4.5 0 0 0 3.898-2.25.5.5 0 1 0-.866-.5A3.498 3.498 0 0 1 8 11.5a3.498 3.498 0 0 1-3.032-1.75zM7 5.116V5a1 1 0 0 0-1-1H3.28a1 1 0 0 0-.97 1.243l.311 1.242A2 2 0 0 0 4.561 8H5a2 2 0 0 0 1.994-1.839A2.99 2.99 0 0 1 8 6c.393 0 .74.064 1.006.161A2 2 0 0 0 11 8h.438a2 2 0 0 0 1.94-1.515l.311-1.242A1 1 0 0 0 12.72 4H10a1 1 0 0 0-1 1v.116A4.22 4.22 0 0 0 8 5c-.35 0-.69.04-1 .116z"/>
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-1 0A7 7 0 1 0 1 8a7 7 0 0 0 14 0z"/>
                  </svg> Checkout</a>
            </div>
        </div>
    </div>
@endsection