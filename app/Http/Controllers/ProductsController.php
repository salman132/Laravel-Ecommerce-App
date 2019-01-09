<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Auth;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.products')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product'=> 'required|max:200',
            'price'=> 'required|integer',
            'category'=> 'required|integer',
            'image'=> 'required|image',

        ]);
        $product = new Product();

        $product->product = $request->product;
        $product->slug = str_slug($request->product);
        $product->price = $request->price;
        $product->category_id = $request->category;

        if($request->hasFile('image')){
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/product',$image_new_name);
            $product->image = '/uploads/product/' . $image_new_name;

        }
        $product->description = $request->description;

        $product->save();

        Session::flash('success','You Added a Product');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.products.show')
            ->with('products',Product::all())
            ->with('category',Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit')
            ->with('product',Product::where('slug',$id)->first())
            ->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product'=> 'required|max:200',
            'price'=> 'required|integer',
            'category'=> 'required|integer',

        ]);
        $product = Product::find($id);

        $product->product = $request->product;
        $new = $product->slug = str_slug($request->product);
        $product->price = $request->price;
        $product->category_id = $request->category;

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/product', $image_new_name);
            $product->image = '/uploads/product/' . $image_new_name;
        }

        $product->description = $request->description;
        $product->save();
        Session::flash('success','You Updated Products Info');
        return view('admin.products.edit')
            ->with('product',Product::where('slug',$new)->first())
            ->with('categories',Category::all());

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();

        Session::flash('danger','You Deleted a Product');
        return redirect()->back();
    }
}
