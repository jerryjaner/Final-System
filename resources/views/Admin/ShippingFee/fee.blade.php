  @extends('Admin.master')
  @section('title')

  Shipping Fee

  @endsection
  @section('content')


    <div class="card my-2">
        <div class="card-header">
            <h3 class="card-title" id="messagefont"><b>Shipping Fee</b></h3>
            
           		
 		     @if(count($ShippingFee) > 0)
		         <button type="button" hidden class="btn btn-success btn-sm float-right"  data-bs-toggle="modal" data-bs-target="#add_shippingfee" data-bs-whatever="@fat">
	                   Add Shipping Fee 
	             </button>
	         @else

		         <button type="button" class="btn btn-success btn-sm float-right"  data-bs-toggle="modal" data-bs-target="#add_shippingfee" data-bs-whatever="@fat">
	                   Add Shipping Fee 
	             </button>

	        @endif
          
        </div>
  
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              
               <div class="modal fade" id="add_shippingfee" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h5 class="modal-title w-100">Add Shipping Fee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('add_shippingfee') }}" method="post" onsubmit="btn.disabled = true; return true;">

                             @csrf

                            <div class="form-group">
    			                    <label>Shipping Fee:</label>
    			                    <input type="number" class="form-control" name="fee" min="0" max="1000" required>           
					                  </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button> 
                              <button class="btn btn-primary" type="submit" name="btn">Submit</button>
                            </div>

                        </form>
                     </div>
                   </div>
                 </div>
               </div>
             
             
              <thead>
                <tr>
                  <th>#</th>
                  <th>ShippingFee</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
          	@php($i=1)
          	@foreach($ShippingFee as $sf)
	            <tr>
	              <td>{{$i++}}</td>
	            	<td>₱{{$sf -> fee}}</td>
	            	<td>
	            		<div class="btn-group">
				            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
				              More
				            </button>

				            <ul class="dropdown-menu">
				            	<li>
				            		<a class="dropdown-item" href="" type="button" data-bs-toggle ="modal" data-bs-target="#editshippingfee{{$sf -> id}}" data-bs-whatever="@fat"><i class="fas fa-edit "></i> Edit</a>
				            	</li>
				            	<li>
				            		<a class="dropdown-item" href="{{ route('shippingfee_delete',['id' => $sf -> id]) }}"><i class="fas fa-trash "></i> Delete</a>
				            	</li>
				            </ul>
				          </div>
	            	</td>	
	            </tr>  
             {{--  Edit modal  --}}
              <div class="modal fade" id="editshippingfee{{$sf -> id}}" tabindex="-1" aria-labelledby="editshippingfee{{$sf -> id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                            <h5 class="modal-title w-100" >
                              Update Payment Status
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('shippingfee_edit') }}" method="post" onsubmit="btn.disabled = true; return true;">
                            
                                 @csrf
       
                                <div class="form-group">
                                    <input type="hidden" class="form-control"  name="id" value="{{$sf -> id}}">                    
                                 </div>
                                 <div class="form-group">
                                    <label>Edit Shipping Fee </label>
                                    <input type="number" class="form-control" name="fee" min="0" max="1000" value="{{$sf -> fee}}" required>
                                 </div>
                               
                                                      
                                <div class="modal-footer">
                                  <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                                  <button  type="submit" class="btn btn-primary" name="btn">Update</button>
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
    </div>
            
  @endsection