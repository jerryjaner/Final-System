@extends('Admin.master')
  @section('title')

  Customer Feedback
 @endsection
@section('content')


  <div class="card my-2">
    <div class="card-header">
      <h3 class="card-title"><b>Customer Feedback</b></h3>


      <button type="button" class="btn btn-primary btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#customerfilter" data-bs-whatever="@fat"><i class="fas fa-filter"></i> Filter Feedback</button>
       <a href="{{route('feedback')}}" class="btn btn-success btn-sm " style="float: right; margin-right: 5px;" ><i class="fas fa-sync"></i> Refresh</a>
    </div>

    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      	<div class="modal fade" id="customerfilter" tabindex="-1" aria-labelledby="customerfilter" aria-hidden="true">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header text-center">
	                <h5 class="modal-title w-100"  id="customerfilter">Filter Monthly Report</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	              </div>
	              <div class="modal-body">
	                <form action="{{route('filter-feedback')}}" method="post"  onsubmit="btn.disabled = true; return true;">
	                     @csrf

	                      <div class="form-group">

	                      	<label for="date">Date From:</label>
				 			<input type="date" class="form-control" name="date_from" style="outline: none;" required>
	                      
	                      </div>

	                      <div class="form-group">
	                       	<label for="date">Date To:</label>
				 			<input type="date" name="date_to" class="form-control" style="outline: none;" required>
	                      </div>
	                     
	                      <div class="modal-footer">
	                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
	                        <button  type="submit" name="btn" class="btn btn-primary">Apply Filter</button>
	                      </div>
	                </form>
	              </div>
	            </div>
	          </div>
	        </div>    
	    <thead>
	      <tr>
	       {{--  <th>#</th> --}}
	        <th width="15px;">Customer Name</th>
	        <th width="80px;">Message</th>
	       {{--  <th width="15px;">Phone Number</th> --}}
	        <th width="15px;">Email</th>  
	        <th width="15px;">Date</th>
	      
	      </tr>
	    </thead>
	    <tbody>
	     @php($i=1)
	     @foreach ($customers_feedback as $data) 
	     <tr>
	     {{-- 	<td>{{ $i++ }}</td> --}}
	     	<td>{{ $data -> name }}</td>
	     	<td>{{ $data -> message }}</td>
	     {{-- 	<td>{{ $data -> contact }}</td> --}}
	     	<td>{{ $data -> email }}</td>
	     	
	     	<td>{{\Carbon\Carbon::parse($data->created_at)->toFormattedDateString()}}</td>

	     	{{-- <td>
	     		<a type="button" class="btn btn-danger btn-sm"  href="{{route('feedback_delete',['id'=>$data->id])}}">Delete</a>
	     	</td> --}}
	     </tr>    
	     @endforeach
	     
       </tbody>    
      </table>
    </div>
  </div>
 @endsection