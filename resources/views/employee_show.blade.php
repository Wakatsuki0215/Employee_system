<link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@include('components.header')
<h4>マイページ</h4>
<div class="container">
    <ul>
        <li>
            <label for="id">社員番号</label>
            {{$employee['id']}}
        </li>
        <div class="row">
            <div class="col-sm">
                <label for="name">名前</label>
                {{$employee['name']}}
            </div>
            <div class="col-sm">
                <label for="kana">ふりがな</label>
                {{$employee['kana']}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label for="gender">性別</label>
                {{\App\Enums\Gender::getGender($employee['gender'])}}
            </div>
            <div class="col-sm">
                <label for="age">生年月日</label>
                {{$employee['age']}}
            </div>
        </div>
        <li>
            <label for="postcode">郵便番号</label>
            〒{{$employee['postcode']}}
        </li>
        <li>
            <label for="address">住所</label>
            {{$employee['address']}}
        </li>
        <li>
            <label for="affiliation_id">所属</label>
            {{ optional($affiliations->where('id', $employee['affiliation_id'])->first())->affiliation_name }}
        </li>
        <li>
            <label for="mail">メールアドレス</label>
            {{$employee['mail']}}
        </li>
        <li>
            <label for="tel">電話番号</label>
            {{$employee['tel']}}
        </li>
        <li>
            <label for="role">管理権限</label>
            {{\App\Enums\Role::getRole($employee['role'])}}
        </li>
        <li>
            <label for="status">ステータス</label>
            {{\App\Enums\Status::getStatus($employee['status'])}}
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>
</div>