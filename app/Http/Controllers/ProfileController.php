<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function create()
    {
        $submissions = Auth::user()->submissions;
        foreach($submissions as $submission)
        {
            $inputFilePath = $submission->input;
            if(Storage::exists($inputFilePath))
            {
                $inputFileContent = Storage::get($inputFilePath);
                $submission->inputFileContent = $inputFileContent;
            }
        }
        return view('profile', compact('submissions'));
    }
}
