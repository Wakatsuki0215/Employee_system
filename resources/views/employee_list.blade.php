<link rel="stylesheet" href="{{ asset('/css/employee_list.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/password_modal.js"></script>

@include('components.header')



<h4>社員名簿一覧</h4>
@if (session('flash_message'))
<div class="alert" style="color: green;">
    {{ session('flash_message') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
</div>
@endif
<!-- 検索条件　入力フォーム -->
<div class="container d-flex align-items-center justify-content-center p-3 mb-2 bg-light text-black">
    <form action={{url('/employee_list')}} method="GET">
        <!-- 名前検索 -->
        <label for="name">名前
            <input type="text" name="name">
        </label>
        <!-- enumで配列を取ってくるようにする -->
        <!-- 性別検索 -->
        <label for="gender">性別
            <select name="gender" id="gender">
                @foreach (\App\Enums\Gender::getGenders() as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </label>
        <!-- データベースから取ってくる -->
        <!-- 所属検索 -->
        <label for="affiliation_id">所属
            <select name="affiliation_id" id="affiliation_id">
                <option value=""></option>
                @foreach ($response['affiliations'] as $item)
                <option value="{{ $item->id }}">{{ $item->affiliation_name }}</option>
                @endforeach
            </select>
        </label>

        <!-- 権限検索 -->
        <label for="role">権限
            <select name="role" id="role">
                @foreach (\App\Enums\Role::getRoles() as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </label>

        <!-- 無効社員　チェック項目 -->
        <label for="status">
            <input type="checkbox" name="status" value="disabled">
            無効を含む
        </label>

        <!-- クリア・検索ボタン -->
        <input type=reset class="btn btn-secondary" value="クリア">
        <input type=submit class="btn btn-primary" value="検索">
    </form>
</div>

<!-- 新規登録画面　遷移ボタン -->
<div class="container">
    <div class="row justify-content-between">
        <div class="count">
            {{ $employees->firstItem() }}~{{ $employees->lastItem() }}件表示/全{{ $employees->total() }}件
        </div>
        <div class="add-btn">
            <form action={{ url('/employee_add')}} method="get">
                <input type=submit class=" btn btn-primary" value="新規作成">
            </form>
        </div>
    </div>
</div>

<!-- 社員一覧表示 -->
<div class="container">
    <div class="scroll_area">
        <table class="table  table-striped">
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
                <!-- インクルートで -->
                <td>{{ \App\Enums\Gender::getGender($employee->gender) }}</td>
                <!-- ファンクションを作って持ってくるようにする。 -->
                <td>{{ \App\Enums\Affiliation::getDescription($employee->affiliation_id) }}</td>
                <!-- @inject('response','App\Http\Services\GetEmployeeListService')　-->
                <td>{{ $employee->mail }}</td>
                <td>{{ $employee->tel }}</td>
                <!-- パスワードモーダル -->
                <td>
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{ $employee->id }}">
                        <i class="bi-key" style="font-size: 1.5rem;"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal" id="exampleModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="dialog" role="document">
                            <div class="content">
                                <div>
                                    <h5 class="modal-title" id="exampleModalLabel"> {{ $employee->name }} のパスワード変更</h5>
                                </div>
                                <form class="center" action="{{ url('/employee_password', $employee->id) }}" method="post">
                                    @csrf
                                    // TODO: 検索はGETです。初期取得と同じ扱いになります。
                                    @method('PUT')
                                    <div class="modal-password-form">
                                        <label for="password">新しいパスワード</label>
                                        <input type="password" name="password">
                                        <i class="toggle-pass bi bi-eye-slash"></i>
                                    </div>
                                    <div class="modal-password-form">
                                        <label for="password">新しいパスワード(確認用)</label>
                                        <input type="password" name="password_confirmation">
                                        <i class="toggle-pass bi bi-eye-slash"></i>
                                    </div>
                                    <div class="modal-password-form">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                                        <input type="submit" class="btn btn-success" value="変更">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="/employee_edit/{{$employee->id}}" class="bi bi-pencil" style="font-size: 1.5rem; color: green;"></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<!-- <div class="pagination">{{ $employees->links() }}</div> -->