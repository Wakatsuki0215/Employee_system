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


// NOTE: メソッド名はじまりは小文字のキャメルケースでそろえましょう
class EmployeeController extends Controller
{
    // 表示
    //一覧
    public function index(Request $request, GetEmployeeListService $service)
    {
        $data = $request->all();
        // NOTE: メソッド名変更
        $response = $service->searchEmployee($data);
        // TODO: $dataはserviceクラス内で使用されていないので一対何の意味があるのだろうか、、
        // TODO: searchEmployee内でpagenateすべきでは？
        $employees = $service->Paginated($data);

        // TODO: responseとemployeesの使い分けはいったい何があるのでしょうか？
        return view('employee_list', ['response' => $response, 'employees' => $employees]);
    }

    // 新規登録
    public function new(GetEmployeeAddService $service)
    {
        $affiliations = $service->affiliationSelect();

        return view('employee_add', ['affiliations' => $affiliations]);
    }

    // 詳細
    public function show()
    {
        // NOTE: 変更予定の認識でよいのか？
        // authでログインユーザーのマイページに遷移してもらうようにする。
        $employee = auth::user();

        return view('employee_show', ['employee' => $employee]);
    }

    // 編集
    public function get(Request $request, GetEmployeeEditService $service)
    {
        // NOTE: responseでまとめて受け取ってください
        $response = $service->getEmployee($request->id);

        return view('employee_edit', ['employee' => $response['employee'], 'affiliations' => $response['affiliations']]);
    }

    // 処理系
    //登録処理
    public function create(EmployeeRequest $request, PostEmployeeService $service)
    {
        // 登録フォームから入力したデータを受け取る
        $data = $request->all();
        // TODO: レスポンスに載せないのであれば$employeeにセットする必要ないです
        // TODO: 不必要な変数セットはメモリが無駄になります
        $employee = $service->addEmployee($data);

        // 一覧に戻る
        return redirect()->route('index');
    }

    // 更新
    public function update(EmployeeRequest $request, PutEmployeeService $service)
    {
        $data = $request->all();
        // NOTE: $request->idではなく変換しているのであれば$data->id
        $service->editEmployee($data->id, $data);

        return redirect()->route('index');
    }

    // モーダルパスワード変更
    public function password(PasswordRequest $request, UpdatePasswordService $service)
    {
        $data = $request->all();
        // NOTE: $request->idではなく変換しているのであれば$data->id
        // TODO: レスポンスに載せないのであれば$employeeにセットする必要ないです
        // TODO: 不必要な変数セットはメモリが無駄になります
        $employee = $service->updatePassword($data->id, $data);

        session()->flash('flash_message', 'パスワードの変更完了しました。');

        return redirect('/employee_list');
    }
}
