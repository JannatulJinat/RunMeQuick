<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function create() : View {
        $formAction = route('execute-python');
        return view('execution.pythonCode', compact('formAction'));
    }

    public function execute()
    {
        echo "python";
    }
}
