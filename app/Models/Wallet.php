<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /** @use HasFactory<\Database\Factories\WalletFactory> */
    use HasFactory;
    protected $fillable = ['balance', 'member_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function updateBalance($amount)
    {
        $this->balance = $amount;
        $this->save();
    }
}
