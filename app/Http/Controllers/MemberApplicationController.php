<?php

namespace App\Http\Controllers;

use App\MemberApplication;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class MemberApplicationController
{
    public function create()
    {
        $page = Page::where('slug', 'member-application')->first();

        return view('member_application', ['page' => $page]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:60|min:5',
            'telefone' => 'required|string|max:30|min:9',
            'email' => 'required|string|email:rfc,dns|max:70|min:6',
            'document_type' => 'required|integer|min:1|max:999',
            'documento' => 'required|string||max:70|min:6',
            'g-recaptcha-response' => 'recaptcha'
        ]);

        $new = new MemberApplication();
        $new->name = $validated['nome'];
        $new->phone = $validated['telefone'];
        $new->email = $validated['email'];
        $new->document_type_id = $validated['document_type'];
        $new->document = $validated['documento'];
        $new->save();

        return redirect()->back()->withCookie(cookie('member_application_submitted', true, 10080));
    }
}
