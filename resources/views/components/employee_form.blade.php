<div class="container">

	@if(empty($employee))
	<label for="id">社員番号</label><br>
	@elseif(!empty($employee))
	<label for="id">社員番号</label>
	<span>{{$employee->id}}</span></br>
	@endif

	<label for="name">名前</label>
	<input type="text" name="name" id="name" value="{{ old('name', isset($employee) ? $employee->name : '') }}">

	<label for="kana">ふりがな</label>
	<input type="text" name="kana" id="kana" value="{{ old('kana', isset($employee) ? $employee->kana : '') }}"></br>

	<label for="gender">性別</label>
	<input type="radio" name="gender" value="male" <?php echo (isset($employee['gender']) && $employee['gender'] === 'male') ? 'checked' : ''; ?>>男性
	<input type="radio" name="gender" value="female" <?php echo (isset($employee['gender']) && $employee['gender'] === 'female') ? 'checked' : ''; ?>>女性

	<label for="age">生年月日</label>
	<input type="date" name="age" value="{{ old('age', isset($employee) ? $employee->age : '') }}"></br>

	<label for="postcode">郵便番号</label>
	〒<input type="text" name="postcode" value="{{ old('postcode', isset($employee) ? $employee->postcode : '') }}"></br>

	<label for="address">住所</label>
	<input type="text" name="address" value="{{ old('address', isset($employee) ? $employee->address : '') }}"></br>

	<label for="affiliation_id">所属</label>
	<select name="affiliation_id">
		<option value=""></option>
		@foreach($affiliations as $key => $affiliation)
		<option value="{{ $affiliation->id }}" {{ old('affiliation_id',isset($employee['affiliation_id']) && $employee['affiliation_id'] === $key ? 'selected' : '') }}>
			{{ $affiliation->affiliation_name }}
		</option>
		@endforeach
	</select></br>

	<label for="mail">メールアドレス</label>
	<input type="email" name="mail" value="{{ old('mail', isset($employee) ? $employee->mail : '') }}"></br>

	<label for="tel">電話番号</label>
	<input type="text" name="tel" value="{{ old('tel', isset($employee) ? $employee->tel : '') }}"></br>

	<label for="role">管理権限</label>
	<select name="role" id="role">
		<option value=""></option>
		<option value="general" <?php echo (isset($employee['role']) && $employee['role'] === 'general') ? 'selected' : ''; ?>>一般</option>
		<option value="admin" <?php echo (isset($employee['role']) && $employee['role'] === 'admin') ? 'selected' : ''; ?>>管理者</option>
	</select></br>

	<label for="status">ステータス</label>
	<select name="status" id="status">
		<option value="enabled" <?php echo (isset($employee['status']) && $employee['status'] === 'enabled') ? 'selected' : ''; ?>>有効</option>
		<option value="disabled" <?php echo (isset($employee['status']) && $employee['status'] === 'disabled') ? 'selected' : ''; ?>>無効</option>
	</select></br>

	@if(empty($employee))
	<label for="password">パスワード</label>
	<input type="password" name="password"></br>
	<label for="password">パスワード(確認用)</label>
	<input type="password" name="password_confirmation"><br>
	@endif
</div>

<a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>