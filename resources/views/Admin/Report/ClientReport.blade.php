@extends('Admin.master')
@section('title')

  Report of Customer

@endsection
@section('content')




<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
/*#report{
  font-family: poppins;
}*/
</style>

    <div class="card my-5">
      <div class="card-header">
        <h3 class="card-title" id="report"><b>Report of Customer</b></h3>
            <a target="_blank" href="{{route('download_client')}}"  class="btn btn-info btn-sm" style="float: right;">
              Print Report
            </a>
      </div>        
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">              
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Full Name</th>
                      <th>Purok No.</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Date Created</th>
                      <th>Logged in Using</th>
                      <th>Role</th>
                     </tr>
                  </thead>
                <tbody>
                   
                  @php($i = 1)
                  @foreach($users  as $user)

                    <tr>

                        <td>{{$i++}}</td>
                        @if($user -> google_id == null)

                        <td>{{$user->name}} {{$user->middlename}} {{$user->lastname}}</td>

                        @else

                        <td>{{ $user -> google_name }}</td>
                        
                        @endif

                        <td>{{ $user -> purok }}</td>
                        <td>

                          @if($user->address == null)

                              N/A

                          @else

                            {{$user->address}}

                          @endif

                        </td>
                        <td>{{ $user -> phone_number }}</td>
                        <td>{{$user -> email}}</td>
                        <td>{{\Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</td>
                        <td>
                          @if($user -> google_id)
                             Google Account
                          @else
                             Nick's Resto Bar System 
                          @endif
                        </td>
                        <td> Customer </td>
                   </tr>
                  
                @endforeach
    
                </tbody>   
            </table>
          </div>  
    </div>
            

@endsection
