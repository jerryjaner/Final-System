@extends('Staff.master')
@section('title')

	Staff Dashboard

@endsection


@section('Dashboard')


  
<section class="content">
      <div class="container-fluid">
          <!-- user count -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$customers}}</h3>
                  <p>Customers Registered</p>
                </div> 
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$newuser}}</h3>
                  <p>User Registered Today</p>
                </div> 
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$orders}}</h3>
                  <p>Orders</p>
                </div>
               <div class="icon">
                  <i class="ion ion-ios-cart"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                 <h3>{{$pending_orders}}</h3>
                  <p>Pending Orders</p>
                </div>
               <div class="icon">
                  <i class="ion ion-android-time"></i>
                </div>
              </div>
            </div>
          </div>


          <!-- Orders count -->
           <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$cancelled_orders}}</h3>
                  <p>Cancelled Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-close"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$OnProcess_orders}}</h3>
                  <p>On Process</p>
                </div>
                <div class="icon">
                  <i class="ion ion-load-a"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$out_orders}}</h3>
                  <p>Out For Delivery</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-car"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                 <h3>{{$delivered_orders}}</h3>
                  <p>Delivered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-checkbox-outline"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

@endsection