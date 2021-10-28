<?php


namespace App\Http\Controllers;


use App\Member;
use Illuminate\Routing\Controller as BaseController;

class MemberController extends BaseController
{
    public function verify(string $token)
    {
        $member = Member::where('card_token', $token)->first();

        return view('card_verification', ['member' => $member]);
    }
}
