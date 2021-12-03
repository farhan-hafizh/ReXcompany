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
@endsection