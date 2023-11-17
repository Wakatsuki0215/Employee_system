@include('layouts.header')
<h4>社員名簿一覧</h4>
<!-- 検索条件　入力フォーム -->
<div>
  <form action="{{ route('index') }}" method="GET">
    @csrf
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
    <input type=reset class="btn btn-secondary"  value="クリア">
    <input type=submit class="btn btn-primary" value="検索">
  </form>
</div>

<!-- 新規登録画面　遷移ボタン -->
<form action={{ url('/employee')}} method="get">
  @csrf
  <input type=submit class="btn btn-outline-primary" value="新規作成">
</form>


<!-- 社員一覧表示 -->
<table>
  <tr>
    <th>名前</th>
    <th>性別</th>
    <th>所属</th>
    <th>メールアドレス</th>
    <th>電話番号</th>
    <th></th>
  </tr>

  @foreach ($response['employees'] as $employee)
  <tr>
    <td>{{ $employee->name }}</td>
    <td>{{ $employee->gender }}</td>
    <td>{{ $employee->affiliation_id }}
      {{ App\Enums\AffiliationType::getDescription(1) }}
    </td>
    <td>{{ $employee->mail }}</td>
    <td>{{ $employee->tel }}</td>
    <td></td>
  </tr>
  @endforeach
</table>