@extends('layouts.master')

@section('header')
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Clarence Taylor</span>
      <span class="d-none d-lg-block">
        @foreach($user as $row)
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('img/profile-picture') }}/{{$row->image}}" alt="">
        @endforeach
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#education">All Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#skills">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        @foreach($user as $row)
        <h1 class="mb-0">
          <span class="text-primary">{{$row->name}}</span>
        </h1>
        <div class="subheading mb-5">{{$row->country}}
          <a href="mailto:name@email.com">{{$row->email}}</a>
        
        </div>
        <p class="lead mb-5">{{$row->description}}</p>
        <div class="social-icons">
          <a href="#">
            <i class="fa fa-linkedin"></i>
          </a>
          <a href="#">
            <i class="fa fa-github"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fa fa-facebook-f"></i>
          </a>
        </div>
        @endforeach
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
        <h2 class="mb-5">Post Here</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="col-md-8">
            <form action="{{ route('createPost') }}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
            	<div class="form-group">
            		<label for="">Title</label>
            		<input class="form-control" type="text" name="title" required>
            	</div>
            	<div class="form-group">
            		<label for="">Category</label>
            		<select name="category" id="" class="form-control">
            			@foreach($categories as $category)
            				<option value="{{$category->id}}">{{$category->category}}</option>
            			@endforeach
            		</select>
            	</div>
            	<div class="form-group">
            		<label for="">Description</label>
            		<textarea class="ckeditor form-control" name="description" id="" rows="10"></textarea>
            	</div>
            	<div class="form-group">
            		<label for="">Image</label>
            		<input class="form-control" type="file" name="image">
            	</div>

            	<input class="btn btn-success" type="submit" name="submit" value="Post">
            </form>
          </div>
        </div>

      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
      <div class="w-100">
        <h2 class="mb-5">Your Posts</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <table class="table" width="100">
          	<thead>
          		<tr>
          			<th>Title</th>
          			<th>Date</th>
          			<th>Views</th>
          			<th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		@foreach ($posts as $post)
          			<tr>
          				<td>{{$post->title}}</td>
          				<td>{{$post->posted_at}}</td>
          				<td>{{$post->views}}</td>
          				<td style="width: 30%;">
          					<a class="btn btn-primary" href="{{ route('readPost',['id'=>$post->id]) }}">View</a>
          					<a class="btn btn-warning" href="">Edit</a>
          					<a class="btn btn-danger" href="">Delete</a>
          				</td>
          			</tr>
          		@endforeach
          	</tbody>
          </table>
        </div>

      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
      <div class="w-100">
        <h2 class="mb-5">Edit Profile</h2>

        <div class="subheading col-md-8 mb-3">
          @foreach($user as $val)
          <form action="{{ route('updateUser') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="">Name</label>
              <input class="form-control" type="text" name="name" value="{{$val->name}}">
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input class="form-control" type="text" name="country" value="{{$val->country}}">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input class="form-control" type="text" name="phone" value="{{$val->phone}}">
            </div>
            <div class="form-group">
              <label for="">About Me</label>
              <textarea class="ckeditor form-control" name="description" id="" rows="10">{{$val->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="">Profile Picture</label>
              <input class="form-control" type="file" name="image">
            </div>
            <input class="btn btn-success" type="submit" name="submit" value="UPDATE">
          </form>
          @endforeach
        </div>
        

        <div class="subheading mb-3">Workflow</div>
        <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-check"></i>
            Mobile-First, Responsive Design</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Cross Browser Testing &amp; Debugging</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Cross Functional Teams</li>
          <li>
            <i class="fa-li fa fa-check"></i>
            Agile Development &amp; Scrum</li>
        </ul>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
      <div class="w-100">
        <h2 class="mb-5">Interests</h2>
        <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
        <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="awards">
      <div class="w-100">
        <h2 class="mb-5">Awards &amp; Certifications</h2>
        <ul class="fa-ul mb-0">
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Google Analytics Certified Developer</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            Mobile Web Specialist - Google Certification</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - University of Colorado Boulder - Emerging Tech Competition 2009</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - University of Colorado Boulder - Adobe Creative Jam 2008 (UI Design Category)</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            2<sup>nd</sup>
            Place - University of Colorado Boulder - Emerging Tech Competition 2008</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            1<sup>st</sup>
            Place - James Buchanan High School - Hackathon 2006</li>
          <li>
            <i class="fa-li fa fa-trophy text-warning"></i>
            3<sup>rd</sup>
            Place - James Buchanan High School - Hackathon 2005</li>
        </ul>
      </div>
    </section>

  </div>

@endsection
@section('script')
  <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
@endsection