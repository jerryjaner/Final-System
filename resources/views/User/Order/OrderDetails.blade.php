@extends('User.master')
@section('title')

   View Details

@endsection
@section('content')
<style>
    #example1{
      font-family: arial ,helvetica, sans-serif;
      border-collapse: collapse;
      width: 50%;


    }
    #example1 td, #example1 th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    #example1 tr:nth-child(even){
      background-color: #ddd;
    }

    #example1 th{
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #dc413a;
      color:white;
    } 
</style> 
<h3 class="w3ls-title" style="margin-top: 10px;">View Order Details</h3><br>

<center>
<table id="example1" class="table table-bordered table-striped">        
  <thead>
    <tr>
      <th style="text-align: center;">#</th>
      <th style="text-align:  center;">Items</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Price</th>
      <th style="text-align: center;">Total</th>
      
    </tr>
  </thead>
  <tbody>


      @php($i = 1)
      @php($sum = 0)
      @foreach($OrderD as $orderdetail)

      <tr>   
          <td style="text-align: center; color: black">{{$i++}}</td>
          <td style="text-align: center; color: black">{{$orderdetail -> dish_name}}</td>
          <td style="text-align: center; color: black">{{$orderdetail -> dish_qty}}</td>
          <td style="text-align: center; color: black">{{$orderdetail -> dish_price}}</td>
          <td style="text-align: center; color: black">{{$total = $orderdetail -> dish_price * $orderdetail -> dish_qty}}</td>
     </tr>
     
  
     
   
   
     @endforeach
       
 </tbody>
</table>
</center>

   
@endsection