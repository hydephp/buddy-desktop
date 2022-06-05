<?php

namespace App\Http\Controllers\Api\Actions;

use App\Core\Concerns\InteractsWithProject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompileStaticSite extends Controller
{
    use InteractsWithProject;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // @todo add lock to prevent multiple requests
        $time_start = microtime(true);
        ob_end_clean();
        echo '<title>Compiling static site</title>';
        echo '<pre style="white-space:pre-line;">';
        echo '<h1>Compiling static site</h1>';
        echo '<h2>Initiating build loop</h2>';
        echo '<h3 style="color:red;">This may take a while... Feed might seem unresponsive. Do not reload or close this window.</h3>';
        echo '<h4>Your application terminal may contain extra debug output.</h4>';
        $this->passthru('build --no-api'); // @todo allow toggling of api calls

        echo "\n<h2>Done. Finished in " . round((microtime(true) - $time_start) * 1000, 2). "ms</h2>";
        echo '<h3 style="color:green;">It is now safe to close this window.</h3><button onclick=window.close();>Close Window</button>';
    }
}
