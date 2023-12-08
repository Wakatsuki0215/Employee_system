<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\PasswordRequest;
use App\http\Services\GetEmployeeListService;
use App\http\Services\GetEmployeeAddService;
use App\http\Services\PostEmployeeService;
use App\http\Services\PutEmployeeService;
use App\http\Services\GetEmployeeEditService;
use App\http\Services\UpdatePasswordService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    // 表示系
    //一覧
    public function index(Request $request, GetEmployeeListService $service)
    {
        $data = $request->all();
        $response = $service->SearchEmployee($data);
        $employees = $service->Paginated($data);

        return view('employee_list', ['response' => $response, 'employees' => $employees]);

    }

    // 新規登録
    public function new(GetEmployeeAddService $service)
    {
        $affiliations = $service->AffiliationSelect();
        return view('employee_add', ['affiliations' => $affiliations]);
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
        // $affiliations = AffiliationMaster::all();
        $data = $request->all();
        $employee = $service->GetEmployee($request->id);
        $affiliations = $service->GetAffiliation();
        return view('employee_edit', ['employee' => $employee, 'affiliations' => $affiliations]);
    }




    // 処理系
    //登録処理
    public function create(EmployeeRequest $request, PostEmployeeService $service)
    {
        // 登録フォームから入力したデータを受け取る
        $data = $request->all();
        $employee = $service->AddEmployee($data);
        // 一覧に戻る
        return redirect()->route('index');
    }

    // 更新
    public function update(EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        $service->EditEmployee($request->id, $data);
        return redirect()->route('index');
    }

    // モーダルパスワード変更
    public function password(PasswordRequest $request, UpdatePasswordService $service)
    {
        $data = $request->all();
        $employee = $service->UpdatePassword($request->id, $data);

        session()->flash('flash_message', 'パスワードの変更完了しました。');
        return redirect('/employee_list');
    }
}
