@extends('layouts.app')


@section('content')

    
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Add Category
            </div>
        </div>
        
        <div class="card-body">
            <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Add Category <span class="text-danger">*</span></label><br>
                    <input type="text" name="category" class="form-control" placeholder="Category Name" value="{{old('category')}}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    
    
    @endsection