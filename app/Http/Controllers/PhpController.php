<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class PhpController extends Controller
{
    public function create() : View {
        $formAction = route('execute-php');
        return view('execution.phpCode', compact('formAction'));
    }

    public function execute(Request $request)
    {
        $file_path = 'tmp/' . uniqid() . '.php';
        $full_path = Storage::path($file_path);
        ($request->input) ? Storage::put($file_path, $request->input) : Storage::put($file_path, '');
        $result = new Process(['php', $full_path]);
        $result->run();
        $output = $result->isSuccessful() ? $result->getOutput() : $result->getErrorOutput();
        Storage::delete($file_path);
        return view('execution.phpCode',[
            'formAction' => route('execute-php'),
            'input' => $request->input,
            'output' => $output,
        ]);
    }
}
