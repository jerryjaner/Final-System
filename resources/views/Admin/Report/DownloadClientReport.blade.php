<!DOCTYPE html>
<html>
<head>
  <title>Download Client Report</title>
  <style>
    #example1{
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;


    }
    #example1 td, #example1 th {
      border: 1px solid #ddd;
      padding: 8px;
      font-size: 14px;
      font-family: 'Poppins', sans-serif;
    }
    #example1 tr:nth-child(even){
      /*background-color: #ddd;*/
    }

    #example1 th{
      padding-top: 3px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #E74844;
      color:white;
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
      line-height: 0.9px;
      font-family: 'Poppins', sans-serif;
    }
    h1{
      font-family: 'Poppins', sans-serif;
    } 

  </style>
</head>
<body>
    <div class="card my-2">
        <div class="card-body">
          <div class="header">
            <div class="logo">
               <img src="{{public_path('BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" style="border-radius: 50%; width: 90px;">
               <h4 class="Nick">Nick's Resto Bar & Cafe Restaurant</h4>
               <h4>Gadgaron Matnog Sorsogon</h4>
            </div>
            </div>
          <center>
            <br>
            <h1>Customer Report</h1>
          <table id="example1">
            <thead>
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Purok No.</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
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
                    {{$user-> address}}

                  @endif
              </td>
              <td>{{$user -> email}}</td>
              <td> {{ $user -> phone_number }}</td>
              <td> Customer </td>
           </tr>
      
             
            @endforeach
           
            </tbody>                 
          </table>               
        </div>
    </div>   
</body>
</html>
