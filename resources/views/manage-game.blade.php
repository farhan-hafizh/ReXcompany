@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <h1>Manage Games</h1>
        <h4>Filter By Games Name</h4>
        <form action="/manage-game">
            <div class="sb-example-1">
                <div class="search">
                   <input type="text" name="title" class="search" placeholder="Search...">
                </div>
             </div>
             <h4>Filter Game By Category</h4>
             <div class="d-flex flex-column w-50">
                 @php
                     $flag=0;
                 @endphp
                 @foreach ($genre as $item)
                 @if ($loop->index%5==0&&$flag==0)
                 @php
                     $flag=$loop->index+5
                 @endphp
                 <div class="row">
             @elseif($loop->index==$flag)
                 </div>
                 <div class="row">
                 @php
                     $flag=0
                 @endphp
             @endif 
         <div class="col">
             <input type="checkbox" name="category[]" value="{{ $item->slug }}">
             <label for="idle"> {{ $item->name }}</label>
         </div> 
                 @endforeach
             </div>
             <button type="submit" class="btn btn-dark w-25 mt-2">
                Search
              </button>   
        </form>
    </div>
    <div class="container-fluid p-5">
        @foreach ($game as $item)
        <div class="row">
            <div class="col-8 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                        <img class="card-img" src="{{ asset('game_assets/img/'.$item->gameDetail->game_cover)}}" alt="Bologna">
                      <div class="card-img-overlay box bg-white">
                        <h4 class="card-title">{{ $item->name }}</h4>
                        <h6 class="card-subtitle mb-2">{{ $item->genre->name }}</h6>
                      </div>
                </div>
                <div class="d-flex mt-3 justify-content-around">
                    <a href="/update/{{$item->slug}}" class="btn btn-dark">Update</a>
                    <a href="/delete/{{$item->slug}}" class="btn btn-danger">Delete</a>
                  </div>
              </div>
          </div>
          
        @endforeach         
    </div>
    <div class="btn-add-game btn">
        <a href="/add-game"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-diff" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4zm-2.5 6.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
          </svg></a>
    </div>
@endsection