@extends('template.html')

@section('container')
{{-- alert  --}}
@if (session()->has('succes'))
<div class="alert alert-success alert-dismissible fade show overlay-text w-100" role="alert">
  {{ session('success') }}
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>    
 @endif

 @if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show overlay-text w-100" role="alert">
  {{ session('loginError') }}
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>    
 @endif

    <div class="row h-100">     
          <div class="col-4 bg-dark text-white">
             <div class="d-flex flex-row-reverse">
                <a class="mr-4 mt-2" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg></a>
                </div>
            <div class="p-5">
                <h1>LOGIN PAGE</h1>
                <form action="/login" method="POST" class="p-4">
                  {{-- prevent Cross site request forgery --}}
                  @csrf 
                    <label for="usernameInput">Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('usename') }}" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                      </div>
                      @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    <div class="form-group">
                      <label for="inputPassword">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    <div class="form-check pb-2">
                      <input type="checkbox" name="remember" class="form-check-input">
                      <label class="form-check-label" for="dropdownCheck2">
                        Remember me
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    <div class="d-flex flex-row-reverse">
                        <a href="/register">Don't have account?</a>
                    </div>
                  </form>
            </div>
        </div>
        <div class="col-8 no-padding">
          <div class="no-padding auth-background float-end">
          </div>
        </div> 
    </div>
@endsection