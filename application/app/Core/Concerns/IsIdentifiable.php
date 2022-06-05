<?php

namespace App\Core\Concerns;

use Illuminate\Support\Str;

trait IsIdentifiable
{
    protected int $born;
    protected string $uuid;

    public function identify(): void
    {
        $this->born = time();
        $this->uuid = Str::uuid();
    }
}
