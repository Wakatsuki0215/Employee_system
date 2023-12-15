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
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    // 表示
    //一覧
    public function index(Request $request, GetEmployeeListService $service)
    {
        $data = $request->all();
        $response = $service->searchEmployee($data);

        return view('employee_list', $response);
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
        $response = $service->getEmployee(session('id'));

        return view('employee_show', ['employee' => $response['employee'], 'affiliations' => $response['affiliations']]);
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
        $data = $request->all();
        $service->addEmployee($data);

        return redirect('/employee_list')->with('success_message', '社員情報の登録しました。');
    }

    // 更新
    public function update(int $id, EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        $result = $service->editEmployee($id, $data);

        if ($result) {
            return redirect('/employee_list')->with('success_message', '社員情報を更新しました。');
        } else {
            return redirect('/employee_list')->withErrors('他のユーザーが社員情報を実行中です。');
        }
    }

    // モーダルパスワード変更
    public function password(int $id, PasswordRequest $request, UpdatePasswordService $service)
    {
        $data = $request->all();
        $result = $service->updatePassword($id, $data);

        if($result){
            return redirect('/employee_list')->with('success_message', 'パスワードを更新しました。');
        }else{
            return redirect('/employee_list')->withErrors('他のユーザーが社員情報を実行中です。');
        }
    }
}
