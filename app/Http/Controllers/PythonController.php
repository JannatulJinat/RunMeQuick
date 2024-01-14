<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class PythonController extends Controller
{
    public function create() : View {
        $formAction = route('execute-python');
        return view('execution.pythonCode', compact('formAction'));
    }

    public function execute(Request $request)
    {
        $file_path = 'tmp/' . uniqid() . '.py';
        $full_path = Storage::path($file_path);
        ($request->input) ? Storage::put($file_path, $request->input) : Storage::put($file_path, '');
        $result = new Process([env('PYTHON_PATH'), $full_path]);
        $result->run();
        $output = $result->isSuccessful() ? $result->getOutput() : $result->getErrorOutput();
        Storage::delete($file_path);
        return view('execution.pythonCode',[
            'formAction' => route('execute-python'),
            'input' => $request->input,
            'output' => $output,
        ]);
    }

}
