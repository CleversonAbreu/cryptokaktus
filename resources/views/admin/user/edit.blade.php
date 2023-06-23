@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User
                        <a href="{{url('admin/users')}}" class="btn btn-primary float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <form action="{{url('admin/users/'.$user->id)}}" method="POST" class="forms-sample">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="username">Username</label>
                                  <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name"
                                   placeholder="Username" required>
                                  @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input type="email" value="{{$user->email}}" class="form-control" id="email"
                                   name="email" placeholder="Email" required>
                                  @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" value="{{$user->name}}" class="form-control" id="password"
                                   name="password" placeholder="Password" required>
                                   @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="passwordconfirm">Password Confirm</label>
                                  <input id="password" type="password" value="{{$user->name}}"
                                  class="form-control @error('password') is-invalid @enderror"
                                   name="password_confirmation" placeholder="Password Confirm" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection