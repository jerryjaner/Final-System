@extends('Admin.master')
@section('title')

	Admin Dashboard

@endsection

@section('Dashboard') 
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="m-0 text-dark">Dashboard</h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        {{-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard </li>
        </ol> --}}
      </div><!-- /.col -->
    </div><!-- /.row -->
      <!-- user count -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 class="dashboard">{{$admin}}</h3>
              <p class="dashboard">Admin Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 class="dashboard">{{$staff}}</h3>
              <p class="dashboard">Staff Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}   
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3 class="dashboard">{{$customers}}</h3>
              <p class="dashboard">Customers Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3 class="dashboard">{{$newuser}}</h3>
              <p class="dashboard">User Registered Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
      </div>
      <!-- Orders count -->
       <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 class="dashboard">{{$orders}}</h3>
              <p class="dashboard">Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 class="dashboard">{{$pending_orders}}</h3>
              <p class="dashboard">Pending Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-time"></i>
            </div>
           {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3 class="dashboard">{{$cancelled_orders}}</h3>
              <p class="dashboard">Cancelled Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-close"></i>
            </div>
           {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3 class="dashboard">{{$OnProcess_orders}}</h3>
              <p class="dashboard">On Process</p>
            </div>
            <div class="icon">
              <i class="ion ion-load-a"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
      </div>

      <!-- Menucount  -->
       <div class="row">
         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 class="dashboard">{{$out_orders}}</h3>
              <p class="dashboard">Out For Delivery</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
           {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>  --}}
          </div>
        </div>

         <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3 class="dashboard">{{$delivered_orders}}</h3>
              <p class="dashboard">Delivered</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-checkbox-outline"></i>
            </div>
           {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>   --}}
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3 class="dashboard">{{$categories}}</h3>
              <p class="dashboard">Categories</p>
            </div> 
            <div class="icon">
              <i class="ion ion-fork"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>   --}}
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3 class="dashboard">{{$dishes}}</h3>
              <p class="dashboard">Menu / Dish</p>
            </div> 
            <div class="icon">
              <i class="ion ion-pizza"></i>
            </div>
           {{--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>   --}}
          </div>
        </div> 
        <?php

            $month = array();
            $count = 0;
            while ($count <= 12) {

            $month [] = date('M Y', strtotime("-".$count."month"));
            $count ++;

            }
           // echo "<pre>"; print_r($month); die;

          $dataPoints = array(

            array("y" => $month_count[11], "label" => $month[11]),
            array("y" => $month_count[10], "label" => $month[10]),
            array("y" => $month_count[9], "label" => $month[9]),
            array("y" => $month_count[8], "label" => $month[8]),
            array("y" => $month_count[7], "label" => $month[7]),
            array("y" => $month_count[6], "label" => $month[6]),
            array("y" => $month_count[5], "label" => $month[5]),
            array("y" => $month_count[4], "label" => $month[4]),
            array("y" => $month_count[3], "label" => $month[3]),
            array("y" => $month_count[2], "label" => $month[2]),
            array("y" => $month_count[1], "label" => $month[1]),
            array("y" => $month_count[0], "label" => $month[0]),


          // $dataPoints = array(
          //  array("y" => 25, "label" => "Sunday"),
          //  array("y" => 15, "label" => "Monday"),
          //  array("y" => 25, "label" => "Tuesday"),
          //  array("y" => 5, "label" => "Wednesday"),
          //  array("y" => 10, "label" => "Thursday"),
          //  array("y" => 0, "label" => "Friday"),
          //  array("y" => 20, "label" => "Saturday")

            
          );
         
        ?>

      <div id="chartContainer"  style="height: 370px; width: 100%;"></div>
      <script>
        window.onload = function() {
         
        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2",
          title:{
            text: "Monthly Orders"
          },
          axisY: {
            title: "Number of Orders"
          },
          data: [{
            type: "column",
            yValueFormatString: "#,##0.## Order",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
          }]
        });
        chart.render();
         
        }
    </script>


    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  </div>

</section>

@endsection