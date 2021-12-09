@extends('template.html')

@section('container')
    @include('template.navbar')
    <div>
        @yield('main-content')
    </div>
    @include('template.footbar')
@endsection

