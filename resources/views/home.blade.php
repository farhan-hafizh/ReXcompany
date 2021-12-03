@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <h1>Top Picks</h1>
        <div class="row">
            <div class="col-8 col-sm-6 col-md-4 col-lg-3">
                <a class="card h-100 w-100" href="">
                        <img class="card-img" src="{{ asset('img/building.jpg')}}" alt="Bologna">
                      <div class="card-img-overlay box bg-white">
                        <h4 class="card-title">Title</h4>
                        <h6 class="card-subtitle mb-2">Category</h6>
                      </div>
                </a>
              </div>
          </div>         
    </div>
@endsection