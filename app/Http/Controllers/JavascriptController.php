<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class JavascriptController extends Controller
{
    public function create() : View {
        $formAction = route('execute-js');
        return view('execution.jsCode', compact('formAction'));
    }

    public function execute(Request $request)
    {
        $file_path = 'tmp/' . uniqid() . '.js';
        $full_path = Storage::path($file_path);
        ($request->input) ? Storage::put($file_path, $request->input) : Storage::put($file_path, '');
        $result = new Process(['node', $full_path]);
        $result->run();
        $output = $result->isSuccessful() ? $result->getOutput() : $result->getErrorOutput();
        Storage::delete($file_path);
        return view('execution.jsCode',[
            'formAction' => route('execute-js'),
            'input' => $request->input,
            'output' => $output,
        ]);
    }

}
