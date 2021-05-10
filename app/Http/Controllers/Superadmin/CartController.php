<?php

namespace App\Http\Controllers\superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;	

class CartController extends Controller
{
     public function store()
    {
    	if (request()->stok_barang_id) {
    		Cart::create(request()->all());
    	}

    	return redirect()->back();
    }

    public function update(Cart $cart)
    {
    	$cart->update(request()->all());

    	return redirect()->back();
    }
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->back();
    }
}
