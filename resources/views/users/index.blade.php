@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        @include('flash::message')
                        @if(count($records))
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles_list</th>
                                    <th scope="col">Admin/NotAdmin</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($records as $record)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td><img src="https://www.pngarts.com/files/3/Avatar-PNG-Picture.png" style="height:100px;width: 100px"></td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->email}}</td>
                                        <td>
                                            @foreach($record->roles as $index=>$role)
                                                <span class="label label-success">
                                                {{$role->name}} {{$index+1 < $record->roles()->count() ? ',' : ''}}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($record->admin)
                                                <a href="{{url(route('user.notadmin',$record->id))}}" class="btn btn-primary">Not Admin</a>
                                            @else
                                                <a href="{{url(route('user.admin',$record->id))}}" class="btn btn-primary">Admin</a>
                                            @endif
                                        </td>
                                        <td><a href="{{url(route('user.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit btn-xs"></i></a></td>
                                        <td><a href="{{url(route('user.delete',$record->id))}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
