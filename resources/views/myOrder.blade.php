@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <h3>My Order</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Order ID</td>
                        <td>Product Name</td>
                        <td>Date Time</td>
                        <td>Amount</td>
                        <td>quantity</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myorders as $myorder)
                    <tr>
                        <td>{{$myorder->orderID}}</td>
                        <td>{{$myorder->name}}</td> 
                        <td>{{$myorder->created_at}}</td>
                        <td>{{$myorder->amount}}</td>
                        <td>{{$myorder->qty}}</td>
                        <td>{{$myorder->paymentStatus}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <br><br>
    </div>
    <div class="col-sm-2"></div>
</div>
@endsection