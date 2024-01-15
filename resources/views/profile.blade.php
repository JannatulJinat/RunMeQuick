@extends('layout.app', ['hide_header' => false, 'hide_footer' => false])
@section('content')
    <div class="p-10">
        <p class="mb-5">My Profile</p>
        <p class="mb-5">User Name: {{ auth()->user()->user_name }}</p>
        <p class="mb-5">Email: {{ auth()->user()->email }}</p>
        <a href="{{ route('php') }}"
            class="w-full bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-700 px-4 py-2">Start
            Coding</a>
        <div>
            <p class="text-xl mb-5 mt-5">Previous Executions:</p>
            <table class="border-separate border border-slate-400 w-full mb-10">
                <thead class="text-center">
                    <tr class="bg-gray-500 text-white">
                        <th class="py-2">Language</th>
                        <th class="py-2">Input</th>
                        <th class="py-2">Output</th>
                        <th class="py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($submissions as $submission)
                        <tr>
                            <td class="border border-slate-400 px-2 py-2">{{ $submission->language }}</td>
                            <td class="border border-slate-400 px-2 py-2">
                                <textarea disabled rows="5">{{ $submission->inputFileContent }}</textarea>
                            </td>
                            <td class="border border-slate-400 px-2 py-2">
                                <textarea disabled rows="5">{{ $submission->output }}</textarea>
                            </td>
                            <td class="border border-slate-400 px-2 py-2">{{ $submission->created_at }}</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border border-slate-400">------------------No records------------------</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
