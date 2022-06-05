<?php

namespace App\Core;

use App\Core\Concerns\InteractsWithProject;

/**
 * Contains information about the current Hyde project installation.
 */
class Hyde
{
    use InteractsWithProject;

    protected string $path = '';

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function hasPath(): bool
    {
        return ! empty($this->path);
    }

    public static function isThisAValidHydeProjectPath(string $path): bool
    {
        $path = realpath($path);

        return is_dir($path)
            && is_file($path . '/hyde')
            && is_file($path . '/config/hyde.php');
    }
}
