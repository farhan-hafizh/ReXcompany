<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">ReXsteam</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title=='Home')? 'active' : ''}}" aria-current="page" href="/">Home</a>
          </li>
          @admin
            <li class="nav-item">
                <a class="nav-link {{ ($title=='Manage')? 'active' : ''}}" href="/manage-game">Manage Game</a>
            </li>
          @endadmin         
        </ul>
        <div class="ml-auto d-flex">
          <form action="/" class="d-flex mr-2">
            <input class="form-control mr-2" name="search" id="search-bar" type="search" placeholder="Search" aria-label="Search">
            {{-- <button class="btn btn-outline-light display-none" id="btn-search" type="submit">Search</button> --}}
        </form>
            {{-- user is logged in --}}
            <ul class="navbar-nav ms-auto">
            @auth
            @member
            <li>
              <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart pt-2" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg><span class='badge badge-warning' id='lblCartCount'>{{ Cookie::get('totalcart') }}</span></a>
            </li>
            @endmember
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{-- <div class="profile-picture"> --}}
                  <img class="profile-picture rounded" src="{{ asset("img/".auth()->user()->profile_picture) }}" alt="Profile Picture">
                {{-- </div>   --}}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile">Profile</a>
                @member
                <a class="dropdown-item" href="/friends">Friends</a>
                <a class="dropdown-item" href="/trans-history">Transaction History</a>
                @endmember
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                  @csrf
                  <button class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-in-right pt-1 pr-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>Logout</button>
                </form>
              </div>
            </li>
            @else
            {{-- user is guest --}}
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
              </li>
            @endauth
          </ul>
        </div>         
      </div>
    </div>
  </nav>