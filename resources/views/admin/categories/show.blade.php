@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header">
            All Categories
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </tr>

                    @foreach($categories as $category)

                        <tr>
                            <td>{{$category->category}}</td>
                            <td><a href="{{route('category.edit',['id'=>$category->id])}}"><i class="fas fa-edit"></i></a></td>
                            <td><a href="{{route('category.delete',['id'=>$category->id])}}" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>

                        @endforeach

            </table>
        </div>
    </div>

    @endsection