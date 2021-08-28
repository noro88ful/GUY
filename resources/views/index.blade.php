@extends('ui')

@section('main')

<!--======= HOME MAIN SLIDER =========-->
<section class="home-slider">
	<div class="tp-banner-container">
		<div class="tp-banner">
			<ul>
				<!-- SLIDE  -->
				@foreach($sliders as $slider)
				<li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
					<!-- MAIN IMAGE -->
					<img src="/files/Slider/{{$slider->image}}" alt="home_slider2" data-bgposition="center top"
						data-bgfit="cover" data-bgrepeat="no-repeat">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption biglargetext sfr tp-resizeme" data-x="center" data-hoffset="0" data-y="center"
						data-voffset="-90" data-speed="500" data-start="1000" data-easing="Power3.easeInOut"
						data-splitin="chars" data-splitout="none" data-elementdelay="0.06" data-endelementdelay="0.1"
						data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
						{{$slider->topic}}
					</div>
					@if(!empty($slider->title))
						<!-- LAYER NR. 2 -->
						<div class="tp-caption font-crimson font-italic sfb tp-resizeme" data-x="center" data-hoffset="0"
							data-y="center" data-voffset="-100" data-speed="600" data-start="2500" data-easing="Power3.easeInOut"
							data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
							data-endspeed="300"
							style="z-index: 6; font-size:24px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap; margin-top: 200px;">
							{{$slider->title}}
						</div>
					@endif
					@if(!empty($slider->smallimage))					
						<!-- LAYER NR. 4 -->
						<div class="tp-caption sfb" data-x="center" data-hoffset="0" data-y="center" data-voffset="150"
							data-speed="500" data-start="3300" data-easing="Power3.easeInOut" data-elementdelay="0.1"
							data-endelementdelay="0.1" data-endspeed="300" style="z-index: 8; margin-top: 80px;"><img
								src="/files/Slider/{{$slider->smallimage}}" alt=""> 
						</div>
					@endif
					<!-- LAYER NR. 6 -->
					<div class="tp-caption skewfromleft tp-resizeme" data-x="center" data-hoffset="0" data-y="bottom"
						data-voffset="20" data-speed="400" data-start="4100" data-easing="Power3.easeInOut"
						data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
						data-endspeed="300" style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</section>

<!-- Content -->
<div id="content">

	<!-- Welcome -->
	<section class="welcome intro-style-2 padding-top-80">
		<div class="container">
			<div class="row">

				<!-- Intro Text -->
				<div class="col-md-5 animate fadeInLeft" data-wow-delay="0.4s">
					<!-- <div class="heading-block no-margin">
						<h2 class="no-margin margin-top-30 text-transform-none">HELLO ITS ME</h2>
						<h1 class="no-margin margin-bottom-30 ">GUY GHAZANCHYAN</h1>
						<span class="margin-bottom-10">Welcome to my web site</span>
					</div> -->
					<!-- <hr> -->
					<!-- <p class="font-crimson"> -->
						<?php echo($homes_1[0]->text) ?> 
					<!-- </p> -->
				</div>

				<!-- Intro Image -->
				<div class="col-md-7 text-center animate fadeInRight" data-wow-delay="0.4s"> <a href="#."> <img
							class="responsive-img" src="files/Home_1/{{$homes_1[0]->image}}" alt="Intro Image" /> </a> </div>
			</div>
		</div>
	</section>

	<!-- Parallax -->
	<section class="bg-parallax padding-top-100 padding-bottom-100"
		style="background:url(files/Home_2/{{$homes_2[0]->image}}) fixed no-repeat;">
		<div class="heading-border text-center margin-top-50 margin-bottom-50 animate fadeInUp" data-wow-delay="0.4s">
			<h3
				class="text-uppercase white-text font-bold padding-left-40 padding-right-40 padding-top-20 padding-bottom-20 letter-space-1">
				{{$homes_2[0]->text}}</h3>
		</div>
	</section>
	<br> <br> <br> <br>

@endsection('main')