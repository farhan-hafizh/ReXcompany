@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
      <div class="card d-flex flex-row">
          <div class="p-2 border-right w-25">
              <div class="flex-column nav nav-pills mb-auto">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                      <li class="nav-item">
                          <a href="/profile" class="nav-link pr-2 pl-2 {{($title=="Profile") ? "active" : ""}}">Profile</a>
                        </li>
                        @member
                        <li class="nav-item">
                            <a href="/friends" class="nav-link pr-2 pl-2 {{($title=="Friends") ? "active" : ""}}">Friends</a>
                        </li>
                        <li class="nav-item">
                            <a href="/trans-history" class="nav-link pr-2 pl-2 {{($title=="Transaction History") ? "active" : ""}}">Transaction History</a>
                        </li>
                        @endmember
                    </ul>
                </div>
            </div>
         <div class="p-4 w-75">
            @yield('right-content')
         </div>
      </div>                 
    </div>
@endsection