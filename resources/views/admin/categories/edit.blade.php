@extends('layouts.app')


@section('content')


    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Add Category
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('category.update',['id'=>$category->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Add Category <span class="text-danger">*</span></label><br>
                    <input type="text" name="category" class="form-control" placeholder="Category Name" value="{{$category->category}}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>


@endsection