@extends('User.master')
@section('title')

   Notification 

@endsection
@section('content')

<style type="text/css">
   #example{
     /* font-family: arial ,helvetica, sans-serif;*/
     font-family: poppins;
      border-collapse: collapse;
      margin-top: 10px;
    }
    #example td, #example1 th {
      border: 1px solid #ddd;
      padding: 8px;
    }
/*    #example1 tr:nth-child(even){
      background-color: #ddd;
    }*/

    #example th{
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #dc413a;
      color:white;
      text-align: center;
      font-size: 16px;
    } 
    #example td{
      color: black;
      text-align: center;

    }
    .dataTables_info{
      margin-left: 8%;
      margin-top: 20px;
    }
    #example_paginate{
      margin-left: 23%;
    }
</style>
<br>
<center>
  <h3 class="w3ls-title">Notification</h3><br>
 <table id="example" class="table table-striped table-bordered" style="width:68%">
        <thead>
            <tr>
                <th>#</th>
                <th>Sender</th>
                <th>Message</th>
                <th>Date Sent</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @php($i = 1)
            @foreach($notification_msg as $notication)
              <tr> 
                  <td>
                      @if ($notication ->  message_status == "unread")
                       <b> {{ $i++ }}</b>
                      @else
                        {{ $i++ }}
                      @endif
                  </td>
                  <td>

                    @if ($notication ->  message_status == "unread")

                      <b>{{ $notication -> sender }}</b>

                    @else

                       {{ $notication -> sender }}

                    @endif
                   
                  </td>
                  <td>
                      @if ($notication ->  message_status == "unread")

                        <b>{{ $notication -> message }}</b>

                      @else

                          {{ $notication -> message }}

                      @endif

                  </td>
                  <td>
                      @if ($notication ->  message_status == "unread")

                        <b>{{\Carbon\Carbon::parse($notication -> created_at)->toFormattedDateString() }}</b>

                      @else

                        {{\Carbon\Carbon::parse($notication -> created_at)->toFormattedDateString() }}
                        
                      @endif
                  </td>
                  <td>
                    

                    @if ($notication ->  message_status == "Read")
                         <strong>. . .</strong> 
                    @else
                        <a href="{{ route('read_message',['id' => $notication -> id]) }}" type="btn" class="btn btn-primary">Marks as read</a>
                    @endif

                  </td>
                
              </tr>    
            @endforeach
        </tbody>

    </table>
</center>

    <script type="text/javascript">
      $(document).ready(function () {
          $('#example').DataTable();
      });
    </script>  

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>

@endsection