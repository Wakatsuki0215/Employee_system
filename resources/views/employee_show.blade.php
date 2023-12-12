<link rel="stylesheet" href="{{ asset('/css/form.css') }}">
@include('components.header')
<h4>マイページ</h4>
<!-- <div class="container">
    <div class="row">
        <div class="col-2">
            社員番号
        </div>
        <div class="col-10">
            {{$employee['employee']->id}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            名前
        </div>
        <div class="col-2">
            {{$employee['employee']->name}}
        </div>
        <div class="col-2">
            ひらがな
        </div>
        <div class="col-4">
            {{$employee['employee']->kana}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            性別
        </div>
        <div class="col-2">
            {{$employee['employee']->gender}}
        </div>
        <div class="col-2">
            生年月日
        </div>
        <div class="col-4">
            {{$employee['employee']->age}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            郵便番号
        </div>
        <div class="col-10">
            〒{{$employee['employee']->postcode}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            住所
        </div>
        <div class="col-10">
            {{$employee['employee']->address}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            所属
        </div>
        <div class="col-10">
            {{$employee['employee']->affiliation_id}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            メールアドレス
        </div>
        <div class="col-10">
            {{$employee['employee']->mail}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            電話番号
        </div>
        <div class="col-10">
            {{$employee['employee']->tel}}
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            管理権限
        </div>
        <div class="col-10">
            {{$employee['employee']->role}}
        </div>
    </div>
</div> -->
<div class="container">
    <ul>
        <li>
            <label for="id">社員番号</label>
            {{$employee['employee']->id}}
        </li>
        <div class="row">
            <div class="col-sm">
                <label for="name">名前</label>
                {{$employee['employee']->name}}
            </div>
            <div class="col-sm">
                <label for="kana">ふりがな</label>
                {{$employee['employee']->kana}}
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <label for="gender">性別</label>
                {{\App\Enums\Gender::getGender($employee['employee']->gender)}}
            </div>
            <div class="col-sm">
                <label for="age">生年月日</label>
                {{$employee['employee']->age}}
            </div>
        </div>
        <li>
            <label for="postcode">郵便番号</label>
            〒{{$employee['employee']->postcode}}
        </li>
        <li>
            <label for="address">住所</label>
            {{$employee['employee']->address}}
        </li>
        <li>
            <label for="affiliation_id">所属</label>
            {{\App\Enums\Affiliation::getAffiliation($employee['employee']->affiliation_id)}}
        </li>
        <li>
            <label for="mail">メールアドレス</label>
            {{$employee['employee']->mail}}
        </li>
        <li>
            <label for="tel">電話番号</label>
            {{$employee['employee']->tel}}
        </li>
        <li>
            <label for="role">管理権限</label>
            {{\App\Enums\Role::getRole($employee['employee']->role)}}
        </li>
        <li>
            <label for="status">ステータス</label>
            {{\App\Enums\Status::getStatus($employee['employee']->status)}}
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>
</div>