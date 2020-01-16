@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">User List</div>

        <div class="card-body">

          <div class="form-group row">
            <div class="col-md-2">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
            </div>
            <div class="col-md-2">
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            </div>
            <div class="col-md-2">
              <input id="creared_from" type="text" class="form-control @error('created_from') is-invalid @enderror" name="created_from" value="{{ old('created_from') }}" required autocomplete="created_from" placeholder="Created From" autofocus>
            </div>
            <div class="col-md-2">
              <input id="created_to" type="text" class="form-control @error('created_to') is-invalid @enderror" name="created_to" value="{{ old('created_to') }}" required autocomplete="created_to" placeholder="Created To" autofocus>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w80">{{ __('Search') }}</button>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary w80">{{ __('Add') }}</button>
            </div>
          </div>

          <!-- Table -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created User</th>
                <th scope="col">Phone</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Created Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User1') }}" data-toggle="modal" data-target="#exampleModal">{{ __('User 1') }}</a>
                </td>
                <td>user1@gmail.com</td>
                <td>User 1</td>
                <td>09974199366</td>
                <td>1996/10/20</td>
                <td>2019/05/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User2') }}">{{ __('User 2') }}</a>
                </td>
                <td>user2@gmail.com</td>
                <td>User 1</td>
                <td>09974199366</td>
                <td>1996/10/20</td>
                <td>2019/05/04</td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User3') }}">{{ __('User 3') }}</a>
                </td>
                <td>user3@gmail.com</td>
                <td>User 1</td>
                <td>09974199366</td>
                <td>1996/10/20</td>
                <td>2019/04/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User4') }}">{{ __('User 4') }}</a>
                </td>
                <td>user4@gmail.com</td>
                <td>User 2</td>
                <td>09974199367</td>
                <td>1991/04/14</td>
                <td>2019/03/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User5') }}">{{ __('User 5') }}</a>
                </td>
                <td>user5@gmail.com</td>
                <td>User 2</td>
                <td>09974199367</td>
                <td>1991/04/14</td>
                <td>2019/02/10</td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User6') }}">{{ __('User 6') }}</a>
                </td>
                <td>user6@gmail.com</td>
                <td>User 2</td>
                <td>09974199367</td>
                <td>1991/04/14</td>
                <td>2019/02/09</td>
                <td>
                  <a class="nav-link" href="{{ url('Delete') }}">{{ __('Delete') }}</a>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="nav-link" href="{{ url('User7') }}">{{ __('User 7') }}</a>
                </td>
                <td>user7@gmail.com</td>
                <td>User 2</td>
                <td>09974199367</td>
                <td>1991/04/14</td>
                <td>2019/10/01</td>
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
                  <h5 class="modal-title" id="exampleModalLabel">User Detail</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-4">Name </div>
                      <div class="col-md-4 ml-auto">User 1</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Email</div>
                      <div class="col-md-4 ml-auto">user1@gmail.com</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Phone</div>
                      <div class="col-md-4 ml-auto">09974199366</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Birth Date</div>
                      <div class="col-md-4 ml-auto">1996/10/20</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">Address</div>
                      <div class="col-md-4 ml-auto">Pazundaung</div>
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
