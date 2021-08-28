@extends('ui')

@section('main')

<!-- Content -->
<div id="content">
	<section class="sub-banner animated fadeIn" style="background:url(files/Contact_top/{{$contacts_top->image}}) fixed no-repeat">
		<div class="container">
			<div class="position-center-center">
				<h2>{{$contacts_top->topic}}</h2>
			</div>
		</div>
	</section>

	<!-- Conatct Pages  -->
	<section>
		<div class="container">
			<div class="row padding-top-80 padding-bottom-80">
				@foreach($contacts as $contact)
					<div class="col-md-4 animate fadeInUp" data-wow-delay="0.8s">
						<div
							class="icon-box ib-style-1 ib-circle ib-bordered ib-bordered-white ib-bordered-thin ib-medium ib-text-alt i-large">
							<div class="ib-icon"> <i class="fa fa-{{$contact->title}} text-primary"></i> </div>
							<div class="ib-info text-dark">
								<p class="no-margin-bottom">
									@if($contact->title == 'mobile')
										<a href="tel:{{$contact->text}}" class="text-dark">{{$contact->text}}</a>
									@elseif($contact->title == 'envelope-o')
										<a href="mailto:{{$contact->text}}" class="text-dark">{{$contact->text}}</a>
									@else
										<p class="text-dark">{{$contact->text}}</p>
									@endif
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

@endsection('main')