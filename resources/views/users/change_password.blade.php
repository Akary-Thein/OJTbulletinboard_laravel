@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Change Pasword</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group row">
              <label for="old_password" class="col-md-3 col-form-label text-md-left">{{ __('Old Password') }}</label>

              <div class="col-md-3">
                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" value="********" required autocomplete="old_password" autofocus>

                  @error('old_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="new_password" class="col-md-3 col-form-label text-md-left">{{ __('New Password') }}</label>

              <div class="col-md-3">
                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="********" required autocomplete="new_password" autofocus>

                  @error('new_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="confirm_new_password" class="col-md-3 col-form-label text-md-left">{{ __('Confirm New Password') }}</label>

              <div class="col-md-3">
                <input id="confirm_new_password" type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password" value="********" required autocomplete="confirm_new_password" autofocus>

                  @error('confirm_new_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-1 offset-md-2">
                <button type="submit" class="btn btn-primary">
                  {{ __('Change') }}
                </button>
              </div>
              <div class="col-md-1">
                <button type="reset" class="btn btn-outline-success">
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
