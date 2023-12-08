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
	<!-- 入力フォームパーツ読み出し部分 -->
	@include('components.employee_form')
</form>