<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validationLoginRequest;
use App\Http\Requests\validationRegisterRequest;
use App\Http\Requests\CartRequest;
use App\Slide;
use App\Product;
use App\Category;
use Session;
use App\Cart;
use App\User;
use App\Bill;
use App\BillDetail;
use App\Comment;
use Hash;
use Auth;

class HomeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        $newproducts = Product::where('status', 1)->paginate();
        $topproducts = Product::where('promotion_price', '<>', '0')->paginate(config('app.pagination'));

        return view('Client.home', compact('slide', 'newproducts', 'topproducts'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
