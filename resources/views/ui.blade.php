<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demos.webicode.com/html/zap/animation-version/index by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jul 2017 14:32:41 GMT -->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="M_Adnan" />
	<!-- Document Title -->
	<title>GUY | GHAZANCHYAN HOME</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<!-- FontsOnline -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

	<!-- StyleSheets -->
	<link rel="stylesheet" href="/css/ionicons.min.css">
	<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/responsive.css">

	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen" />

	<!-- COLORS -->
	<link rel="stylesheet" id="color" href="/css/default.css">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

	<!-- JavaScripts -->
	<script src="/js/vendors/modernizr.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<audio id="divAudio">
		<source src="/files/Audio/{{$audios[0]->audio}}" type="audio/mp3">
		<!-- <embed src="/files/Audio/{{$audios[0]->audio}}" loop="true" type="audio/mp3"/> -->
	</audio>
	<!-- LOADER ===========================================-->
	<div id="loader">
	<div class="loader">
		<div class="position-center-center"> <img src="/files/Info/{{$infos[0]->image}}" alt="">
			<p class="font-crimson text-center">Please Wait...</p>
			<div class="loading">
			<div class="ball"></div>
			<div class="ball"></div>
			<div class="ball"></div>
			</div>
		</div>
	</div>
	</div>

	<!-- Page Wrapper -->
	<div id="wrap"> 
  
  <!-- Header -->
  <header class="header">
    <div class="sticky">
      <div class="container">
        <div class="logo"> <a href="index"><img src="/files/Info/{{$infos[0]->image}}" alt=""></a> </div>
        
        <!-- Nav -->
        <nav>
          <ul id="ownmenu" class="ownmenu">
            <li class="active"><a href="/index">HOME</a></li>
            <li><a href="/about_me">ABOUT ME</a></li>
            <li><a href="/my_works">MY WORKS</a></li>
            <li><a href="/library">LIBRARY</a></li>
            <li><a href="/contact_1">CONTACT</a></li> 
            
            <!--======= Shopping Cart =========-->
            <li class="shop-cart right"><a href="javascript:void(0)"><i class="fa fa-music"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <!-- End Header --> 

   <main class="page">

		@yield('main')

	</main>

  <!-- Footer -->
	<footer id="footer">
		<div class="footer-wrapper">

			<!-- Footer Top -->
			<div class="footer-top">
				<div class="footer-top-wrapper">
					<div class="container">
						<div class="row">
							<!-- About Block -->
							<div class="col-md-4">
								<div class="block block-about">
									<h3 class="block-title no-underline"><span class="text-primary">{{$footers[0]->title}}</span></h3>
									<div class="block-content">
										<p>{{$footers[0]->text}}</p>
										<img class="footer-logo" src="/files/Info/{{$infos[0]->image}}" alt="" />
									</div>
								</div>
							</div>
							<!-- End About Block -->

							<!-- Footer Links Block -->
							<div class="col-md-2">
								<div class="block block-links">
									<h3 class="block-title"><span>MENU</span></h3>
									<div class="block-content">
										<ul>
											<li><a href="/">HOME</a></li>
											<li><a href="/about_me">ABOUT ME</a></li>
											<li><a href="/my_works">MY WORKS</a></li>
											<li><a href="/library">LIBRARY</a></li>
											<li><a href="/contact_1">CONTACT</a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End Footer Links Block -->

							<!-- Twitter Widget Block -->
							<div class="col-md-3">
								<div class="block block-twitter-widget">
									<h3 class="block-title"><span>{{$footers[1]->title}}</span></h3>
									<div class="block-content">
										<div class="twitter-item">
											<div class="twitter-content">{{$footers[1]->text}}
											</div>

										</div>

									</div>
								</div>
							</div>
							<!-- End Twitter Widget Block -->

							<!-- Instagram Widget Block -->
							<div class="col-md-3">
								<div class="block block-instagram-widget">
									<h3 class="block-title"><span>{{$footers[2]->title}}</span></h3>
									<div class="twitter-item">
										<div class="twitter-content">{{$footers[2]->text}}</div>

									</div>
								</div>
							</div>
							<!-- End Instagram Widget Block -->

						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->

			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="footer-bottom-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-6 copyright">
								<p><a 
									@foreach($socials as $social)
										@if($social->title == 'facebook')
											href="{{$social->link}}" 
										@endif
									@endforeach target="_blank">{{$infos[0]->copy}}</a></p>
							</div>
							<div class="col-md-6 social-links">
								<ul class="right">
									@foreach($socials as $social)
										<li><a target='_blank' @if(!empty($social->link)) href="{{$social->link}}" @else href="javascript:void(0)" @endif><i class="fa fa-{{$social->title}}"></i></a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Bottom -->
		</div>
	</footer>
	<!-- End Footer -->

	<!-- JavaScripts -->
	<script src="/js/vendors/jquery/jquery.min.js"></script>
	<script src="/js/vendors/wow.min.js"></script>
	<script src="/js/vendors/bootstrap.min.js"></script>
	<script src="/js/vendors/own-menu.js"></script>
	<script src="/js/vendors/flexslider/jquery.flexslider-min.js"></script>
	<script src="/js/vendors/jquery.countTo.js"></script>
	<script src="/js/vendors/jquery.isotope.min.js"></script>
	<script src="/js/vendors/jquery.bxslider.min.js"></script>
	<script src="/js/vendors/owl.carousel.min.js"></script>
	<script src="/js/vendors/jquery.sticky.js"></script>
	<script src="/js/vendors/color-switcher.js"></script>

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
	<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="/js/zap.js"></script>
	<script src="/js/script.js"></script>
	<script src="/js/cookie.js"></script>
	<script>
		$(window).on('load', function() {
			var nowlink = window.location.href
			var nowlinkname = window.location.href.split('/')[3]
			console.log(nowlinkname)
			$(`.ownmenu li a`).parent().removeClass('active')
			$(`.ownmenu li a[href='/${nowlinkname}']`).parent().addClass('active')
		});
	</script>
</body>

	<!-- Mirrored from demos.webicode.com/html/zap/animation-version/about_me by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Jul 2017 14:58:26 GMT -->

</html>