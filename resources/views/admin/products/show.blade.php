@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">
               <div class="text-center">
                   <h2>Products Info</h2>
               </div>
            </div>
            <div class="card-body">
                <table class="table table table-hover">
                    <tr>
                        <th>Products Name</th>
                        <th>Products Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                        @if($products->count()<1)

                               <tr>
                                   <th colspan="5"><div class="text-center text-danger">No Product Uploaded Yet</div></th>
                               </tr>
                            @else

                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->product}}</td>
                                <td><img src="{{$product->image}}" alt="{{$product->$product}}" height="80px" width="90px"></td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category->category}}</td>
                                <td><a href="{{route('product.edit',['id'=>$product->slug])}}"><i class="fas fa-edit"></i></a></td>
                                <td><a href="{{route('product.delete',['id'=>$product->id])}}" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>

                            </tr>



                            @endforeach


                            @endif

                </table>
            </div>
        </div>
    </div>

    @stop