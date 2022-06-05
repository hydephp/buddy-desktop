<?php

namespace App\Http\Livewire;

use App\Core\Contracts\Buddy;
use Livewire\Component;

class ContentExplorer extends Component
{
    public string $postsDir;
    public string $pagesDir;
    public string $docsDir;

    public array $posts = [];
    public array $pages = [];
    public array $docs = [];

    public function mount(Buddy $buddy)
    {
        $this->postsDir = $buddy->hyde()->getPath() . '/_posts';
        $this->pagesDir = $buddy->hyde()->getPath() . '/_pages';
        $this->docsDir = $buddy->hyde()->getPath() . '/_docs';
    }

    public function load()
    {
        $this->pages = $this->getFiles($this->pagesDir);
        $this->posts = $this->getFiles($this->postsDir);
        $this->docs = $this->getFiles($this->docsDir);
    }

    public function getFiles(string $dir)
    {
        $files = [];

        if (is_dir($dir)) {
            $files = array_merge($files, glob($dir . '/*.md'));
        }
        
        return $files;
    }

    public function render()
    {
        return view('livewire.content-explorer');
    }
}
