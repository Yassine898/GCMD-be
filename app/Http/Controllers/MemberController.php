<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Member;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class MemberController extends Controller
{
     public function index()
{
    
    $members = Member::paginate(10)->through(function ($member) {
        $member->encrypted_id = Crypt::encryptString($member->id);
        return $member;
    });

    return response()->json(compact('members'));
}

    public function store(Request $request){
        $credentials = $request->validate([
            'first_name'=>'required|string|min:3',
            'last_name'=>'required|string|min:3', 
            'email'=>'email',           
            'money_paid_monthly'=>'required'       
        ]);
        Log::info($credentials);
        $member=Member::create($credentials);
        if($request->wallet_balance){
           Wallet::create([
            'member_id'=>$member->id,
            'balance'=>$request->wallet_balance
        ]); 
        }else{
            Wallet::create([
            'member_id'=>$member->id,
            'balance'=>0
        ]);
        }
        
        return response()->json(['message'=>'member created successfully!!']);
    }

    public function delete($id){
        $member=Member::findOrFail($id);
        if(!$member){
            return response()->json(['message'=>'member not found'],404);
        }

        $member->delete();
        return response()->json(['message'=>'member deleted successfully']);
    }
public function detail($id)
{
   
       

        $member = Member::with(['wallet', 'paids'])->find($id);

        if (!$member) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        return response()->json(compact('member'));

    
}
public function bulkDelete(Request $request){
    $validated = $request->validate([
        'member_ids'=>'required'
    ]);
    foreach($validated['member_ids'] as $member_id){
        $member=Member::find($member_id);
        if(!$member){
            return response()->json(['message'=>'member not found,delete blocked']);
        }
        $member->delete();
    }
    return response()->json(['message'=>'all members selected is deleted successfully!!']);
}

}
