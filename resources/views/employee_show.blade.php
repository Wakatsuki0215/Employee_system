@include('components.header')
<h4>マイページ</h4>
<div class="container">
    <div class="row">
        <div class="col-2">
            社員番号
        </div>
        <div class="col-10">
            {{$employee->id}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            名前
        </div>
        <div class="col-2">
            {{$employee->name}}
        </div>
        <div class="col-2">
            ひらがな
        </div>
        <div class="col-4">
            {{$employee->kana}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            性別
        </div>
        <div class="col-2">
            {{$employee->gender}}
        </div>
        <div class="col-2">
            生年月日
        </div>
        <div class="col-4">
            {{$employee->age}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            郵便番号
        </div>
        <div class="col-10">
            〒{{$employee->postcode}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            住所
        </div>
        <div class="col-10">
            {{$employee->address}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            所属
        </div>
        <div class="col-10">
            {{$employee->affiliation_id}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            メールアドレス
        </div>
        <div class="col-10">
            {{$employee->mail}}
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            電話番号
        </div>
        <div class="col-10">
            {{$employee->tel}}
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            管理権限
        </div>
        <div class="col-10">
            {{$employee->role}}
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <a type="button" class="btn btn-secondary" href={{ url('/employee_list') }}>戻る</a>
</div>