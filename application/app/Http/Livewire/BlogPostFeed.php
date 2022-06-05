<?php

namespace App\Http\Livewire;

use Hyde\Framework\Hyde;
use Hyde\Framework\Models\MarkdownPost;
use Illuminate\Support\Collection;
use Livewire\Component;

class BlogPostFeed extends Component
{
    /**
     * @var Collection<MarkdownPost>
     */
    public Collection $posts;

    public function mount()
    {
        $this->posts = Hyde::getLatestPosts()->values();
    }

    public function render()
    {
        return view('livewire.blog-post-feed');
    }
}
