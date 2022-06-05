<?php

namespace App\Http\Controllers\Api\Actions;

use App\Http\Controllers\Controller;
use Hyde\Framework\Hyde;
use Illuminate\Http\Request;

class OpenFileInEditor extends Controller
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

        pclose( popen( (urldecode($request->get('path'))), 'r' ) );

		if ($request->has('close')) {
			echo '<script>window.close();</script>';
		}

        return redirect()->back();
    }
}
