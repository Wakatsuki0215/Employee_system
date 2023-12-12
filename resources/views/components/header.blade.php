<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('/css/header.css') }}">
<!-- NOTE: indent修正 -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e3f2fd;">
        <h3><a href="/employee_list" style="color:black;">社員管理システム</a></h3>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    ログインユーザー：
                    <a class="text-muted" href="#" id="navbarSupportedContent" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('name') }}
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href={{ url('/employee_show') }}>マイページ</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{ session('id') }}">パスワード変更</a>
                            <a class="dropdown-item" href="/logout">ログアウト</a>
                        </div>
                </li>
                </li>
            </ul>
        </div>
    </nav>
</header>