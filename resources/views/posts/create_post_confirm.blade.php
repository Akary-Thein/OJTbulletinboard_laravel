@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Create Post Confirmation</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-group row">
              <label for="title" class="col-md-3 col-form-label text-md-left">{{ __('Title') }}</label>
              <label for="title" class="col-md-3 col-form-label text-md-left">Post1</label>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-3 col-form-label text-md-left">{{ __('Description') }}</label>
              <label for="title" class="col-md-6 col-form-label text-md-left">This is description for post 1</label>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-1 offset-md-2">
                <button type="submit" class="btn btn-primary">
                  {{ __('Create') }}
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