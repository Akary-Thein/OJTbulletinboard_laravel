@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Create User</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group row">
              <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('Name') }}</label>

              <div class="col-md-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('Email Address') }}</label>

              <div class="col-md-3">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('Password') }}</label>

              <div class="col-md-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="confirm_password" class="col-md-3 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

              <div class="col-md-3">
                <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="{{ old('confirm_password') }}" required autocomplete="confirm_password" autofocus>

                  @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="type" class="col-md-3 col-form-label text-md-left">{{ __('Type') }}</label>

              <div class="col-md-3">
                <select class="browser-default custom-select">
                  <option selected>-- Choose Type --</option>
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                </select>

                  @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="phone" class="col-md-3 col-form-label text-md-left">{{ __('Phone') }}</label>

              <div class="col-md-3">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

            </div>

            <div class="form-group row">
              <label for="dob" class="col-md-3 col-form-label text-md-left">{{ __('Date Of Birth') }}</label>

              <div class="col-md-3">
                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                  @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

            </div>

            <div class="form-group row">
              <label for="address" class="col-md-3 col-form-label text-md-left">{{ __('Address') }}</label>

              <div class="col-md-3">
              <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address"></textarea>

                  @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>


            </div>

            <div class="form-group row">
              <label for="profile" class="col-md-3 col-form-label text-md-left">{{ __('Profile') }}</label>

              <div class="col-md-3">
                <input type="file"  accept="img/*" name="image" id="file" onchange="loadFile(event)">

                  @error('profile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <div class="col-md-3 offset-md-3">
                <img id="output" src="./img/default.png" alt="default" />
             </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-1 offset-md-2">
                <button type="submit" class="btn btn-primary">
                  {{ __('Confirm') }}
                </button>
              </div>
              <div class="col-md-1">
                <button type="reset" class="btn btn-outline-success" onclick="resetimg();">
                  {{ __('Clear') }}
                </button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
