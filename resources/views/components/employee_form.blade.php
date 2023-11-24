<label for="name">名前</label>
<input type="text" name="name" id="name" value="{{ isset($employee) ? $employee->name : '' }}">

<label for="kana">ふりがな</label>
<input type="text" name="kana" id="kana" value="{{ isset($employee) ? $employee->kana : '' }}"></br>

<label for="gender">性別</label>
<input type="radio" name="gender" value="male" <?php echo (isset($employee['gender']) && $employee['gender'] === 'male') ? 'checked' : ''; ?>>男性
<input type="radio" name="gender" value="female" <?php echo (isset($employee['gender']) && $employee['gender'] === 'female') ? 'checked' : ''; ?>>女性

<label for="age">生年月日</label>
<input type="date" name="age" value="{{ isset($employee) ? $employee->age : '' }}"></br>

<label for="postcode">郵便番号</label>
<input type="text" name="postcode" value="{{ isset($employee) ? $employee->postcode : '' }}"></br>

<label for="address">住所</label>
<input type="text" name="address" value="{{ isset($employee) ? $employee->address : '' }}"></br>

<label for="affiliation_id">所属</label>
<select name="affiliation_id">
  <option value=""></option>
  <option value="1" <?php echo (isset($employee['affiliation_id']) && $employee['affiliation_id'] === '1') ? 'selected' : ''; ?>>システム事業部</option>
  <option value="2" <?php echo (isset($employee['affiliation_id']) && $employee['affiliation_id'] === '2') ? 'selected' : ''; ?>>BS</option>
  <option value="3" <?php echo (isset($employee['affiliation_id']) && $employee['affiliation_id'] === '3') ? 'selected' : ''; ?>>CS</option>
  <option value="4" <?php echo (isset($employee['affiliation_id']) && $employee['affiliation_id'] === '4') ? 'selected' : ''; ?>>営業部</option>
  <option value="5" <?php echo (isset($employee['affiliation_id']) && $employee['affiliation_id'] === '5') ? 'selected' : ''; ?>>総務部</option>
  <option value="6" <?php echo (isset($employee['affiliation_id']) && $employee['affiliation_id'] === '6') ? 'selected' : ''; ?>>業務本部</option>
</select></br>

<label for="mail">メールアドレス</label>
<input type="email" name="mail" value="{{ isset($employee) ? $employee->mail : '' }}"></br>

<label for="tel">電話番号</label>
<input type="text" name="tel" value="{{ isset($employee) ? $employee->tel : '' }}"></br>

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