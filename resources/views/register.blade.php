@extends('template.html')

@section('container')
    <div class="row h-100">
        <div class="col-4 bg-dark text-white">
            <div class="d-flex flex-row-reverse">
                <a class="mr-4 mt-2" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg></a>
                </div>
            <div class="p-5">
                <h1>REGISTRATION PAGE</h1>
                <form class="p-4" action="/register" method="POST">
                    {{-- add csrf token --}}
                    @csrf
                    
                    <label for="usernameInput">Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" name="username" class="form-control @error('username') is-invalid  @enderror" placeholder="Username" value="{{ old('username') }}" aria-label="Username" aria-describedby="basic-addon1" required>
                        @error('username')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                      </div>
                    <div class="form-group mb-3">
                       <label for="inputFullName">Full Name</label>
                       <input type="text" name="fullname" class="form-control @error('fullname') is-invalid  @enderror" placeholder="Full Name" value="{{ old('fullname') }}" required>
                       @error('fullname')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                    </div>
                    <div class="form-group mb-3">
                      <label for="inputPassword">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid  @enderror" value="{{ old('password') }}" placeholder="Password" required>
                      @error('password')
                           <div class="invalid-feedback">
                             {{ $message }}
                           </div>
                       @enderror
                    </div>
                    <div class="form-group mb-3 ">
                        <label for="inputRole">Role</label>
                        <select class="form-select" name="role">
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                    <div class="d-flex flex-row-reverse">
                        <a href="/login">Already have an account?</a>
                    </div>
                  </form>
            </div>
        </div>
        <div class="col-8 no-padding">
            <img class="mw-100" src="{{asset('img/building.jpg')}}">
        </div>
    </div>
@endsection