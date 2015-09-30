<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/js/chat.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="row">
	<div class="page-header">
	  <h1>Welcome {{ Auth::user()->name }}<small></small>
	  <input type="hidden" name="id_cu" id="inputId_cu" class="form-control" value="{{ Auth::user()->id }}"> 
	  <input type="hidden" name="name_u1" id="name_u1" class="form-control" value="{{ Auth::user()->name }}">
	  </h1>
	</div>
</div>
	<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		{{-- */$x=0;/* --}}
		<select name="" id="inputselect" class="form-control" required="required" multiple="">
			@foreach($user as $item)
			{{-- */$x++;/* --}}
				@if (Auth::user()->id != $item->id)
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endif
			@endforeach		
		</select>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<div id="chat-window"></div>
			<div class="row">
				<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
					<input type="text" name="msg" id="inputmsg" class="form-control" value="" required="required" pattern="" title="">
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" id="sub">
				{!! csrf_field() !!}
					<button type="button" class="btn btn-default">button</button>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>