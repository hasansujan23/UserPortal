@extends('layouts.master')


@section('content')
@include('partials.header')	
		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row small-gutters">
						<div class="col-lg-8 top-post-left">
							<div class="feature-image-thumb relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="img/top-post1.jpg" alt="">
							</div>
							<div class="top-post-details">
								<ul class="tags">
									<li><a href="#">Food Habit</a></li>
								</ul>
								<a href="image-post.html">
									<h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 top-post-right">
							<div class="single-top-post">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/top-post2.jpg" alt="">
								</div>
								<div class="top-post-details">
									<ul class="tags">
										<li><a href="#">Food Habit</a></li>
									</ul>
									<a href="image-post.html">
										<h4>A Discount Toner Cartridge Is Better Than Ever.</h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
								</div>
							</div>
							<div class="single-top-post mt-10">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/top-post3.jpg" alt="">
								</div>
								<div class="top-post-details">
									<ul class="tags">
										<li><a href="#">Food Habit</a></li>
									</ul>
									<a href="image-post.html">
										<h4>A Discount Toner Cartridge Is Better</h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<h4 class="cat-title">Latest News</h4>
							@foreach($posts as $post)
								<div class="single-latest-post row align-items-center">
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											<img class="img-fluid" src="{{ asset('img/post-image') }}/{{$post->image}}" alt="">
										</div>
										<ul class="tags">
											<li><a href="#">{{$post->category}}</a></li>
										</ul>
									</div>
									<div class="col-lg-7">
										<a href="{{URL::to('/read-post/'.$post->id)}}">
											<h4 style="text-align: justify;padding-top: 15px;">{{$post->title}}</h4>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span>{{$post->name}}</a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$post->posted_at}}</a></li>
											<li><a href="#"><span class="lnr lnr-eye"></span>{{$post->views}} Views</a></li>
										</ul>
										<p class="excert">
											{{ Str::limit($post->description, 200) }}
										</p>
									</div>
								</div>
							@endforeach()
							</div>
							<!-- End latest-post Area -->
							
							<!-- Start banner-ads Area -->
							<div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
								<img class="img-fluid" src="img/banner-ad.jpg" alt="">
							</div>
							<!-- End banner-ads Area -->
							<!-- Start popular-post Area -->
							<!-- End popular-post Area -->
							<!-- Start relavent-story-post Area -->

							<!-- End relavent-story-post Area -->
						</div>
						@include('partials.sidebar')
					</div>
				</div>
			</section>
			<!-- End latest-post Area -->
		</div>
@include('partials.footer')
@endsection
