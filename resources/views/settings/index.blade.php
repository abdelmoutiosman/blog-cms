@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Settings</div>

                    <div class="card-body">
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
                        <form action="{{url(route('setting.update'))}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="blog_name">blog_name</label>
                                <input type="text" class="form-control" name="blog_name" value="{{$settings->blog_name}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$settings->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="blog_email">blog_email</label>
                                <input type="text" class="form-control" name="blog_email" value="{{$settings->blog_email}}">
                            </div>
                            <div class="form-group">
                                <label for="address">address</label>
                                <input type="text" class="form-control" name="address" value="{{$settings->address}}">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-edit btn-xs"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
