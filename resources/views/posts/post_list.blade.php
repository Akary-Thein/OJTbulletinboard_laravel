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
          @if(isset($details))
          <p> The Search results for your query <b> {{ $query ?? '' }} </b> are :</p>
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
            @foreach ($details as $post)
            <tr>
            <td>
            <a href="{{ route('posts.show',$post->id) }}" class="nav-link btnshow">{{$post->title}}</a> 
            <!-- <a href="{{ route('posts.show',$post->id) }}" data-toggle="modal" data-target="#exampleModal3">{{$post->title}}</a>     -->
</td>
            <!-- <a href="{{ route('posts.show',$post->id) }}" data-toggle="modal" data-target="#exampleModal3">{{$post->title}}</a></td> -->
            <!-- <a class="nav-link" href="{{ route('posts.show',$post->id) }}" data-toggle="modal" data-target="#exampleModalCenter{{$post->id}}">{{ $post->title }}</a>   
            
            <button type="button" class="btn btn-success" id="edit-item" data-id="{{ $post->id }}" data-title="{{ $post->title }}">{{ $post->title }}</button></td> -->
            <!-- <td>
            <a class="nav-link" href="{{ route('posts.show',$post->id) }}" data-toggle="modal" data-target="#view_{{$post->id}}" class="btn btn-default">{{ $post->title }}</a>
</td> -->
            <!-- <button type="button" class="btn btn-success" id="post_detail" data-item-id="1">{{ $post->title }}</button> -->
            
            <!-- <a class="nav-link" href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a></td> -->
                <!-- <td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#yourModal">
                   <a class="nav-link" href="{{ route('posts.show',$post->id) }}" data-toggle="modal" data-target="#exampleModalCenter{{$post->id}}">{{ $post->title }}</a>
                </td> -->
                <td>{{ $post->description }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at->format('Y/m/d') }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <form id="frm_{{$post->id}}" action="{{ route('posts.destroy',$post->id) }}" method="post">
                    <input type="hidden" name="_method" value="delete"/>
                      @csrf
                        <a class="btn btn-danger" title="Delete"
                           href="javascript:if(confirm('Are you sure you want to delete this post?')) $('#frm_{{$post->id}}').submit()">
                            {{ __('Delete') }}
                        </a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $details->links() !!}
          @else
            {{ $message }}
          @endif


         

<!-- Modal -->
          <div class="modal fade showmodal" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="showmodal" aria-hidden="true">
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
                      <div class="col-md-4">Tilte</div>
                      <div class="col-md-4 ml-auto">{{ $post->title }}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Description</div>
                      <div class="col-md-4 ml-auto">{{ $post->description }}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Status</div>
                      <div class="col-md-4 ml-auto">{{ $post->status }}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Created At</div>
                      <div class="col-md-4 ml-auto">{{ $post->created_at }}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Created User</div>
                      <div class="col-md-4 ml-auto">{{ $post->create_user_id }}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Last Updated At</div>
                      <div class="col-md-4 ml-auto">{{ $post->updated_at }}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Updated User</div>
                      <div class="col-md-4 ml-auto">{{ $post->updated_user_id }}</div>
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
