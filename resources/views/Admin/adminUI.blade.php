<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	 <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GUY GHAZANCHYAN | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
	 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
	 <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <div id="preloader">
      <div class="loader"></div>
    </div>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu admin_menu" id="menu">
									<li class="home">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Հիմնական</span></a>
                                <ul class="collapse">
                                    <li><a href="{{route('adm_user')}}">Օգտատերեր</a></li>
                                    <li><a href="{{route('adm_audio')}}">Կայքի երաժշտություն</a></li>
                                    <li><a href="{{route('adm_footer')}}">Կայքի ստրոին մաս</a></li>
                                </ul>
										</li>
									<li class="index">
											<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-home"></i>
												<span>Գլխավոր էջ</span></a>
											<ul class="collapse admin_menu">
												<li><a href="{{route('adm_slider')}}">Գլխավոր սլայդեր</a></li>
												<li><a href="{{route('adm_home_1')}}">Հատված I</a></li>
												<li><a href="{{route('adm_home_2')}}">Հատված II</a></li>
											</ul>
									</li>
									<li class="Gallery">
										<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-newspaper-o"></i>
											<span>Աշխատանքներ</span></a>
										<ul class="collapse">
											<li><a href="{{route('adm_gallery')}}">Բոլոր աշխատանքները</a></li>
										</ul>
                            </li>
									 <li class="Filter">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-home"></i>
                                    <span>Ֆիլտրներ</span></a>
                                <ul class="collapse admin_menu">
                                    <!-- <li><a href="{{route('adm_works')}}">Բոլոր աշխատանքները</a></li> -->
                                    <li><a href="{{route('adm_works')}}">Ֆիլտրներ</a></li>
                                </ul>
                            </li>
									 <li class="About">
										<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-newspaper-o"></i>
											<span>Մեր մասին</span></a>
										<ul class="collapse">
											<li><a href="{{route('adm_about')}}">Մեր մասին</a></li>
										</ul>
                            </li>
									 <li class="Library">
										<a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-newspaper-o"></i>
											<span>Գրադարան</span></a>
										<ul class="collapse">
											<li><a href="{{route('adm_library')}}">Հատված I</a></li>
											<li><a href="{{route('adm_library_2')}}">Հատված II</a></li>
										</ul>
                            </li>
									 <li class="contact">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i>
                                    <span>Հետադարձ կապ</span></a>
                                <ul class="collapse">
										  		<li><a href="{{route('adm_contacts_top')}}">Հատված I</a></li>
										  		<li><a href="{{route('adm_contacts')}}">Կապի տվյալներ</a></li>
										  		<li><a href="{{route('adm_info')}}">Այլ Տվյալներ</a></li>
										  		<li><a href="{{route('adm_social')}}">Սոց տվյալներ</a></li>
                                </ul>
                            </li>
									 <!-- <li class="Another">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i>
                                    <span>Այլ</span></a>
                                <ul class="collapse">
										  		<li><a href="{{route('adm_view')}}">Հատված I</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                           
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                </div>
            </div>
				<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Ճանապարհ</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/admin">Գլխավոր</a></li>
                                <li><span class="breadcrumb_span"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="/img/nophoto.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="#">Message</a> -->
                                <!-- <a class="dropdown-item" href="#">Settings</a> -->
                                <a class="dropdown-item" href="{{route('adm_logout')}}">Ելք</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				@yield('main')
        </div>
        <footer>
            <div class="footer-area">
					<span>Copyright © 2020 RAW Բոլոր իրավունքները պաշտպանված են</span>
            </div>
        </footer>
    </div>
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
    </div>
    <script src="/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/metisMenu.min.js"></script>
    <script src="/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/assets/js/jquery.slicknav.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
	 <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/js/line-chart.js"></script>
    <script src="/assets/js/pie-chart.js"></script>
	 <script src="/assets/js/bar-chart.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/admin.js"></script>
	 <script>
	 	$(document).on('click','.delete-item',function(){
			let id = $(this).closest('tr').attr('trID')
			let tblName = $(this).closest('table').attr('tblName')
			Swal.fire({
				title: `Համոզվա՞ծ եք`,
				text: `Տվյալ դաշտը կհեռացվի և այն վերականգնել չի լինի`,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: `Հաստատել`,
				cancelButtonText: `Փակել`
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url:'/deleteitem',
						type:'post',
						data:{tblName,id},
						success:(r)=>{
							$(this).closest('tr').remove()
						}
					})
					Swal.fire({
					icon: 'error',
					title: `Դաշտը հեռացված է`,
					showConfirmButton: false,
					timer: 1500
					})
				}
			})
			
		})
		$(document).on('click','.foreditproduct',function(){
			var id = $(this).attr('thisid')
			$(`.product_tr[trID=${id}]`).find('.edit-item').click()
		})
		$(document).on('click','.foredituser',function(){
			var id = $(this).attr('thisid')
			$(`.request_tr[trID=${id}]`).find('.edit-item').click()
		})
		<?php 
		if(isset( $_GET['user'] ) && !empty( $_GET['user'] )){
			$usereditid = $_GET['user']; 
		}
		if(isset( $_GET['product'] ) && !empty( $_GET['product'] )){
			$producteditid = $_GET['product']; 
		}
		?>
		@if(isset($usereditid))
			$(`.request_tr[trID={{$usereditid}}]`).find('.edit-item').click()
		@endif
		@if(isset($producteditid))
			$(`.product_tr[trID={{$producteditid}}]`).find('.edit-item').click()
		@endif
	 </script>
	 <script>
		$(window).on('load', function() {
			$(`.admin_menu li a[href='${window.location.href}']`).parent().addClass('active')
			$(`.admin_menu li a[href='${window.location.href}']`).parent().parent().addClass('in')
			$(`.admin_menu li a[href='${window.location.href}']`).parent().parents('li').addClass('active')
		});
	</script>
</body>
</html>
