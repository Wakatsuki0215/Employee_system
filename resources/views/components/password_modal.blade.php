<!-- モーダル開いた時の背景 -->
<div class="overlay"></div>
<!-- モーダル画面 -->
<div class="modal" data-id="{{ $employee->id }}">
    <!-- モーダル画面を閉じ、一覧画面に戻る -->
    <form action="" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <h2>パスワード変更</h2>
            </br>
            </br>
            <div class="row">
                <div>
                    <label for="password">新しいパスワード
                        <input type="password" name="password">
                    </label></br>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="password">新しいパスワード(確認用)
                        <input type="password" name="password_confirmation">
                    </label><br>
                </div>
            </div>
            </br>
            <div>
            <a type="button" class="close">戻る</a>
            <input type="submit" class="btn btn-success" value="保存">
            </div>
        </div>
    </form>
</div>