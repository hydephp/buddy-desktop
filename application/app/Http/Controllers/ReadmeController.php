<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReadmeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        view()->share('title', 'README.md - ' . config('app.name'));
        return view('markdown', [
            'content' => $this->parseReadme(),
        ]);
    }

    /**
     * Parse the README.md file and compile it to HTML.
     */
    protected function parseReadme(): string
    {
        return Str::markdown(file_get_contents(base_path('README.md')));
    }
}
