<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\Category;
use Session;
use Auth;

class ManageProductController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('addProduct')->with('categoryID',Category::all());
    }

    public function store(){
        $r=request();  //received the data by GET or POST mothod 
        $image=$r->file('productImage');        
        $image->move('images',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 
        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'CategoryID'=>$r->CategoryID,
            'image'=>$imageName,
        ]);
        Session::flash('success',"Product create successfully!");
        Return redirect()->route('viewProduct');
    }

    public function delete($id){
        
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Session::flash('success',"Product was delete successfully!");
        Return redirect()->route('viewProduct');
    }

    public function edit($id){
        $products = Product::all()->where('id',$id);
        return view('editProduct')->with('products', $products)
                                  ->with('categoryID',Category::all());
    }

    
        
    public function view(){
        //only admin can access to the page. It will check the account is an user or admin.
        if(Auth::id()!=1){
            Session::flash('success','Admin only allow to access this page!');
            return redirect(route('products')); 
        }
        // Select categoryID from product , Select id from categories
        // use join table 
        $viewProduct = DB::table("products")
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->select('products.*','categories.name as cName')
        ->get();
        
        return view('showProduct')
        ->with('products',$viewProduct);
    }

    public function update(){
        $r=request();
        $products=Product::find($r->productID);
        
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
            } 

            $products->name=$r->productName;
            $products->description=$r->productDescription;
            $products->price=$r->productPrice;
            $products->quantity=$r->productQuantity;
            $products->CategoryID=$r->CategoryID;
            $products->save();

        return redirect()->route('viewProduct');
    }
}
