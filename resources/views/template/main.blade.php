@extends('template.html')

@section('container')
    @include('template.navbar')
    <div class="bg-light">
        @yield('main-content')
    </div>
    @include('template.footbar')
@endsection

