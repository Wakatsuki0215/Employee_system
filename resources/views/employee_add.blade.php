<h4>新規登録</h4>
<form action="" method="post">
	@csrf
	<label for="id">社員番号</label>
	</br>
	<label for="name">名前</label>
	<input type="text" name="name">

	<label for="kana">ふりがな</label>
	<input type="text" name="kana"></br>

	<label for="gender">性別</label>
	<input type="radio" name="gender" value="male">男性
	<input type="radio" name="gender" value="female">女性

	<label for="age">生年月日</label>
	<input type="date" name="age"></br>

	<label for="postcode">郵便番号</label>
	<input type="text" name="postcode"></br>

	<label for="address">住所</label>
	<input type="text" name="address"></br>

	<label for="affiliation_id">所属</label></br>

	<label for="mail">メールアドレス</label>
	<input type="email" name="mail"></br>

	<label for="tel">電話番号</label>
	<input type="text" name="tel"></br>

	<label for="role">管理権限</label>
	<select name="role" id="role">
		<option value="general" selected="selected">一般</option>
		<option value="admin">管理者</option>
	</select></br>
	<label for="status">ステータス</label>
	<select name="status" id="status">
		<option value="status" selected="selected">有効</option>
		<option value="status">無効</option>
	</select></br>
	</br>
	<label for="password">パスワード</label>
	<input type="password" name="password"></br>
	<label for="password">パスワード(確認用)</label>
	<input type="password" name="password_confirmation"></br>
	<button type="button" onClick="history.back()">戻る</button>
	<input type="submit" value="登録">
</form>