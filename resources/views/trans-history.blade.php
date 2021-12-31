@extends('template.profile-template')

@section('right-content')
    <h3><b>Transaction History</b></h3>
    @php
        $data=$transHistory;
    @endphp
    @foreach ($data as $trans_id => $transHistory )
        <p class="no-padding">Transaction Id: {{$trans_id}}</p>
        <p>Purchase Date: {{$transHistory[0]->updated_at}}</p> 
        <div class="d-flex flex-row">
        @foreach ($transHistory as $item)
                    <div class="p-2 col-3">
                        <img class="card-img" src="{{asset('game_assets/img/'.$item->game[0]->gameDetail->game_cover)}}" alt="Image Not Found!s">
                    </div>
                @endforeach
            </div>
        <hr/>
    @endforeach
@endsection