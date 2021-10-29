<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Page;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page)
            abort(500);

        return view('page', ['page' => $page]);
    }

    public function list()
    {

    }
}
