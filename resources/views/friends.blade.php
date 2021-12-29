@extends('template.profile-template')

@section('right-content')
    <h3><b>Friends</b></h3>

    <div class="m-3">
        <h4><b>Add Friend</b></h4>
        <form action="/friends" method="POST">
            @csrf
            <input class="mt-1" type="text" placeholder="Username" name="username">
            <button type="submit" class="btn btn-dark">Add</button>
        </form>
    </div>
    <hr/>
    <div class="m-3">
        <h4><b>Incoming Friend Request</b></h4>
        @if (count($pending)==0)
            <p class="text-secondary">There's no incoming friend request.</p>
        @else
        <div class="row">
            @foreach ($pending as $item)
            <div class="col-8 col-sm-6 col-md-5 p-2">
                <div class="card p-2 bg-light">
                    <div class="d-flex flex-row p-0">
                    <div class="w-75 mr-3">
                        <div class=" d-flex flex-row">
                            <div>
                                <p class="no-padding">{{$item->fullname}}</p>
                            </div>
                            <div class="ml-3 rounded-circle">
                               <p class="bg-info text-white pl-1 pr-1 rounded-circle no-padding">{{$item->level}}</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-secondary no-padding">{{$item->role}}</p>
                        </div>
                    </div>
                    <div class="w-25">
                        <img class="rounded-circle profile-picture" src="{{asset('img/user_profile/'.$item->profile_picture)}}" alt="">
                    </div>
                </div>
                    <hr class="divider"/>
                    <div class="d-flex flex-row">
                        <a href="/friends/reject/{{$item->id}}" class="btn btn-light border-right w-50">Reject</a>
                        <a href="/friends/accept/{{$item->id}}" class="btn btn-light w-50   ">Accept</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    <hr />
    <div class="m-3">
        <h4><b>Pending Friend Request</b></h4>
        @if (count($requesting)==0)
            <p class="text-secondary">There's no pending friend request.</p>
        @else
        <div class="row">
            @foreach ($requesting as $item)
                    <div class="col-8 col-sm-6 col-md-4 p-2">
                        <div class="card p-2 bg-light">
                            <div class="d-flex flex-row p-0">
                            <div class="w-75 mr-3">
                                <div class=" d-flex flex-row">
                                    <div>
                                        <p class="no-padding">{{$item->fullname}}</p>
                                    </div>
                                    <div class="ml-3 rounded-circle">
                                       <p class="bg-info text-white pl-1 pr-1 rounded-circle no-padding">{{$item->level}}</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="text-secondary no-padding">{{$item->role}}</p>
                                </div>
                            </div>
                            <div class="w-25">
                                <img class="rounded-circle profile-picture" src="{{asset('img/user_profile/'.$item->profile_picture)}}" alt="">
                            </div>
                        </div>
                            <hr class="divider"/>
                            <a href="/friends/cancel/{{$item->id}}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                    @endforeach
                </div>
        @endif
    </div>
    <hr/>
    <div class="m-3">
        <h4><b>Your Friends</b></h4>
        @if (count($friends)==0)
            <p class="text-secondary">There's no friend.</p>
        @else
        <div class="row">
            @foreach ($friends as $item)
            <div class="col-8 col-sm-6 col-md-5 p-2">
                <div class="card p-2 bg-light">
                    <div class="d-flex flex-row p-0">
                    <div class="w-75 mr-3">
                        <div class=" d-flex flex-row">
                            <div>
                                <p class="no-padding">{{$item->fullname}}</p>
                            </div>
                            <div class="ml-3 rounded-circle">
                               <p class="bg-info text-white pl-1 pr-1 rounded-circle no-padding">{{$item->level}}</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-secondary no-padding">{{$item->role}}</p>
                        </div>
                    </div>
                    <div class="w-25">
                        <img class="rounded-circle profile-picture" src="{{asset('img/user_profile/'.$item->profile_picture)}}" alt="">
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection