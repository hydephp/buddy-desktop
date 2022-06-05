<?php

namespace App\Core\Concerns;

use App\Core\BuddyFacade;

trait InteractsWithProject
{
    /**
     * Get the current project path.
     */
    public function getPath(): string
    {
        return BuddyFacade::hyde()->getPath();
    }

    /**
     * Run a command in the project's HydeCLI and return the output.
     */
    public function artisan(string $command): string
    {
        return shell_exec('cd '.$this->getPath().' && php hyde ' . $command);
    }

    /**
     * Run a command in the project's HydeCLI and stream the output.
     */
    public function passthru(string $command): void
    {
        passthru('cd '.$this->getPath().' && php hyde ' . $command);
    }
}
