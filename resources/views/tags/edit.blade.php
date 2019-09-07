@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Tag</div>
                    <div class="card-body">
                        <form action="{{url(route('tag.update',$model->id))}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" class="form-control" name="tag" value="{{$model->tag}}">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit btn-xs"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
