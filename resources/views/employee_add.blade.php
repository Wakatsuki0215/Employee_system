@include('components.header')
<h4>新規登録</h4>
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
<form action="{{ route('create')}}" method="post">
@csrf
	<!-- 入力フォームパーツ読み出し部分 -->
	<label for="id">社員番号</label><br>
	@include('components.employee_form')

	<label for="password">パスワード</label>
	<input type="password" name="password"></br>
	<label for="password">パスワード(確認用)</label>
	<input type="password" name="confirmed"></br>
	<a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>
	<input type="submit" class="btn btn-success" value="登録">
</form>