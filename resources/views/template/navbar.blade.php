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
          {{-- @auth('Admin') --}}
            <li class="nav-item">
                <a class="nav-link {{ ($title=='Manage')? 'active' : ''}}" href="/manage-game">Manage Game</a>
            </li>    
          {{-- @endif           --}}
        </ul>
        <div class="ml-auto d-flex">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
            {{-- user is guest --}}
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/register">Register</a>
              </li>
            @endguest
            {{-- user is logged in --}}
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile">Profile</a>
                <a class="dropdown-item" href="/friends">Friends</a>
                <a class="dropdown-item" href="/trans-history">Transaction History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </li>
            @endauth
        </div>         
      </div>
    </div>
  </nav>