@extends('Admin.master')
@section('title')

	Filtered Orders

@endsection
@section('content')



{{-- <style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}


#filter{
  font-family: poppins;
}
</style>

      <div class="card my-2">
          <div class="card-header">
            <h3 class="card-title" id ="filter"><b>Filtered Orders </b></h3>

             <a target="_blank" href="{{route('filtered')}}" class="btn btn-info btn-sm"  style="float: right; margin-left: 10px;">
             	<i class="fas fa-print"></i> Print</a>

    
             <a href="{{route('month')}}" class="btn btn-danger btn-sm" style="float: right;">Back</a>
            
          </div>   
          <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="font-family: poppins">#</th>
                <th style="font-family: poppins">Full Name</th>
                <th style="font-family: poppins">Order Price Total</th>
                <th style="font-family: poppins">Order Date</th>
              </tr>
              </thead>
                <tbody>

              @php($i = 1)
            	@foreach($orders as $order)
		            <tr>
		               <td style="font-family: poppins">{{$i++}}</td>
		               <td style="font-family: poppins">{{$order -> name}} {{$order -> middlename}} {{$order -> lastname}}</td>
		               <td style="font-family: poppins">{{ $order -> order_total}} Pesos</td>
		               <td style="font-family: poppins">{{\Carbon\Carbon::parse($order->created_at)->Format('m-d-Y')}}</td>
		            </tr>
          		@endforeach
                </tbody>
            </table>
          </div>
      </div>
           --}}  

      <!-- Main content -->
            <div class="row no-print mb-2">
                <div class="col-12">
                 {{--  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick="codespeedy()">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            <div class="invoice p-3 mb-3" id="hello">
              <!-- title row -->
              
              <div class="row">
                <div class="col-12 text-center">
                  <h4>
                    Nick's Resto Bar & Cafe Restaurant <br>
                    Gadgaron Matnog Sorsogon
                    {{-- <small class="float-right">Date: 2/10/2014</small> --}}
                  </h4>
                  <h3 class="float-left mt-1">Filtered</h3>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                {{-- <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
     
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
          
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div> --}}
              
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                   <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th style="font-family: poppins">#</th>
                        <th style="font-family: poppins">Full Name</th>
                        <th style="font-family: poppins">Order Price Total</th>
                        <th style="font-family: poppins">Order Date</th>
                      </tr>
                      </thead>
                        <tbody>

                      @php($i = 1)
                      @foreach($orders as $order)
                        <tr>
                           <td style="font-family: poppins">{{$i++}}</td>
                           <td style="font-family: poppins">{{$order -> name}} {{$order -> middlename}} {{$order -> lastname}}</td>
                           <td style="font-family: poppins">{{ $order -> order_total}} Pesos</td>
                           <td style="font-family: poppins">{{\Carbon\Carbon::parse($order->created_at)->Format('m-d-Y')}}</td>
                        </tr>
                      @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
              </div>
             
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <script type="text/javascript">
        
  function codespeedy(){
    var print_div = document.getElementById("hello");
    var print_area = window.open();
    print_area.document.write(print_div.innerHTML);
    print_area.document.close();
    print_area.focus();
    print_area.print();
    print_area.close();
// This is the code print a particular div element
  }
  </script>

@endsection
