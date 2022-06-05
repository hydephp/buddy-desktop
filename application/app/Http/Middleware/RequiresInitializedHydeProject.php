<?php

namespace App\Http\Middleware;

use App\Core\Contracts\Buddy;
use Illuminate\Http\Request;
use Closure;

class RequiresInitializedHydeProject
{
    public function __construct(Buddy $buddy)
    {
        $this->buddy = $buddy;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $this->buddy->hasHydeInstance()) {
            return redirect(route('home'))->with([
                'errorBanner' => 'You must initialize a Hyde project before you can access this page.',
            ]);
        }

        return $next($request);
    }
}
