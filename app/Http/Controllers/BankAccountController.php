<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Http\Requests\TransactionRequest;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Services\BankAccountService;

class BankAccountController extends Controller
{
    protected BankAccountService $service;
    protected BankAccount $bankAccount;


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

    public function deposit(TransactionRequest $request, $id)
    {

        $data = $this->bankAccount->findOrFail($id);

        $result = $this->service->deposit($data, $request->amount);

        return redirect()->back()->with($result['status'], $result['message']);

    }

    public function withdraw(TransactionRequest $request, $id)
    {

        $data = $this->bankAccount->findOrFail($id);

        $result = $this->service->withdraw($data, $request->amount);

        return redirect()->back()->with($result['status'], $result['message']);
    }
}