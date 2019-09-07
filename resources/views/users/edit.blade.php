@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('flash::message')
                    <div class="card-body">
                        <form action="{{url(route('user.update',$model->id))}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" name="name" value="{{$model->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$model->email}}">
                            </div>
                            <div class="form-group">
                                <label>Roles_List</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles_list[]" value="super_admin" {{$model->hasRole('super_admin') ? 'checked' : ''}}> super_admin
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles_list[]" value="user" {{$model->hasRole('user') ? 'checked' : ''}}> user
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter User password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Password Confirmation">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit btn-xs"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
