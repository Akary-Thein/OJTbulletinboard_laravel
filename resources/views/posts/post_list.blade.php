@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Post List</div>

        <div class="card-body">

          <div class="form-group row">
            <div class="col-md-4">
              <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="search" autofocus>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w80">{{ __('Search') }}</button>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w80">{{ __('Add') }}</button>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w80">{{ __('Upload') }}</button>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w80">{{ __('Download') }}</button>
            </div>
          </div>

          <!-- Table -->
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
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte1') }}" data-toggle="modal" data-target="#exampleModal">{{ __('Tilte 1') }}</a>
                </td>
                <td>Description 1</td>
                <td>User 1</td>
                <td>2019/05/10</td>
                <td>
                  <a class="nav-link" href="{{ url('update_post') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte2') }}">{{ __('Tilte 2') }}</a>
                </td>
                <td>Description 2</td>
                <td>User 1</td>
                <td>2019/05/04</td>
                <td>
                  <a class="nav-link" href="{{ url('Edit') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte3') }}">{{ __('Tilte 3') }}</a>
                </td>
                <td>Description 3</td>
                <td>User 1</td>
                <td>2019/04/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Edit') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte4') }}">{{ __('Tilte 4') }}</a>
                </td>
                <td>Description 4</td>
                <td>User 2</td>
                <td>2019/03/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Edit') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte5') }}">{{ __('Tilte 5') }}</a>
                </td>
                <td>Description 5</td>
                <td>User 2</td>
                <td>2019/02/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Edit') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte6') }}">{{ __('Tilte 6') }}</a>
                </td>
                <td>Description 6</td>
                <td>User 2</td>
                <td>2019/02/09</td>
                <td>
                  <a class="nav-link" href="{{ url('Edit') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('Tilte7') }}">{{ __('Tilte 7') }}</a>
                </td>
                <td>Description 7</td>
                <td>User 2</td>
                <td>2019/10/01</td>
                <td>
                  <a class="nav-link" href="{{ url('Edit') }}">{{ __('Edit') }}</a>
                </td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- Pagination -->
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <div class="col-md-4 ml-auto">Title 1</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Description</div>
                      <div class="col-md-4 ml-auto">This is title 1</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Status</div>
                      <div class="col-md-4 ml-auto">Active</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Created At</div>
                      <div class="col-md-4 ml-auto">2019/05/10</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Created User</div>
                      <div class="col-md-4 ml-auto">User 1</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Last Updated At</div>
                      <div class="col-md-4 ml-auto">2019/07/10</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Updated User</div>
                      <div class="col-md-4 ml-auto">User2</div>
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
