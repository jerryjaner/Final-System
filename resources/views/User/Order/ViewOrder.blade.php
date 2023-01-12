@extends('User.master')
@section('title')

   View Order

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
      font-size: 14px;
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

<h3 class="w3ls-title" style="margin-top: 10px;">View Order</h3><br>

<center>
<table id="example1" class="table table-bordered table-striped">        
  <thead>
    <tr>
      {{-- <th style="text-align: center;">Cancel Order</th> --}}
     {{--  <th style="text-align:  center;">Order #</th> --}}
      <th style="text-align: center;">Customer Name</th>
      <th style="text-align: center;">Order Price Total</th>
      <th style="text-align: center;">Order Status</th>
      <th style="text-align: center;">Payment Type</th>
      <th style="text-align: center;">Order Date</th>
      <th style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>

    @php($i = 1)
    
    @foreach ($orders  as $order)
    @if(Auth::user()->id == $order -> user_id)
       
          <tr>
             @if($order -> order_status == 'Cancelled')
            
             

             @else

              @if($order -> google_id == null)

               <td style="text-align: center; color:  black;">{{$order->name}} {{$order->middlename}} {{$order -> lastname}}</td>

              @else

               <td style="text-align: center; color:  black;">{{$order->google_name}}</td>

              @endif
               
               @if($order -> payment_type == 'Cash_on_Delivery')

                  @php($total_amount = $order -> order_total + $order -> order_shippingfee)

                  <td style="text-align: center; color:  black;">{{ $total_amount }}</td>   

               @else

                 <td style="text-align: center; color:  black;">{{$order->order_total}}</td>   

               @endif


               <td style="text-align: center; color:  black;">{{$order->order_status}} </td>
               <td style="text-align: center; color:  black;">

                  @if($order -> payment_type == 'Cash_on_Delivery')

                    Cash on Delivery 

                  @elseif($order -> payment_type == 'Cash_on_Pickup')

                    Cash on Pickup
                  @endif

               </td>
               <td style="text-align: center; color:  black;">{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString()}}</td>
              
               <td style="text-align: center;"> 
                  

                 
               
                    <ul style="list-style: none; text-decoration: none;"> 
                      <li class="dropdown head-dpdn" style="list-style: none; text-decoration: none;" >
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 14px; text-decoration: none;">More<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li style="list-style: none;">
                            <a href="{{route('view_order',['id'=>$order->id])}}" style="color: blue;"> 
                               View Order Details
                              </a>
                           </li> 

                          
                          <li>


                            @if($order->order_status == 'pending')
                               <a href="#" data-toggle="modal" data-target="#CancelOrder{{$order->id}}" style="color:red;">Cancel Order</a>
                            @else
                           {{--  <a href="#" disable type="button" class="btn btn-primary">Cancel Order</a> --}}
                            @endif

                          </li>  


                        </ul> 
                      </li>
                    </ul> 
                    <div class="clearfix"> </div>
                  </div> 

               </td>
              @endif
          </tr>
          
          <!-- cancel order modal --> 
             <div class="modal video-modal fade" id="CancelOrder{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="CancelOrder">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                               
                      </div>
                      <section>
                        <div class="modal-body">
                          <form action="{{route('cancel_customer_order')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}">
                           
                            <h2 style="text-align: center; color: black; ">
                               <b> Are you sure ?</b>
                            </h2>
                            <br>

                            <h4 style="text-align: center; color: black;">  You want to <b><span style="color: red;">Cancel</span></b> your order </h4> 
                            <br>
                            <br>

                          <center>   
                            <div>
                              <button type="button" class="btn btn-danger"  data-dismiss="modal" style="margin-right: 10px; width: 100px; outline: none;">No</button> 
                        
                              <button type="submit" name="btn" class="btn btn-primary" style="margin-left: 10px; width: 100px; outline: none;">Yes</button>
                            </div>  
                          </center>  

                        </form>
                        </div>
                      </section>
                    </div>
                </div>
              </div>

     @endif
     @endforeach
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>    
        </tr>
  </tbody>
</table>
</center>


@endsection