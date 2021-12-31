<?php

namespace App\Http\Controllers;
use PDF;
use DB;
use Auth;
use App\Models\myOrder;

class PDFController extends Controller
{
    //
    public function pdfReport()

    {

        $orders=DB::table('my_orders')

        ->select('my_orders.id','my_orders.amount','my_orders.paymentStatus')

        ->where('my_orders.userID','=',Auth::id())

        ->get();

         

        $pdf = PDF::loadView('myPDF', compact('orders'));

   

        return $pdf->download('OrderReport.pdf');

    }
}
