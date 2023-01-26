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

    public function movements()
    {
        $movements = $this->hasMany(Movement::class, 'account_id')->get();
        $balance = 0;

        foreach ($movements as $movimento) {
            if ($movimento->type == 1) {
                $balance += $movimento->value;
            } else {
                $balance -= $movimento->value;
            }
            $movimento->value = number_format($movimento->value, 2,',', '.');
            $movimento->data = date_format($movimento->created_at, 'd/m/Y H:i:s');
        }

        return [
            "movements" => $movements,
            "balance" => $balance
        ];
    }
}
