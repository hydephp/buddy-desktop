<?php

namespace App\Http\Controllers;

use App\Core\Contracts\Buddy;

class DebugController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Buddy $buddy)
    {
        echo '<h1>Printing Debug Information</h1>';
        echo '<h2>Active Buddy Service:</h2>';
        dump($buddy);
        echo '<h2>Hyde Installation:</h2>';
        dump($buddy->hyde());
    }
}
