<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン画面</title>
</head>
<body>
    <h1>ログイン画面</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action={{ url('/login') }} method="post">
        @csrf
        <label for="id">社員番号</label>
        <input type="text" name="id" id="id"><br>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password"><br>
        <button type="submit">送信</button>
    </form>
</body>
</html>