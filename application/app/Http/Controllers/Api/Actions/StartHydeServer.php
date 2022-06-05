<?php

namespace App\Http\Controllers\Api\Actions;

use App\Core\BuddyFacade;
use App\Http\Controllers\Controller;

class StartHydeServer extends Controller
{
    public function __invoke()
    {
        echo '<pre style="white-space:pre-line;">';

        if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') {
            dd('Currently only supported on Windows. Please send a PR to fix.');
        }

        $script = $this->getScript();
        echo 'Running script from path: ' . $script . "\n";

        pclose( popen( $script, 'r' ) );
    }

    protected function getScript(): string
    {
        $scriptPath = base_path('bin/gen/serve-' . sha1(BuddyFacade::hyde()->getPath()) . '.bat');
        
        if (!file_exists($scriptPath)) {
            $this->createScript($scriptPath);
        }

        return $scriptPath;
    }

    protected function createScript(string $scriptPath): void
    {
        echo 'Script for this Hyde project not found. Creating it now.', "\n\n";

        $script = file_get_contents(base_path('bin/stubs/serve-template.bat'));

        $script = str_replace('%%PROJECT_PATH%%', BuddyFacade::hyde()->getPath(), $script);

        file_put_contents($scriptPath, $script);

        echo 'Done. Here is the script:', "\n";
        echo '<blockquote>'.e($script).'</blockquote>';
        echo "\n";
    }
}
