<h2>社員名簿一覧</h2>
<form action={{ url('/logout')}} method="post" >
  @csrf
  <input type=submit value="ログアウト">
</form>

<form action={{ url('/logout')}} method="post" >
  @csrf
  <input type=submit value="新規作成">
</form>