@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Create Post</div>

        <div class="card-body">
          <form method="POST" action="{{ route('posts.confirmPostCreateForm') }}" >
          @csrf
            <div class="form-group row">
              <label for="title" class="col-md-3 col-form-label text-md-left">{{ __('Title') }}</label>

              <div class="col-md-3">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="title" autofocus>

                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-3 col-form-label text-md-left">{{ __('Description') }}</label>

              <div class="col-md-3">
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"></textarea>

                  @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <label class="col-md-1 col-form-label text-md-left text-danger">*</label>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-1 offset-md-2">
                <button type="submit" class="btn btn-primary" value="confirm" name='action'>
                  {{ __('Confirm') }}
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
