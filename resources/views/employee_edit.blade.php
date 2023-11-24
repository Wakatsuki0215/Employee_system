@include('components.header')
<h4>編集画面</h4>
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

<form action="{{ url('/employee_edit', $employee->id) }}" method="post">
@csrf
@method('PUT')
  <label for="id">社員番号</label>
	<input type="text" name="id" value="{{ isset($employee) ? $employee->id : '' }} " readonly></br>
	<!-- 入力フォームパーツ読み出し部分 -->
	@include('components.employee_form')
	<a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>
	<input type="submit" class="btn btn-success" value="保存">
</form>