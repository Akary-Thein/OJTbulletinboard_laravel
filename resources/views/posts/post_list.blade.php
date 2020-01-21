@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Post List</div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-5">
              <form action="{{ route('posts.searchPost') }}" method="get">
                @csrf
                <div class="form-group row">
                  <input id="search" type="text" class="form-control col-md-5 offset-md-1" name="search" value="{{ request('search') }}" autocomplete="search" autofocus>
                    <div class="col-md-5 offset-md-1">
                      <button type="submit" class="btn btn-primary w100">{{ __('Search') }}</button>
                    </div>
                </div>
              </form>
            </div>
            <div class="form-group col-md-2">
             <a class="btn btn-primary w100" href="{{ route('posts.create') }}">{{ __('Add') }}</a>
            </div>
            <div class="form-group col-md-2">
              <!-- <form method='post' action='/importExportView' class="w100">
              @csrf -->
              <a class="btn btn-primary w100" href="{{ route('posts.uploadPostForm') }}">{{ __('Upload') }}</a>
              <!-- <button type="submit" class="btn btn-primary w100">{{ __('Upload') }}</button>
              </form> -->
            </div>
            <div class="form-group col-md-2">
              <form method='post' action="{{ route('posts.downloadPost') }}" class="w100">
              @csrf
                <button type="submit" class="btn btn-primary w100">{{ __('Download') }}</button>
              </form>
            </div>
          </div>

          <!-- Table -->
          @if(isset($posts))
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Post Title</th>
                <th scope="col">Post Description</th>
                <th scope="col">Posted User</th>
                <th scope="col">Posted Date</th>
                <th colspan="2" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>
                  <a href="#" class="nav-link" data-toggle="modal" data-target="#showmodal" 
                  data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-description="{{ $post->description }}"
                  data-status="{{ $post->status }}" data-created-at="{{ $post->created_at->format('Y/m/d') }}" 
                  data-created-user="{{ $post->user->name }}" data-updated-at="{{ $post->updated_at->format('Y/m/d') }}"
                  data-updated-user="{{ $post->user->name }}">
                  {{ $post->title }}</a>
                </td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at->format('Y/m/d') }}</td>
                <td>
                  <a class="btn btn-primary w100" href="{{ route('posts.edit',$post->id) }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <form id="frm_{{$post->id}}" action="{{ route('posts.destroy',$post->id) }}" method="post">
                    <input type="hidden" name="_method" value="delete"/>
                    @csrf
                    <a class="btn btn-danger w100" title="Delete"
                      href="javascript:if(confirm('Are you sure you want to delete this post?')) $('#frm_{{$post->id}}').submit()">
                      {{ __('Delete') }}
                    </a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $posts->links() !!}
          @else
            {{$error}}
          @endif
          

          <!-- Modal -->
          <div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="showmodal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Post Detail</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      <label class="col-md-4">Title</label>
                      <label class="col-md-8" id="modal-title"></label>
                    </div>
                    <div class="row">
                      <label class="col-md-4">Description</label>
                      <label class="col-md-8" id="modal-description"></label>
                    </div>
                    <div class="row">
                      <label class="col-md-4">Status</label>
                      <label class="col-md-8" id="modal-status"></label>
                    </div>
                    <div class="row">
                      <label class="col-md-4">Created At</label>
                      <label class="col-md-8" id="modal-created-at"></label>
                    </div>
                    <div class="row">
                      <label class="col-md-4">Created User</label>
                      <label class="col-md-8" id="modal-created-user"></label>
                    </div>
                    <div class="row">
                      <label class="col-md-4">Last Updated At</label>
                      <label class="col-md-8" id="modal-updated-at"></label>
                    </div>
                    <div class="row">
                      <label class="col-md-4">Updated User</label>
                      <label class="col-md-8" id="modal-updated-user"></label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
@endsection
