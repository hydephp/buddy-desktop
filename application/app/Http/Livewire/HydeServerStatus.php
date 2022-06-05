<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HydeServerStatus extends Component
{
    public bool $loaded = false;
    public int $status = 0;

    protected $listeners = ['serverStatus'];

    public function ping()
    {
        $this->status = 0;
        try {
            $response = Http::timeout(3)->get('http://localhost:8080/');
        } catch (\Illuminate\Http\Client\ConnectionException $exception) {
            $this->loaded = true;
            $this->emit('serverStatus', 0);
            return;
        }
        $this->status = $response->status();
        $this->emit('serverStatus', $response->status());
        $this->loaded = true;
    }

    public function serverStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.hyde-server-status');
    }
}
