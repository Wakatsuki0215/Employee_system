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


// TODO: 返却メッセージの名称を変更したので画面側の修正をしてください。
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
        // NOTE: 改行
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
        // NOTE: 改行
        return view('employee_edit', ['employee' => $response['employee'], 'affiliations' => $response['affiliations']]);
    }

    // 処理
    // 登録
    public function create(EmployeeRequest $request, PostEmployeeService $service)
    {
        $data = $request->all();
        $result = $service->addEmployee($data);

        return redirect('/employee_list')->with('success_message', '社員情報を登録しました。');
    }

    // 更新
    public function update(int $id, EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        // NOTE: 排他チェック追加
        $result = $service->editEmployee($id, $data);

        if ($result) {
            return redirect('/employee_list')->with('success_message', '社員情報を更新しました。');
        } else {
            return redirect('/employee_list')->with('error_message', '他のユーザーが社員情報を実行中です。');
        }
    }

    // モーダルパスワード変更
    public function password(int $id, PasswordRequest $request, UpdatePasswordService $service)
    {
        $data = $request->all();
        // TODO: 排他チェック追加してください。
        $service->updatePassword($id, $data);

        return redirect('/employee_list')->with('success_message', 'パスワードを更新しました。');
    }
}
