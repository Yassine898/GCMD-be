<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    /** @use HasFactory<\Database\Factories\PayementFactory> */
    use HasFactory;
    protected $fillable=['payment_date','member_id'];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
