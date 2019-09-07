@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit post</div>
                    <div class="card-body">
                        <form action="{{url(route('post.update',$model->id))}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$model->title}}">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" id="content" rows="8" cols="8">{{$model->content}}</textarea>
                            </div>
                            <div class="form-check">
                                @foreach($tags as $tag)
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="tag[]" value="{{$tag->id}}"
                                    @foreach($model->tags as $ta)
                                        @if($tag->id == $ta->id)
                                            checked
                                        @endif
                                    @endforeach
                                    > {{$tag->tag}} </label><br>
                                @endforeach
{{--                                tags is the relation name--}}
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        @if($category->id ==$model->category_id)
                                            <option value="{{$category->id}}" selected>
                                                {{$category->name}}
                                            </option>
                                        @else
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="featured">featured</label>
                                <input type="file" class="form-control-file" name="featured">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit btn-xs"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
