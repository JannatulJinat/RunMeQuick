<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class GoController extends Controller
{
    public function create() : View {
        $formAction = route('execute-go');
        return view('execution.goCode', compact('formAction'));
    }

    public function execute(Request $request)
    {
        $file_path = 'tmp/' . uniqid() . '.go';
        $full_path = Storage::path($file_path);
        ($request->input) ? Storage::put($file_path, $request->input) : Storage::put($file_path, '');
        $result = new Process([env('GO_PATH'),'run', $full_path], null, ['GOCACHE' => env('GOCACHE_PATH')]);
        $result->run();
        $output = $result->isSuccessful() ? $result->getOutput() : $result->getErrorOutput();
        Storage::delete($file_path);
        return view('execution.goCode',[
            'formAction' => route('execute-go'),
            'input' => $request->input,
            'output' => $output,
        ]);
    }

}
