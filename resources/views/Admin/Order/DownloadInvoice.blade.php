<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Nick's Resto Receipt</title>
  		<style type="text/css">
        	.invoice-box {
			    max-width: 1000px;
			    margin: auto;
			    padding: 30px;
			    border: 1px solid #eee;
			    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			    font-size: 16px;
			    line-height: 24px;
			    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			    color: #555;
			}

			.invoice-box table {
			    width: 100%;
			    line-height: inherit;
			    text-align: left;
			}

			.invoice-box table td {
			    padding: 5px;
			    vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
			    text-align: right;
			}

			.invoice-box table tr.top table td {
			    padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
			    font-size: 45px;
			    line-height: 45px;
			    color: #333;
			}

			.invoice-box table tr.information table td {
			    padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
			    background: #eee;
			    border-bottom: 1px solid #ddd;
			    font-weight: bold;
			}

			.invoice-box table tr.details td {
			    padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
			    border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
			    border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
			    border-top: 2px solid #eee;
			    font-weight: bold;
			}
			#example1{

		        font-family: arial ,helvetica, sans-serif;
		        border-collapse: collapse;
		        width: 100%;
		       /* margin-top: 50px;*/

		     }
	         #example1 td, #example1 th {

				border: 1px solid #ddd;
				padding: 8px;
		    }
		    #example1 tr:nth-child(even){

		        background-color: #ddd;
		    }

		    #example1 th{
		      padding-top: 12px;
		      padding-bottom: 12px;
		      text-align: left;
		      background-color: #E74844;
		      color:white;

		    }

			@media only screen and (max-width: 600px) {
			    .invoice-box table tr.top table td {
			        width: 100%;
			        display: block;
			        text-align: center;
			    }

			    .invoice-box table tr.information table td {
			        width: 100%;
			        display: block;
			        text-align: center;
			    }
			}

			/** RTL **/
			.invoice-box.rtl {
			    direction: rtl;
			    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
			    text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
			    text-align: left;
			}
        </style>
    </head>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="{{public_path('BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" style="border-radius: 50%; width: 90px;">
                                </td>
                                <td>
                                    Invoice #: <strong>{{$order -> id}}</strong> <br/>
                                    Order Date: <strong>{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</strong><br/>
                                    @if($payment -> payment_type == 'Cash_on_Delivery')

									Payment Method: <strong> Cash On Delivery </strong>

									@elseif($payment -> payment_type == 'Cash_on_Pickup')

									Payment Method: <strong> Cash On Pickup </strong>
									   
									@endif    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>From:<br/>
                                    <strong> Nicks Resto Bar & Cafe Restaurant</strong>.<br />
                                    Gadgaron Matnog Sorsogon<br/>
                                    Nicks_Resto@gmail.com<br/>
                                    09706677438
                                </td>
                                <td><span style="margin-right: 200px">To:</span><br/>
                                	@if($customer -> google_id == null)
	                                    <strong>{{$customer -> name}} {{$customer -> lastname}}</strong><br/>
	                                @else
	                               	    <strong>{{$customer -> google_name}}</strong><br/>
	                                @endif
	                                    {{$shipping -> purok}}<br/>
	                                    {{$shipping -> address}}<br/>
	                                    {{$shipping -> email}}<br/>
	                                    {{$shipping -> phone_no}}<br/>

                                   
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

             <table id="example1">
                  <thead>
                    <tr>
                      <th class="center" style="text-align: center;">#</th>
					  <th style="text-align: center;">Item</th>
					  <th class="center" style="text-align: center;">Quantity</th>
					  <th class="right" style="text-align: center;">Price</th>
					  <th class="right" style="text-align: center;">Total</th>
                    </tr>
                  </thead>
                <tbody>	                    				                  
                    @php($i = 1)
					@php($sum = 0)
					
				@foreach($OrderD as $orderdetail)

                  <tr>
					<td class="center" style="text-align: center;">{{$i++}}</td>
					<td class="left" style="text-align: center;">{{$orderdetail -> dish_name}}</td>	
					<td class="center" style="text-align: center;">{{$orderdetail -> dish_qty}}</td>
					<td class="right" style="text-align: center;">{{$orderdetail -> dish_price}}</td>
					<td class="right" style="text-align: center;">{{$total = $orderdetail -> dish_price * $orderdetail -> dish_qty}}</td>
					@php($sum = $sum + $total)
				 </tr>

				    {{-- @php($totalAmount = $sum + $shippingfee) --}}
				    
				@endforeach

					@if($payment -> payment_type == 'Cash_on_Delivery')
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							Shipping Fee: {{$order -> order_shippingfee}}<br>
							@if(count($Shipping_Fee) == 0)
								Total Amount: {{$sum}}<br> 
							@else
								
								@php($total_amount = $sum + $order -> order_shippingfee)

								   Total Amount: {{$total_amount}}<br>


							@endif

								
						</td>										
					</tr>
					
					@else
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="right" style="text-align: center;"><strong>Total Amount: {{$sum}} </strong> </td>
					</tr>		

					@endif

				</tbody>
			</table>   

			<div style="margin-top: 5px;">
				<h2 style="text-align: center; opacity: 50%;"><i>Thank you for your order!</i></h2>	
			</div>

        </div>
       
    </body>
</html>
