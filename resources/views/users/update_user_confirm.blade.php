@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Update User Confirmation</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="name" class="col-form-label text-md-left">{{ __('Name') }}</label>
                </div>

                <div class="form-group">
                  <label for="email" class="col-form-label text-md-left">{{ __('Email Address') }}</label>
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
                  <label for="phone" class="col-form-label text-md-left">97894655</label>
                </div>

                <div class="form-group">
                  <label for="dob" class="col-form-label text-md-left">2004/12/01</label>
                </div>

                <div class="form-group">
                  <label for="address" class="col-form-label text-md-left">Hledan, Yangon</label>
                </div>

              </div>

              <div class="col-md-3">
                <img id="output" src="./img/default.png" alt="default" />
              </div>

            </div>

            <div class="form-group row mb-0">
              <div class="col-md-1 offset-md-2">
                <button type="submit" class="btn btn-primary">
                  {{ __('Update') }}
                </button>
              </div>
              <div class="col-md-1">
                <button type="submit" class="btn btn-outline-success">
                  {{ __('Cancel') }}
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
