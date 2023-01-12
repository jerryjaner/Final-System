<!DOCTYPE html>
<html lang="en">
<head>
	<title> @yield('title') </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	{{-- title bar logo --}}
	<link rel="shortcut icon" sizes="32x32"  type="image/png" href="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg">
	<!-- Custom Theme files -->
	<link href="{{asset('FrontEndSourceFile')}}/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="{{asset('FrontEndSourceFile')}}/css/style.css" type="text/css" rel="stylesheet" media="all">  
	<link href="{{asset('FrontEndSourceFile')}}/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('FrontEndSourceFile')}}/css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
	<!-- //Custom Theme files --> 
	<!-- js -->
	<script src="{{asset('FrontEndSourceFile')}}/js/jquery-2.2.3.min.js"></script>  
	<!-- //js -->
	<!-- web-fonts -->   
	<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
	<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<!-- //web-fonts -->
	<!--toastr link  -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


   <style type="text/css">
   	body{
   		scroll-behavior: smooth;
   	}
   </style>
   
</head>
<body> 
	<!-- banner -->
	@include('User.include.Banner')
	<!-- //banner -->   
	@yield('content')
	<!-- subscribe -->
	
	<!-- //subscribe --> 
	<!-- footer -->
	@include('User.include.Footer')
	<!-- //footer --> 
	<!-- cart-js -->
	<script src="{{asset('FrontEndSourceFile')}}/js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->	
	<!-- Owl-Carousel-JavaScript -->
	<script src="{{asset('FrontEndSourceFile')}}/js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  
	<!-- start-smooth-scrolling -->
{{-- 	<script src="{{asset('FrontEndSourceFile')}}/js/SmoothScroll.min.js"></script>   --}}
	<script type="text/javascript" src="{{asset('FrontEndSourceFile')}}/js/move-top.js"></script>
	<script type="text/javascript" src="{{asset('FrontEndSourceFile')}}/js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	  
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('FrontEndSourceFile')}}/js/bootstrap.js"></script>
</body>
</html>

<!-- toastr script -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>

    @if (Session::has('message'))
    
    toastr.options.progressBar = true;
    var type = "{{Session::get('alert-type','info')}}"

    switch(type){

      case 'info':
        toastr.info("{{Session::get('message')}}");
        break;

       case 'success':
        toastr.success("{{Session::get('message')}}");
        break;

       case 'warning':
        toastr.warning("{{Session::get('message')}}");
        break;

        case 'error':
        toastr.error("{{Session::get('message')}}");
        break;
    }

    @endif
   
</script>
	