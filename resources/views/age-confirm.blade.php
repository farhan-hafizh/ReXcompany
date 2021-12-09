@extends('template.main')

@section('main-content')
<div class="container-fluid">
    <div class="p-5">
        <div class="border border-dark mt-4">
            @foreach ($game as $item)
            <center>
                    <img class="mt-4" src="{{ asset('game_assets/img/'.$item->gameDetail->game_cover)}}">                 
                    <p><b>This Game may contain content not appropriate for all ages,<br>
                    or may not be appropriate for viewing at work.</b></p>
                    <div class="card bg-white mt-2 mb-5 date-insert">
                        <p>Please enter your birth date to continue:</p>
                        <div>
                            <form action="/age-check" method="POST">
                                <div class="align-middle">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{ $item->slug }}">
                                    <label for="dob" >Date of Birth: </label>
                                    <input type="date" name="dob" >
                                </div>
                                <div class="mt-2 mb-4">
                                    <button class="btn btn-primary" type="submit">View Page</button>
                                    <a href="/" class="btn btn-dark">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </center>
            @endforeach
        </div>
    </div>
@endsection