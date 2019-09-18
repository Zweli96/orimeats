<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::orderBy('id', 'asc')->paginate(5);
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('image')) {
            //getfilename with extension
            $fileNameWithExt  = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //store image
            $path = $request->file('image')->storeAs('public/img/product_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //create post
        $product = new Product;
        $product->name = $request->input('name');
        $product->image = $fileNameToStore;
        $product->save();

        return redirect('/products')->with('success', 'New Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
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
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('image')) {
            //getfilename with extension
            $fileNameWithExt  = $request->file('image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //store image
            $path = $request->file('image')->storeAs('public/img/product_images', $fileNameToStore);
        }

        //create post
        $product = Product::find($id);
        $product->name = $request->input('name');
        if ($request->hasFile('image')) {
            $product->image = $fileNameToStore;
        }
        $product->save();

        return redirect('/products')->with('success', 'Product Updated');
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
        if ($product->image !== 'noimage.jpg') {
            Storage::delete('public/img/product_images/' . $product->image);
        }
        $product->delete();
        return redirect('/products')->with('success', 'Product Removed');
    }
}
