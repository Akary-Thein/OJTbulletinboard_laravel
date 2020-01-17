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
                    <form action="/searchpost" method="get">
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
              <a class="btn btn-primary w100" href="{{ url('importExportView') }}">{{ __('Upload') }}</a>
              <!-- <button type="submit" class="btn btn-primary w100">{{ __('Upload') }}</button>
            </form> -->
            </div>

            <div class="form-group col-md-2">
              <form method='post' action="/export" class="w100">
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
            <td><a class="nav-link" href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a></td>
                <!-- <td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#yourModal">
                   <a class="nav-link" href="{{ route('posts.show',$post->id) }}" data-toggle="modal" data-target="#yourModal">{{ $post->title }}</a>
                </td> -->
                <td>{{ $post->description }}</td>
                <td>{{ $post->create_user_id }}</td>
                <td>{{ date('Y/m/d', strtotime($post->created_at)) }}</td>
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
