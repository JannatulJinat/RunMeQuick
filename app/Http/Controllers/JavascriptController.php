<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class JavascriptController extends Controller
{
    public function create() : View {
        $formAction = route('execute-js');
        return view('execution.jsCode', compact('formAction'));
    }

    public function execute()
    {
        echo "js";
    }
}
