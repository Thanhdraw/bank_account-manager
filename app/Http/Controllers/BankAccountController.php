<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Services\BankAccountService;

class BankAccountController extends Controller
{
    protected $service;
    protected $bankAccount;


    public function __construct(BankAccountService $service, BankAccount $bankAccount)
    {
        $this->service = $service;
        $this->bankAccount = $bankAccount;
    }


    public function index()
    {
        $accounts = BankAccount::all();
        return view('public.accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('public.accounts.create');
    }

    public function store(BankAccountRequest $request)
    {
        $data = $request->validated();
        $this->bankAccount->create($data);
        return redirect()->route('accounts.index')->with('success', 'Tạo tài khoản thành công');
    }

    public function show(BankAccount $account)
    {
        return view('public.accounts.show', compact('account'));
    }

    public function deposit(Request $request, BankAccount $account)
    {
        $result = $this->service->deposit($account, $request->amount);
        if ($result['status'] === 'success') {
            return redirect()->back()->with('success', $result['message']);
        }
        return redirect()->back()->with('error', $result['message']);

    }

    public function withdraw(Request $request, BankAccount $account)
    {

        $result = $this->service->withdraw($account, $request->amount);
        if ($result['status'] === 'success') {
            return redirect()->back()->with('success', $result['message']);
        }
        return redirect()->back()->with('error', $result['message']);
    }
}