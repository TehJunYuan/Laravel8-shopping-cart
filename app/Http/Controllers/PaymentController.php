<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use DB;
use Auth;
use Session;
use App\Models\myCart;
use App\Models\myOrder;
use Notification;

class PaymentController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

     public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        $newORder=myOrder::Create([  //create new order in myOder with the log in  UserID
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(),
            'amount'=>$request->sub,

        ]);

        $orderID=DB::table('my_orders')
        ->where('userID','=',Auth::id())->orderBy('created_at','desc')->first(); //get the orderID just now created   

        $item=$request->input('cid');
        foreach($item as $items=>$value){
            $carts=myCart::find($value); //get the care item record
            $carts->orderID=$orderID->id; //binding the orderID with cart item record
            $carts->save();
        }

        $email="junyuan741@gmail.com";
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));

        Session::flash('success','Order successfully!');
        return back();
    }

    public function show(){

        $myorders=DB::table('my_orders')
        ->leftjoin('my_carts', 'my_orders.id', '=', 'my_carts.orderID')
        ->leftjoin('products', 'products.id', '=', 'my_carts.productID')
        ->select('my_carts.*','my_orders.*','products.*','my_carts.quantity as qty')
        ->where('my_orders.userID','=',Auth::id())
        ->get();   
        return view('myOrder')->with('myorders',$myorders);
    }
}