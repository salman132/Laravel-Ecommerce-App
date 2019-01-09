@extends('layouts.app')


@section('content')
    
    
    
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Add Products
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="product" placeholder="Product Name" class="form-control" value="{{old('product')}}">
                </div>
                <div class="form-group">
                    <label for="price">Price <span class="text-danger">*</span></label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="For Ex: 1300">
                </div>
                <div class="form-group">
                    <label for="category">Select a Category: <span class="text-danger">*</span></label><br>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)

                            <option value="{{$category->id}}">{{$category->category}}</option>

                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Image <span class="text-danger">*</span></label><br>
                    <input type="file" name="image" >
                </div>
                <div class="form-group">
                    <label>Product Descriptions </label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Products Descriptions" id="summernote"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Upload" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    
    
    @stop