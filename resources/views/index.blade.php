@extends('layouts.frontend')

@section('title')

    Ecommerce Website | Home

    @stop


@section('content')

    <div class="container">
        <div class="row pt120">
            <div class="books-grid">

                <div class="row mb30">

                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="{{$product->image}}" alt="book">
                                <div class="new">New</div>
                                <div class="sale">Sale</div>
                                <div class="overlay overlay-books"></div>
                            </div>

                            <div class="books-item-info">
                                <h5 class="books-title"><a href="{{route('single.product',['slug'=>$product->slug])}}">{{$product->product}}</a></h5>

                                <div class="books-price">{{$product->price}}</div>
                            </div>

                            <form action="{{route('cart.add')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="pid" value="{{$product->id}}">
                                <input type="hidden" name="qty" value="1">
                                <button class="btn btn-small btn--dark add">

                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </button>
                            </form>



                        </div>
                    </div>
                        @endforeach
                </div>

                <div class="row pb120">

                    <div class="col-lg-12">
                        {{$products->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    @endsection

