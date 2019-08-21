@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>

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
                        <form action="{{url(route('post.store'))}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" rows="8" cols="8"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="featured">featured</label>
                                <input type="file" class="form-control-file" name="featured">
                            </div>
                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
