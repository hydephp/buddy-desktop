<?php

namespace App\Http\Controllers\Api\Actions;

use App\Http\Controllers\Controller;
use Hyde\Framework\Hyde;
use Illuminate\Http\Request;

class OpenFileInVSCode extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (! $request->has('path')) {
            return response()->json([
                'error' => 'Missing path parameter'
            ], 400);
        }

        exec('code ' . Hyde::path($request->get('path')));

        return redirect()->back();
    }
}
