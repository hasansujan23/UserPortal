@extends('layouts.master')

@section('content')
@include('partials.header')

			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="content-wrap">
									@foreach($post as $row)
									<ul class="tags">
										<li><a href="#">{{$row->category}}</a></li>
									</ul>
									<a href="#">
										<h3>{{$row->title}}</h3>
									</a>
									<ul class="meta pb-20">
										<li><a href="#"><span class="lnr lnr-user"></span>{{$row->name}}</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$row->posted_at}}</a></li>
										<li><a href="#"><span class="lnr lnr-eye"></span>{{$row->views}} Views</a></li>
									</ul>
									<p>
									{{$row->description}}
									</p>
									@endforeach
								
								
								<div class="comment-sec-area">
									<div class="container">
										<div class="row flex-column">
											<h6>05 Comments</h6>
											<div class="comment-list">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c1.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase">reply</a>
													</div>
												</div>
											</div>
											<div class="comment-list left-padding">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c2.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase">reply</a>
													</div>
												</div>
											</div>
											<div class="comment-list">
												<div class="single-comment justify-content-between d-flex">
													<div class="user justify-content-between d-flex">
														<div class="thumb">
															<img src="img/blog/c3.jpg" alt="">
														</div>
														<div class="desc">
															<h5><a href="#">Emilly Blunt</a></h5>
															<p class="date">December 4, 2017 at 3:12 pm </p>
															<p class="comment">
																Never say goodbye till the end comes!
															</p>
														</div>
													</div>
													<div class="reply-btn">
														<a href="" class="btn-reply text-uppercase">reply</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="comment-form">
								<h4>Post Comment</h4>
								<form>
									<div class="form-group form-inline">
										<div class="form-group col-lg-6 col-md-12 name">
											<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
										</div>
										<div class="form-group col-lg-6 col-md-12 email">
											<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
										</div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
									</div>
									<a href="#" class="primary-btn text-uppercase">Post Comment</a>
								</form>
							</div>
						</div>
						<!-- End single-post Area -->
					</div>
				@include('partials.sidebar')

				</div>
			</div>
		</section>

@include('partials.footer')
@endsection