<?php

namespace App\Http\Livewire;

use App\Core\Contracts\Buddy;
use App\Core\Hyde;
use Livewire\Component;

class HydeManager extends Component
{
    // State
    public bool $needsInitialization = false;
    public int $formProgress = 1;
    
    // Input
    public string $path = '';
    public bool $terms = false;

    // Data
    public string $hydePath;

    public function mount(Buddy $buddy)
    {
        $this->needsInitialization = ! $buddy->hasHydeInstance();
    }

    public function findHydeProject()
    {
        $this->validate([
            'path' => 'required|string'
        ]);

        if (! Hyde::isThisAValidHydeProjectPath($this->path)) {
            $this->addError('path', 'Could not find a Hyde project here.');
            return;
        }

        $this->hydePath = realpath($this->path);
        $this->formProgress = 2;
    }

    public function setup(Buddy $buddy)
    {
        $this->formProgress = 3;

        if ($buddy->hasHydeInstance()) {
            throw new \Exception('Buddy already has a Hyde instance. Did you already finish setup in another tab?', 409);
        }

        $buddy->constructHydeInstance();
        $buddy->getHydeInstance()->setPath($this->hydePath);
        $buddy->persist();
    }

    public function killHyde(Buddy $buddy)
    {
        cache()->forget(Hyde::class);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.hyde-manager');
    }
}
