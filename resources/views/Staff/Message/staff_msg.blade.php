@extends('Staff.master')
@section('title')

  Message Customer

@endsection
@section('content')

<style>
div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
</style>

<div class="card my-2">
  <div class="card-header">
    <h3 class="card-title"><b>Message Customer</b></h3>
           
    <button type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#send_msg" data-bs-whatever="@fat"> Send Message</button>
  </div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <!-- add categories modal -->
       <div class="modal fade" id="send_msg" tabindex="-1" aria-labelledby="add" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header text-center">
                <h5 class="modal-title w-100"  id="add">Send Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="{{ route('msg_customer') }}" method="post" onsubmit="btn.disabled = true; return true;">
                 @csrf
              <div class="form-group">
                  <label>Sender</label>
                  <input type="text" name="sender" class="form-control" placeholder="Sender" value="Nicks Resto Bar & Cafe Restaurant" readonly>
                </div>

                <div class="form-group">
                  <label>To</label>
                
                  <select  name="customer_email"   class="form-select" id="" required>

                        <option value="" hidden>- - - - - Select Customer Email - - - - -</option>

                      @foreach($customers as $customers_email)

                        <option name="customer_email">
                           {{$customers_email-> email}}
                        </option>

                      @endforeach

                    </select>

                </div>

                <div class="form-group">
                  <label>Message</label>
                  <textarea placeholder="Type your message here . . . " name="message" class="form-control" required></textarea>
                </div>

                <div class="modal-footer">
                  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>  --}}
                  <button type="submit" name="btn" class="btn btn-primary ">Send</button>               
                </div>

              </form>
           </div>
         </div>
       </div>
     </div>
     
      <!-- end of caategories modal -->
      <thead>
        <tr>
          <td>#</td>
          <th>From:</th>
          <th>To:</th>
          <th>Message</th>
          <th>Date</th>
          {{-- <th>Action</th> --}}
        </tr>
      </thead>
      <tbody>
       
    	@php($i = 1)
        @foreach($all_msg_send as $msg)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $msg -> sender }}</td>
        <td>{{ $msg -> customer_email }}</td>
        <td>{{ $msg -> message }}</td>
        <td>{{\Carbon\Carbon::parse($msg -> created_at)->toFormattedDateString() }}</td>
        {{-- <td></td> --}}
      </tr>  
      @endforeach

      </tbody>
    </table>
  </div>
</div>

@endsection