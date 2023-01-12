@extends('Admin.master')
@section('title')

	Monthly Transaction

@endsection
@section('content')
<style>
	
   div.dataTables_wrapper div.dataTables_length select
   {
  		width: 60px;
   }
   .btn{
   	margin-bottom: 10px;
   	text-align: center;

   }
   .header{
      text-align: center;
    }
    .header img{
      float:left;
      margin-left: 20%;
    }
    .header h4{
      position: relative;
      margin-right: 25%;
    /*  line-height: 0.9px;*/
      font-family: 'Poppins', sans-serif;
    }
 
</style>

<div class="card my-2">
	<div class="card-header">
		
	   <h3 class="card-title" ><b> Monthly Report</b></h3>

	    <button type="button" class="btn btn-primary btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#modalfilter" data-bs-whatever="@fat" id="userfont"><i class="fas fa-filter"></i> Filter Monthly Report</button>

	    <a href="{{route('month')}}" class="btn btn-success btn-sm " style="float: right; margin-right: 5px;" ><i class="fas fa-sync"></i> Refresh</a>
	 </div>
	 <div class="card-body">
   
	    <table id="example3" class="table table-bordered table-striped">   
	        <div class="modal fade" id="modalfilter" tabindex="-1" aria-labelledby="modalfilter" aria-hidden="true">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header text-center">
	                <h5 class="modal-title w-100"  id="modalfilter">Filter Monthly Report</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	              </div>
	              <div class="modal-body">
	                <form action="{{route('filter')}}" method="post"  onsubmit="btn.disabled = true; return true;">
	                     @csrf

	                      <div class="form-group">

	                      	<label for="date">Date From:</label>
				 			<input type="date" class="form-control" name="fromdate" style="outline: none;" required>
	                      
	                      </div>

	                      <div class="form-group">
	                       	<label for="date">Date To:</label>
				 			<input type="date" name="todate" class="form-control" style="outline: none;" required>
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
		     
		        <th>Order Date</th>
		        <th>Customer Name</th>
		        <th>Order Price Total</th>
		       
		          
	        </tr>
	      </thead>
	      <tbody>
	      	@php($i = 1)
	
            @foreach($orders  as $ReportOrder)
            
	      	<tr>

	      			<td>{{\Carbon\Carbon::parse($ReportOrder->created_at)->toFormattedDateString()}}</td>
	      			
	      		@if($ReportOrder -> google_id == null)

	      			<td>{{$ReportOrder -> name}} {{$ReportOrder -> middlename}} {{$ReportOrder -> lastname}}</td>

	      		@else

	      			<td>{{ $ReportOrder -> google_name }}</td>

	      		@endif
	      			<td>{{ $ReportOrder -> order_total}} Pesos</td>
	      		

	      	</tr>
	     
	      	@endforeach  
	      </tbody>
	  </table>
		
	</div>
</div>




@endsection