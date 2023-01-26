<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'account' => 'required|exists:accounts'
        ]);

        $account = Account::where('account', $request->account)->first();
        return response($account, 200);
    }

    public function account($account)
    {
        $account = Account::where('account', $account)->first();
        $dados = $account->movimentacoes();
      
        $account['saldo'] = $dados['saldo'];
        $datas = [
            "account" => $account,
            "movimentacoes" => $dados['movimentacoes']
        ];
        return response($datas, 200);

    }
}
