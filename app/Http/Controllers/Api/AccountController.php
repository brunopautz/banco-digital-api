<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Movement;
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
        $dados = $account->movements();
      
        $account['balance'] = $dados['balance'];
        $datas = [
            "account" => $account,
            "movements" => $dados['movements']
        ];
        return response($datas, 200);

    }

    public function deposit(Request $request, $account)
    {
        $request->validate([
            'value' => 'required|numeric|min:0.01',
            'account' => 'required|exists:accounts'
        ]);

        $account = Account::where('account', $request->account)->first();

        $deposito = new Movement();
        $deposito->account_id = $account->id;
        $deposito->value = floatval($request->value);
        $deposito->type = $request->type;
        $deposito->save();


        $dados = $account->movements();
        $account['balance'] = number_format($dados['balance'], 2,',', '.');;

        $datas = [
            'account' => $account,
            "movements" => $dados['movements']
        ];
        
        return response($datas, 200);
    }

    public function saque(Request $request, $account)
    {
        $request->validate([
            'value' => 'required|numeric|min:0.01',
            'account' => 'required|exists:accounts'
        ]);

        $account = Account::where('account', $request->account)->first();

        $dados = $account->movements();
        $account['balance'] = $dados['balance'];

        if (floatval($request->value) > floatval($account['balance'])) {
            return response()->json(['errors' => ['saque' => ['Saldo insuficiente.']]], 422);
        }

        $saque = new Movement();
        $saque->account_id = $account->id;
        $saque->value = floatval($request->value);
        $saque->type = $request->type;
        $saque->save();

        $account['balance'] = number_format(($account['balance'] - $saque->value), 2, ',', '.');
        $saque->value = number_format($saque->value, 2,',', '.');
        $datas = [
            'account' => $account,
            'saque' => $saque
        ];
        
        return response($datas, 200);

    }
}
