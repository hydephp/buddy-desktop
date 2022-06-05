<?php

namespace App\Http\Controllers;

use Hyde\Framework\Hyde;
use Hyde\Framework\MarkdownPostParser;
use Hyde\Framework\Models\MarkdownPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        return view('dashboard.post', [
            'post' => $this->parse($slug)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Parse a slug into a MarkdownPost object.
     * 
     * @param  string  $slug
     * @return \Hyde\Framework\Models\MarkdownPost
     */
    public function parse(string $slug): MarkdownPost
    {
        return (new MarkdownPostParser($slug))->get();
    }

    public function json(string $slug)
    {
        if (request()->has('pretty')) {
            return response(
                json_encode($this->parse($slug), 128),
                200, ['Content-Type' => 'application/json']
            );
        }

        return response()->json($this->parse($slug));
    }
    
    public function markdown(string $slug)
    {
        return response(
            file_get_contents(Hyde::path('_posts/' . $slug . '.md')),
            200, ['Content-Type' => 'text/markdown']
        ); 
    }

    public function html(string $slug)
    {
        $html = Str::markdown(
            YamlFrontMatter::markdownCompatibleParse(
                file_get_contents(Hyde::path('_posts/' . $slug . '.md'))
            )->body()
        );

        if (! request()->has('download')) {
            $html = '<!DOCTYPE html><html><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Post Preview</title><style>body{max-width: 800px;}</style></head><body>'
                . $html . '</body></html>';
        }

        return response(
            $html,
            200, ['Content-Type' => 'text/html']
        );
    }
}
