<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'conta',
        'client'
    ];

    public function movimentacoes()
    {
        $movimentacoes = $this->hasMany(Movement::class, 'account_id')->get();
        $saldo = 0;

        foreach ($movimentacoes as $movimento) {
            if ($movimento->type == 1) {
                $saldo += $movimento->value;
            } else {
                $saldo -= $movimento->value;
            }

            $movimento->data = date_format($movimento->created_at, 'd/m/Y H:i:s');
        }

        return [
            "movimentacoes" => $movimentacoes,
            "saldo" => $saldo
        ];
    }
}
