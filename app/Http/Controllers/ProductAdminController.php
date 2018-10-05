<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        return view('admin.product.listProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
        } 
        catch (ModelNotFoundException $e) {

        }
        $product->name = $req->Name;
        $product->category_id = $req->Category_ID;
        $product->description = $req->Description;
        $product->price = $req->Price;
        $product->promotion_price = $req->Promotion_Price;
        $product->unit = $req->Unit;
        $product->status = $req->Status;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $nameImg = str_random(config('img_name_length')) . "_". $name;
            $file->move('storage/img/products/', $nameImg);
            $product->image = $nameImg;
        }
        else {
            $product->image = "";
        }
        $product->save();

        return redirect('listproducts.edit' . $id)->with('message', trans('home_admin.success'));
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
        $product = new Product;
        $product->name = $req->Name;
        $product->category_id = $req->Category_ID;
        $product->description = $req->Description;
        $product->price = $req->Price;
        $product->promotion_price = $req->Promotion_Price;
        $product->unit = $req->Unit;
        $product->status = $req->Status;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $nameImg = str_random(config('img_name_length')) . "_". $name;
            $file->move('storage/img/products/', $nameImg);
            $product->image = $nameImg;
        }
        else {
            $product->image = "";
        }
        $product->save();

        return redirect('listproducts.index')->with('message', trans('home_admin.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::destroy($id)

        return redirect('listproducts.index')->with('message', trans('home_admin.success'));
    }
}
