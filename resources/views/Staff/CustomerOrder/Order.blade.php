@extends('Staff.master')
@section('title')

   Manage Order

@endsection
@section('content')
	

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
</style>


<!-- for display mesage -->

  @if(Session::get('sms'))

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> {{session::get('sms')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hiddden="true">&times;</span>
        </button>
      </div>
  @endif

        <div class="card my-5">
              <div class="card-header">
                <h3 class="card-title"><b> Manage Order </b></h3>
              </div>
            
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="text-align: center; ">#</th>
                      <th style="text-align: center;">Customer Name</th>
                      <th style="text-align: center;">TotalOrder Price</th>
                      <th style="text-align: center;">Shipping Fee</th>
                      <th style="text-align: center;">Order Status</th>
                      <th style="text-align: center;">Order Date</th>
                      <th style="text-align: center;">Payment Type</th>
                      <th style="text-align: center;">Payment Status</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  @php($i = 1)
                  @foreach($orders  as $order)

                  <div class="modal fade" id="orderstatus{{$order->id}}" tabindex="-1" aria-labelledby="orderstatus{{$order->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header text-center">
                          <h5 class="modal-title w-100" id="orderstatus{{$order->id}}">Update Order Status</h5>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('update_order')}}" method="post" onsubmit="btn.disabled = true; return true;">
                            @csrf
                            
                            <div class="form-group">
                             <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                             <label> Select Order Status  </label>
                              <select name="order_status" class="form-select"  required>
    
                                 <option value="" hidden> ---Select Order Status---</option>
                                    <option>On Process</option>

                                  @if($order -> payment_type == 'Cash_on_Pickup')

                                    <option>Ready to Pickup</option>

                                  @elseif($order -> payment_type == 'Cash_on_Delivery')

                                    <option>On Delivery</option>
                                    <option>Delivered</option>

                                  @endif

                                    <option>Cancelled</option>

                              </select>                        
                            </div>
                            <div class="modal-footer">
                             {{--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>  --}}
                              <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <tr>
                    <td>{{$i++}}</td>

                    @if($order -> google_id == null)

                         <td>{{$order-> name}} {{$order -> lastname}}</td>

                    @else
                         <td>{{$order-> google_name}}</td>
                    @endif

                    <td>₱ {{$order-> order_total}}</td>

                    @if($order -> payment_type =='Cash_on_Pickup')
                      <td>₱ 0 </td>
                    @else
                      <td>₱ {{$order -> order_shippingfee }}</td>
                    @endif
                    
                    <td>
                       @if($order->order_status =='pending')

                        <p class="text-center">
                         {{--  <strong>Pending</strong> --}}
                         <span class="badge badge-warning">Pending</span>
                        </p>

                      @elseif($order->order_status =="On Delivery")

                        <p class="text-center">
                           <span class="badge badge-info">On Delivery</span>
                        </p>

                      @elseif($order->order_status =='Delivered')

                        <p class="text-center">
                           <span class="badge badge-success">Delivered</span>
                        </p>

                      @elseif($order->order_status =='Cancelled')

                        <p class="text-center">
                           <span class="badge badge-danger">Cancelled</span>
                        </p>

                      @elseif($order->order_status == "On Process")

                        <p class="text-center">
                           <span class="badge badge-secondary">On Process</span>
                        </p>

                      @elseif($order->order_status == "Ready to Pickup")

                        <p class="text-center">
                           <span class="badge badge-primary">Ready to Pickup</span>
                        </p>

                       @elseif($order->order_status == "Already Picked up")

                        <p class="text-center">
                           <span class="badge badge-success">Already Picked up</span>
                        </p>

                      @endif


                    </td>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</td>

                    <td>
                       @if($order -> payment_type == 'Cash_on_Delivery') 

                                Cash on Delivery (COD)

                       @elseif($order -> payment_type == 'Cash_on_Pickup') 

                            Cash on Pickup (COP)

                      @endif
                    </td> 

                    <td>
                      @if($order -> payment_status == 'pending')

                        <p class="text-center">
                           <span class="badge badge-warning">Pending</span>
                        </p>

                      @elseif($order -> payment_status == 'Paid')

                        <p class="text-center">
                           <span class="badge badge-success">Paid</span>
                        </p>

                      @elseif($order -> payment_status == 'Cancelled')

                        <p class="text-center">
                           <span class="badge badge-danger">Cancelled</span>
                        </p>

                      @endif
                    </td>
                    <td>  
                       
                                
                       <!-- <button type="button" class="btn btn-outline-success mt-1" data-bs-toggle="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="Edit Order Status">  </i>
                       </button>


                       <a class="btn btn-outline-info mt-1" href="{{route('customer_invoice',['id'=>$order->id])}}">
                           <i class="fas fa-search-plus"  title="View Invoice"></i>
                        </a>
                     

                        <button type="button" class="btn btn-outline-dark mt-1" data-bs-toggle="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="Edit Payment Status">  </i>
                       </button> -->


                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                          </button>
                          <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{route('customer_invoice',['id'=>$order->id])}}" id="orderfont"><i class="fas fa-search-plus"  title="View Invoice"> </i> View Invoice</a></li>

                          {{-- if the order status is cancelled thr button will hide --}}
                          @if($order->order_status =='Cancelled' || $order->order_status =='Delivered')
                            

                          @else
                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat" id="orderfont"> <i class="fas fa-edit"  title="Edit Order Status">  </i> Edit Order Status</a></li> 
                          @endif

                         {{--  if the payment status is paid the button will hide --}}
                          @if($order -> payment_status == 'Cancelled' || $order -> payment_status == 'Paid')

                          @else

                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat" id="orderfont"> <i class="fas fa-edit"  title="Edit Payment Status">  </i> Edit Payment Status</a></li>

                          @endif

                          
                          </ul>
                        </div>
                      </td>
                   </tr>

                  <div class="modal fade" id="edit{{$order->id}}" tabindex="-1" aria-labelledby="edit{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header text-center">
                              <h5 class="modal-title w-100" id="edit{{$order->id}}">Update Payment Status</h5>
                              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                              <form action="{{route('update_payment')}}" method="post" onsubmit="btn.disabled = true; return true;">
                              
                                @csrf
         
                                  <div class="form-group">
                                    <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                                  </div>

                                  <label> Select Payment Status  </label>
                                  <select name="payment_status" class="form-select" required>
                                
                                    <option value="" hidden> ---Select Payment Status---</option>
                                    <option>Paid</option>
                                    <option>Cancelled</option>

                                  </select>                       
                  
                                  <div class="modal-footer">
                                   {{--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>  --}}
                                    <button type="submit" name="btn" class="btn btn-primary">Update</button>
                                  </div>
                              </form>
                             </div>
                           </div>
                         </div>
                       </div>

 
                  @endforeach
                
                  
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
        </div>
            

@endsection
