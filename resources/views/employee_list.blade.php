@include('components.header')
<h4>社員名簿一覧</h4>
<!-- 検索条件　入力フォーム -->
<div class="container d-flex align-items-center justify-content-center p-3 mb-2 bg-secondary text-white">
  <form action={{url('/employee_list')}} method="GET">
    <!-- 名前検索 -->
    <label for="name">名前</label>
    <input type="text" name="name">

    <!-- 性別検索 -->
    <label for="gender">性別</label>
    <select name="gender" id="gender">
      <option value=""></option>
      <option value="male">男性</option>
      <option value="female">女性</option>
    </select>

    <!-- 所属検索 -->
    <label for="affiliation_id">所属</label>
    <select name="affiliation_id">
      <option value=""></option>
      <option value="1">システム事業部</option>
      <option value="2">BS</option>
      <option value="3">CS</option>
      <option value="4">営業部</option>
      <option value="5">総務部</option>
      <option value="6">業務本部</option>
    </select>

    <!-- 権限検索 -->
    <label for="role">権限</label>
    <select name="role" id="role">
      <option value=""></option>
      <option value="general">一般</option>
      <option value="admin">管理者</option>
    </select>

    <!-- 無効社員　チェック項目 -->
    <input type="checkbox" name="status" value="disabled">
    <label for="status">無効を含む</label>

    <!-- クリア・検索ボタン -->
    <input type=reset class="btn btn-secondary" value="クリア">
    <input type=submit class="btn btn-primary" value="検索">
  </form>
</div>

<!-- 新規登録画面　遷移ボタン -->
<div class="container">
  <div class="row">
    <form action={{ url('/employee_add')}} method="get">
      <input type=submit class=" btn btn-primary" value="新規作成">
    </form>
  </div>
</div>


<!-- 社員一覧表示 -->
<div class="container d-flex align-items-center justify-content-center">
  <table>
    <tr>
      <th>名前</th>
      <th>性別</th>
      <th>所属</th>
      <th>メールアドレス</th>
      <th>電話番号</th>
      <th></th>
      <th></th>
    </tr>

    @foreach ($response['employees'] as $employee)
    <tr>
      <td>{{ $employee->name }}</td>
      <td>{{ \App\Enums\Gender::getDescription($employee->gender) }}</td>
      <td>{{ \App\Enums\Affiliation::getDescription($employee->affiliation_id) }}</td>
      <td>{{ $employee->mail }}</td>
      <td>{{ $employee->tel }}</td>
      <td></td>
      <td><a href="/employee_edit/{{$employee->id}}" class="text-success">✏</a></td>
    </tr>
    @endforeach
  </table>
</div>