<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="js/password_modal.js"></script>


	<!-- bootstrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<title>ログイン画面</title>
</head>

<body>
	<header>
		<div class="header-title">
			<h3>社員管理システム</h3>
		</div>
	</header>
	<div class="container">
		<div class="center-block">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
	</div>
	<div class="container login-form">
		<form action={{ url('/login') }} method="post">
			@csrf
			<div class="row">
				<div class="col-5 text-end">
					<label for="id" class="text-end">社員番号</label>
				</div>
				<div class="col-7">
					<input type="text" name="id" id="id">
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-5 text-end">
					<label for="password">パスワード</label>
				</div>
				<div class="col-7">
					<input type="password" name="password" id="password">
				</div>
			</div>
			</br>
			<div class="row">
				<div class="text-center">
					<button class="btn btn-primary bi-arrow-return-right login-button" type="submit"> ログイン</button>
				</div>
			</div>
		</form>
	</div>

</body>

</html>