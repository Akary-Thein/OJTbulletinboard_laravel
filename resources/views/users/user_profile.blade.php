@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">User Profile</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group row">
              <div class="col-md-1 offset-md-4">
                <a class="nav-link" href="{{ url('update_user') }}">{{ __('Edit') }}</a>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="name" class="col-form-label text-md-left">{{ __('Name') }}</label>
                </div>

                <div class="form-group">
                <label for="email" class="col-form-label text-md-left">{{ __('Email Address') }}</label>
                </div>

                <div class="form-group">
                  <label for="type" class="col-form-label text-md-left">{{ __('Type') }}</label>
                </div>

                <div class="form-group">
                  <label for="phone" class="col-form-label text-md-left">{{ __('Phone') }}</label>
                </div>

                <div class="form-group">
                  <label for="dob" class="col-form-label text-md-left">{{ __('Date Of Birth') }}</label>
                </div>

                <div class="form-group">
                  <label for="address" class="col-form-label text-md-left">{{ __('Address') }}</label>
                </div>

              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="name" class="col-form-label text-md-left">Aung Aung</label>
                </div>

                <div class="form-group">
                  <label for="email" class="col-form-label text-md-left">aungaung@gmail.com</label>
                </div>

                <div class="form-group">
                  <label for="type" class="col-form-label text-md-left">User</label>
                </div>

                <div class="form-group">
                  <label for="phone" class="col-form-label text-md-left">97894655</label>
                </div>

                <div class="form-group">
                  <label for="dob" class="col-form-label text-md-left">2001/12/12</label>
                </div>

                <div class="form-group">
                  <label for="address" class="col-form-label text-md-left">Hledan, Yangon</label>
                </div>

              </div>

              <div class="col-md-3">
              @if(file_exists("./img/default.png"))
              <img id="output" src="./img/default.png" alt="default" />
                @else
                <img src="" alt="default_img" class="w-50">
                  @endif
                
              </div>

            </div>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
