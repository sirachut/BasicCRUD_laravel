<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ config('app.name', 'Laravel') }}</title>
	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	</head>
	<body>
		 <div class="container">
  <div class="row page-header">
	 <div class="col-xs-12 col-md-8 col-lg-8">
		 <h1>Show Record : {{ $blog->title }}</h1>
	 </div>
	 <div class="col-xs-12 col-md-4 col-lg-4">
		 <div class="btn-group pull-right" role="group" aria-label="..." >
			  <a href="{{ url()->previous() }}" class="btn btn-default "> Back</a>
		 </div>
	 </div>
</div>
 <!-- /.row -->


 <div class="row">
 	<label  class="col-sm-2">Title</label>
	<div class="col-sm-10">{{ $blog->title }}</div>
</div>
 <div class="row">
 	<label  class="col-sm-2">Content</label>
	<div class="col-sm-10">{{ $blog->content }}</div>
</div>
 <!-- /.row -->
</div>
</body>
</html>
