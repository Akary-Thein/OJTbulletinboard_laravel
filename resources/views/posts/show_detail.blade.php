@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Post List</div>

        <div class="card-body">

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
      </div>
    </div>
  </div>
</div>
@endsection


<li><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#yourModal"></li>

<div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{$post->description}}</h4>
      </div>
      <div class="modal-body">
        {{$post->title}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
