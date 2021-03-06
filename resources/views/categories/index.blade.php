@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        @include('flash::message')
                        @if(count($records))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$record->name}}</td>
                                    <td><a href="{{url(route('category.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit btn-xs"></i></a></td>
                                    <td><a href="{{url(route('category.delete',$record->id))}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-danger" role="alert">
                                NoData
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
