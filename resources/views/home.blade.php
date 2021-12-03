@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('img/building.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>          
    </div>
@endsection