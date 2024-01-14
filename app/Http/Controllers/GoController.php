<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class GoController extends Controller
{
    public function create() : View {
        $formAction = route('execute-go');
        return view('execution.goCode', compact('formAction'));
    }

    public function execute()
    {
        echo "go";
    }
}
