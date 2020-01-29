@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Upload CSV File</div>

        <div class="card-body">
            <form action="{{ route('posts.uploadPost') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group row">
              <label for="uploaded_file" class="col-md-3 col-form-label text-md-left">{{ __('Import File From') }}</label>

              <div class="col-md-3">
              <input type="file" name="uploaded_file" class="@error('uploaded_file') is-invalid @enderror">

                  @error('uploaded_file')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
               </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-2 offset-md-2">
                <button type="submit" class="btn btn-primary">
                  {{ __('Import File') }}
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
