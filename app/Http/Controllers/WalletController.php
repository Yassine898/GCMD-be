<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class WalletController extends Controller
{
    public function updateBalance(Request $request, $id)
    {
        $validated = $request->validate([
            "balance" => 'required|numeric',
        ]);

      
           

            $member = Member::with('wallet')->find($id);

            if (!$member) {
                return response()->json(['message' => 'Member not found'], 404);
            }

            if (!$member->wallet) {
                return response()->json(['message' => 'Wallet not found'], 404);
            }

            $member->wallet->updateBalance($validated['balance']);

            return response()->json(['message' => 'Balance updated successfully']);
        
    }
}
