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

<!-- PORTFOLIO -->
<section class="portfolio port-wrap padding-top-80 padding-bottom-80 ">

	
	<!-- PORTFOLIO ITEMS -->
	
	<div class="container">
		<h1 class="margin-bottom-40">{{$works[0]->work->filter}}</h1>
		
		<div class="items item-space row col-3 animate fadeInUp" data-wow-delay="0.4s">

		@foreach($works as $work)
			<article class="portfolio-item pf-{{$work->filter}}">
				<div class="portfolio-image"> <a href="javascript:void(0)"> <img class="img-responsive" alt="Open Imagination"
							src="/files/Gallery/{{$work->image}}"> </a>
					<div class="portfolio-overlay style-4">
					</div>
				</div>
			</article>
		@endforeach

		</div>
	</div>

	<div class="col-lg-12">
		<div class="pagination__number blog__pagination">
			{{$works->links('pagination.default')}}
		</div>
	</div>
</section>

@endsection('main')