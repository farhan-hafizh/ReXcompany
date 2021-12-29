@extends('template.main')

@section('main-content')
    <div class="container-fluid p-5">
        <h1>Transaction Information</h1>
        <form action="/trans-info" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="card-name"><b>Card Name</b></label>
                <input class="form-control @error('cardname') is-invalid  @enderror" placeholder="Card Name" type="text" name="cardname">
                @error('cardname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="card-number"><b>Card Number</b></label>
                <input class="form-control @error('cardnumber') is-invalid  @enderror" placeholder="Card Number" type="text" name="cardnumber">
                @error('cardnumber')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-flex flex-row">
                    <div class="w-75">
                        <label for="expired-date"><b>Expired Date</b></label>
                        <div class="d-flex justify-content-around">
                            <div class="w-50 mr-1">
                                <input type="text" class=" form-control @error('month') is-invalid  @enderror" placeholder="MM" name="month">
                                @error('month')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-50 ml-1">
                                <input class="form-control @error('year') is-invalid  @enderror" type="text" placeholder="YYYY" name="year">
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="ml-3 w-25">
                        <label for="cvc"><b>CVC/CVV</b></label>
                        <input class="form-control @error('cvc') is-invalid  @enderror" type="text" name="cvc" placeholder="3 or 4 digit number">
                        @error('cvc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group d-flex flex-row ">
                <div class="w-75 pr-2">
                    <label for="country"><b>Country</b></label>
                    <select name="country" class="form-control @error('country') is-invalid  @enderror">
                        @foreach ($country as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option> 
                        @endforeach
                    </select>
                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="w-25 pl-2">
                    <label for="zip"><b>ZIP</b></label>
                    <input class="form-control @error('zip') is-invalid  @enderror" type="text" name="zip" placeholder="ZIP">
                    @error('zip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div>
                <div class="float-right">
                    <a href="/cart" class="btn btn-light">Cancel</a>
                    <button class="btn btn-dark" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-sunglasses" viewBox="0 0 16 16">
                        <path d="M4.968 9.75a.5.5 0 1 0-.866.5A4.498 4.498 0 0 0 8 12.5a4.5 4.5 0 0 0 3.898-2.25.5.5 0 1 0-.866-.5A3.498 3.498 0 0 1 8 11.5a3.498 3.498 0 0 1-3.032-1.75zM7 5.116V5a1 1 0 0 0-1-1H3.28a1 1 0 0 0-.97 1.243l.311 1.242A2 2 0 0 0 4.561 8H5a2 2 0 0 0 1.994-1.839A2.99 2.99 0 0 1 8 6c.393 0 .74.064 1.006.161A2 2 0 0 0 11 8h.438a2 2 0 0 0 1.94-1.515l.311-1.242A1 1 0 0 0 12.72 4H10a1 1 0 0 0-1 1v.116A4.22 4.22 0 0 0 8 5c-.35 0-.69.04-1 .116z"/>
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-1 0A7 7 0 1 0 1 8a7 7 0 0 0 14 0z"/>
                      </svg> Checkout</button>
                </div>
                <div>
                    <input type="hidden" value="{{$price}}" name="price">
                    <p>Total Price: <b>Rp. {{number_format($price,2)}}</b></p>
                </div>
            </div>
        </form>         
    </div>
@endsection