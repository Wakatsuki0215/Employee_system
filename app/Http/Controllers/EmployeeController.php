<?php

namespace App\Http\Controllers;

use App\Models\EmployeeMaster;
use App\Models\AffiliationMaster;
use App\Http\Requests\EmployeeRequest;
use App\http\Services\GetEmployeeListService;
use App\http\Services\PostEmployeeService;
use App\http\Services\PutEmployeeService;
use App\Services\GetEmployeeEditService;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    //一覧
    public function index(Request $request, GetEmployeeListService $service)
    {
        $data = $request->all();

        $response = $service->SearchEmployee($data);

        return view('employee_list', ['response' => $response]);
    }

    // 新規登録
    public function new(Request $request)
    {
        return view('employee_add');
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
    }

    // 編集
    public function get(Request $request)
    {
        $employee = EmployeeMaster::find($request->id);
        return view('employee_edit', ['employee' => $employee]);
    }

    // 更新
    public function update(EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        $employee = EmployeeMaster::find($request->id);
        $updatedEmployee = $service->EditEmployee($data, $employee);

        return redirect()->route('index');
    }
}
