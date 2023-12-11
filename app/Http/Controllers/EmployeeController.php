<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\PasswordRequest;
use App\http\Services\GetEmployeeListService;
use App\http\Services\GetEmployeeAddService;
use App\http\Services\PostEmployeeService;
use App\http\Services\PutEmployeeService;
use App\http\Services\GetEmployeeService;
use App\http\Services\UpdatePasswordService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    // 表示
    //一覧
    public function index(Request $request, GetEmployeeListService $service)
    {
        $data = $request->all();
        $response = $service->searchEmployee($data);

        return view('employee_list', [
            'employees' => $response['employees'],
            'affiliations' => $response['affiliations']
        ]);
    }

    // 新規登録
    public function new(GetEmployeeAddService $service)
    {
        $affiliations = $service->getAffiliation();
        return view('employee_add', ['affiliations' => $affiliations]);
    }

    // 詳細
    public function show(GetEmployeeService $service)
    {
        $employee = $service->getEmployee(session('id'));

        return view('employee_show', ['employee' => $employee]);
    }

    // 編集
    public function get(Request $request, GetEmployeeService $service)
    {
        $response = $service->getEmployee($request->id);
        return view('employee_edit', ['employee' => $response['employee'], 'affiliations' => $response['affiliations']]);
    }




    // 処理
    //登録
    public function create(EmployeeRequest $request, PostEmployeeService $service)
    {
        // 登録フォームから入力したデータを受け取る
        $data = $request->all();
        $service->addEmployee($data);
        // 一覧に戻る
        return redirect()->route('index');
    }

    // 更新
    public function update(int $id, EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        $service->editEmployee($id, $data);

        return redirect()->route('index');
    }

    // モーダルパスワード変更
    public function password(int $id, PasswordRequest $request, UpdatePasswordService $service)
    {
        $data = $request->all();
        $service->updatePassword($id, $data);

        return redirect('/employee_list')->with('session','パスワードの変更が完了しました。');;
    }
}
