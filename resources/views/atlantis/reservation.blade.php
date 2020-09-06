@extends('layouts.app')

@section('content')

<section class="probootstrap-slider flexslider probootstrap-inner">
    <ul class="slides">
       <li style="background-image: url(img/pexels-pixabay-271639.jpg);" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="probootstrap-slider-text text-center">
                  <p><img src="img/curve_white.svg" class="seperator probootstrap-animate" alt="Free HTML5 Bootstrap Template"></p>
                  <h1 class="probootstrap-heading probootstrap-animate">Reservation</h1>
                  <div class="probootstrap-animate probootstrap-sub-wrap">予約画面</div>
                </div>
              </div>
            </div>
          </div>
        </li>
    </ul>
  </section>

  <section class="probootstrap-section">
    <div class="container">
      <div class="row probootstrap-gutter40">
        <div class="col">
          <h2 class="mt0">REGISTER</h2>
          <form action="{{ route('complete') }}" method="post" class="probootstrap-form">
          @csrf
            <div class="row">
              <div class="form-group col-md-12">
                <label for="room">Room</label>
                <div class="form-field">
                  <i class="icon icon-chevron-down"></i>
                  <select name="room" id="room" class="form-control @error('room') is-invalid @enderror">
                    <option disabled selected value>お部屋のグレードをお選び下さい。</option>
                    <option value="Executive">Executive Room</option>
                    <option value="Deluxe">Deluxe Room</option>
                    <option value="Superior">Superior Room</option>
                    <option value="Standard">Standard Room</option>
                  </select>
                  @error('room')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="check_in">Check_in</label>
                  <input type="date" class="form-control @error('check_in') is-invalid @enderror" id="check_in" name="check_in" value="{{old('check_in')}}">
                  @error('check_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="check_out">Check_out</label>
                  <input type="date" class="form-control @error('check_out') is-invalid @enderror" id="check_out" name="check_out" value="{{old('check_out')}}">
                  @error('check_out')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div>
            </div>

            <div class="row mb30">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="adults">Adults</label>
                  <div class="form-field">
                    <i class="icon icon-chevron-down"></i>
                    <select name="adults" id="adults" class="form-control @error('adults') is-invalid @enderror">
                    <option disabled selected value>大人の人数(必ず一名以上を設定ください。)</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4+</option>
                    </select>
                    @error('adults')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="children">Children</label>
                  <div class="form-field">
                    <i class="icon icon-chevron-down"></i>
                    <select name="children" id="children" class="form-control @error('children') is-invalid @enderror">
                    <option disabled selected value>子供の人数</option>
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4+</option>
                    </select>
                    @error('children')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  
                </div>
              </div>
            </div>
            @if(isset($count))
                    <span class="alert-danger" role="alert">
                        <strong>選択された部屋の予約日は予約がいっぱいですので再度他の部屋または他の日でご予約下さい。</strong>
                      </span>
            @endif
            <div class="form-group">
              <div class="col-md-4">
                <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Reserve">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  @endsection