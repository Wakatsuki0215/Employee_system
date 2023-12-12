<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/employee_list.js"></script>

<link rel="stylesheet" href="{{ asset('/css/form.css') }}">
<!-- NOTE: indent修正 -->
<div class="container">
    <ul>
        <li>
            @if(empty($employee))
            <label for="id">社員番号</label><br>
            @elseif(!empty($employee))
            <label for="id">社員番号</label>
            <span>{{$employee->id}}</span></br>
            @endif
        </li>
        <div class="row">
            <div class="col-sm">
                <label for="name">名前</label>
                <input type="text" name="name" id="name" value="{{ old('name', isset($employee) ? $employee->name : '') }}">
            </div>
            <div class="col-sm">
                <label for="kana">ふりがな</label>
                <input type="text" name="kana" id="kana" value="{{ old('kana', isset($employee) ? $employee->kana : '') }}"></br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label for="gender">性別</label>
                <input type="radio" name="gender" value="male" <?php echo (isset($employee['gender']) && $employee['gender'] === 'male') ? 'checked' : ''; ?>>男性
                <input type="radio" name="gender" value="female" <?php echo (isset($employee['gender']) && $employee['gender'] === 'female') ? 'checked' : ''; ?>>女性
            </div>
            <div class="col-sm">
                <label for="age">生年月日</label>
                <input type="date" name="age" value="{{ old('age', isset($employee) ? $employee->age : '') }}"></br>
            </div>
        </div>
        <li>
            <label for="postcode">郵便番号</label>
            <input type="text" name="postcode" placeholder="〒" value="{{ old('postcode', isset($employee) ? $employee->postcode : '') }}"></br>
        </li>
        <li>
            <label for="address">住所</label>
            <input type="text" size="50" name="address" value="{{ old('address', isset($employee) ? $employee->address : '') }}"></br>
        </li>
        <li>
            <label for="affiliation_id">所属</label>
            <select name="affiliation_id">
                <option value=""></option>
                @foreach($affiliations as $key => $affiliation)
                <option value="{{ $affiliation->id }}" {{ old('affiliation_id',isset($employee['affiliation_id']) && $employee['affiliation_id'] === $key ? 'selected' : '') }}>
                    {{ $affiliation->affiliation_name }}
                </option>
                @endforeach
            </select></br>
        </li>
        <li>
            <label for="mail">メールアドレス</label>
            <input type="email" name="mail" value="{{ old('mail', isset($employee) ? $employee->mail : '') }}"></br>
        </li>
        <li>
            <label for="tel">電話番号</label>
            <input type="text" name="tel" value="{{ old('tel', isset($employee) ? $employee->tel : '') }}"></br>
        </li>
        <li>
            <label for="role">管理権限</label>
            <select name="role" id="role">
                <option value=""></option>
                <option value="general" <?php echo (isset($employee['role']) && $employee['role'] === 'general') ? 'selected' : ''; ?>>一般</option>
                <option value="admin" <?php echo (isset($employee['role']) && $employee['role'] === 'admin') ? 'selected' : ''; ?>>管理者</option>
            </select></br>
        </li>
        <li>
            <label for="status">ステータス</label>
            <select name="status" id="status">
                <option value="enabled" <?php echo (isset($employee['status']) && $employee['status'] === 'enabled') ? 'selected' : ''; ?>>有効</option>
                <option value="disabled" <?php echo (isset($employee['status']) && $employee['status'] === 'disabled') ? 'selected' : ''; ?>>無効</option>
            </select></br>
        </li>
        @if(empty($employee))
        <li>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password">
            <i id="toggleIcon" class="toggle-pass bi bi-eye-slash"></i>
        </li>
        <li>
            <label for="password">パスワード(確認用)</label>
            <input type="password" id="password" name="password_confirmation">
            <i id="toggleIcon" class="toggle-pass bi bi-eye-slash password__toggle"></i>
        </li>
        @endif
    </ul>
</div>
<div class="container d-flex justify-content-center">
    <a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>
    @if(empty($employee))
    <input type="submit" class="btn btn-success form_button" value="登録">
    @elseif(!empty($employee))
    <input type="submit" class="btn btn-success form_button" value="保存">
    @endif
</div>