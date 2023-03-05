<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset("css/app.css")}}">
	<link rel="stylesheet" href="{{asset("css/main-page.css")}}">
	<link rel="stylesheet" href="{{asset("css/form.css")}}">
	<link rel="stylesheet" href="{{asset("css/table.css")}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
	<link rel="stylesheet" href="{{asset("css/comments.css")}}">
	<meta name="viewport" content="width=1280">
	<title>{{$title}}</title>
</head>
<body oncload="getCaptcha()">
	<div class="wrapper">
        <div class="content">
        	<div class="title">
        		Comments SPA
        	</div>
        	{{ $slot }}
            <div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
	<script type="text/javascript" src="{{asset("js/form.js")}}" ></script>
	<script type="text/javascript" src="{{asset("js/files.js")}}" ></script>
	<script type="text/javascript" src="{{asset("js/preview.js")}}" ></script>
	<script type="text/javascript" src="{{asset("js/scripts.js")}}" ></script>
	<script type="text/javascript" src="{{asset("js/captcha.js")}}" ></script>
</body>
</html>