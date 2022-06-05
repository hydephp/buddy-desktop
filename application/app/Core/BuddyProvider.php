<?php

namespace App\Core;

use App\Core\Concerns\IsIdentifiable;
use App\Core\Contracts\Buddy;
use Illuminate\Support\Facades\Cache;

/**
 * Primary interface implementation for interacting with the Hyde Buddy.
 */
class BuddyProvider implements Buddy
{
    use IsIdentifiable;

    protected bool $initialized = false;
    protected Hyde $hyde;

	public function __construct()
	{
        $this->identify();
        $this->initialize();
	}

    // Assertion methods

    public function isInitialized(): bool
    {
        return $this->initialized;
    }

    public function hasHydeInstance(): bool
    {
        return isset($this->hyde);
    }

    // Initialization methods

    public function initialize(): void
    {
        $this->getPersisted();
        $this->initialized = true;
    }

    public function constructHydeInstance(): void
    {
        $this->hyde = new Hyde();
    }

    public function getPersisted(): void
    {
        $hyde = Cache::get(Hyde::class);
        if ($hyde !== null && $hyde->hasPath()) {
            $this->hyde = $hyde;
        }
    }

    public function persist(): void
    {
        Cache::store('file')->put(Hyde::class, $this->hyde);
    }

    // Accessor methods

    public function getInstance(): Buddy
    {
        return $this;
    }

    public function getHydeInstance(): Hyde
    {
        if (!$this->hasHydeInstance()) {
            $this->constructHydeInstance();
        }

        return $this->hyde;
    }

    public function hyde(): Hyde
    {
        return $this->getHydeInstance();
    }
}
