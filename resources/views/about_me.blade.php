@extends('ui')

@section('main')

<!-- Page Wrapper -->
<div id="wrap">

	<!-- Content -->
	<div id="content">
		<section class="sub-banner animated fadeIn" style="background:url(files/About/{{$abouts[0]->image}}) fixed no-repeat">
			<div class="container">
				<div class="position-center-center">
					<h2>{{$abouts[0]->topic}}</h2>
					<h4 class="white-text margin-top-20">{{$abouts[0]->title}}</h4>
				</div>
			</div>
		</section>

		<br>
		<br>
		<br>
		<br>

		<!-- Main Heading -->
		<div class="animate fadeInUp container" data-wow-delay="0.4s">
			<?php echo($abouts[0]->text); ?>
		</div>

@endsection('main')