@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Posts</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$post->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Users</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$user->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Categories</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$category->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Tags</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$tag->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Trashed Posts</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$trashed->count()}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
