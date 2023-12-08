<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use App\http\Services\GetEmployeeListService;
use App\http\Services\GetEmployeeAddService;
use App\http\Services\PostEmployeeService;
use App\http\Services\PutEmployeeService;
use App\http\Services\GetEmployeeEditService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    //一覧
    public function index(Request $request, GetEmployeeListService $service)
    {
        $data = $request->all();

        $response = $service->SearchEmployee($data);

        $employees = $service->Paginated($data);

        $password = $service->PasswordChange();

        return view('employee_list', ['response' => $response, 'employees' => $employees]);
    }


    // 新規登録
    public function new(GetEmployeeAddService $service)
    {
        $affiliations = $service->AffiliationSelect();

        return view('employee_add',['affiliations' => $affiliations]);
    }

    //登録処理
    public function create(EmployeeRequest $request, PostEmployeeService $service)
    {
        // 登録フォームから入力したデータを受け取る
        $data = $request->all();

        $employee = $service->AddEmployee($data);

        // 一覧に戻る
        return redirect()->route('index');
    }

    // 詳細
    public function show()
    {
        // authでログインユーザーのマイページに遷移してもらうようにする。
        $employee = auth::user();
        return view('employee_show', ['employee' => $employee]);
    }

    // 編集
    public function get(Request $request, GetEmployeeEditService $service)
    {
        // $affiliations = [
        //     '1' => 'システム事業部',
        //     '2' => 'BS',
        //     '3' => 'CS',
        //     '4' => '営業部',
        //     '5' => '総務部',
        //     '6' => '業務本部',
        // ];

        $data = $request->all();
        $employee = $service->GetEmployee($request->id);
        return view('employee_edit', ['employee' => $employee]);
    }

    // 更新
    public function update(EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        $service->EditEmployee($request->id, $data);
        return redirect()->route('index');
    }

    //パスワード（モーダル）
    public function password(Request $request,)
    {
        $data = $request->all();
        return view('password_change');
    }

    // パスワード変更
    public function password_change()
    {

    }

}
