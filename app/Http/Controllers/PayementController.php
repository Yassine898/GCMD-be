<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PayementController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            "member_id"=>"required" ,
                    "payment_date"=>"date|required",
                    "balance"=>"required|numeric" 
        ]);
            $member = Member::with('wallet')->find($validated['member_id']);

            if (!$member) {
                return response()->json(['message' => 'Member not found'], 404);
            }

            if (!$member->wallet) {
                return response()->json(['message' => 'Wallet not found'], 404);
            }

            $member->wallet->updateBalance($validated['balance']);
            $member->paids()->create([
                'payment_date'=>$validated['payment_date']
            ]);
            return response()->json(['message' => 'the month paided successfully']);
       
    }
}
