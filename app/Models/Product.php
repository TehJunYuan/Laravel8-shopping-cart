<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','description','price','image','quantity','CategoryID'];
    public function product(){
        return $this->belongsTo('App\Models\Category');
    }

    public function mycart(){
        return $this->hasmany('App\myCart');
    }

    public static function cartCount(){
        $noItem=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select(DB::raw('COUNT(*) as count_item'))
        ->where('my_carts.orderID','=','')//'' means haven't make payment
        ->where('my_carts.userID','=',Auth::id())//item match with current user logined
        ->groupBy('my_carts.userID')
        ->first();

        return $noItem;
    }
}