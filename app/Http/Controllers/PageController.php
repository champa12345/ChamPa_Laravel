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


class PageController extends Controller
{
   public function __construct()
    {
        if (Auth::check())
        {
            view()->share('user', Auth::user());
        }
    }

    public function contact()
    {
        return view('Client.contacts');
    }
    
    public function about()
    {
        return view('Client.about');
    }
    
    public function viewCart()
    {
         return view('Client.cart');
    }

    public function addToCart(Request $req)
    {
        $product = Product::find($req->id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $req->id);
        $req->Session()->put('cart', $cart);

        return redirect()->back();
    }

    public function searchProduct(Request  $req)
    {
        $searchProducts = Product::where('name', 'like', "%".$req->key."%" )
                            ->orWhere('price', $req->key )
                            ->get();

        return view('Client.searchProduct', compact('searchProducts'));
    }

}

