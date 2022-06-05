<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Api\Actions\StartHydeServer;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ActionToolbar extends Component
{
    public bool $serverActive = false;

    protected $listeners = ['serverStatus'];

    public function render()
    {
        return view('livewire.action-toolbar');
    }

    public function ping()
    {
        $this->serverActive = false;
        try {
            $response = Http::timeout(3)->get('http://localhost:8080/');
        } catch (\Illuminate\Http\Client\ConnectionException $exception) {
            return;
        }
        
        if ($response->status() === 200) {
            $this->serverActive = true;
        }
    }

    public function serverStatus($status)
    {
        $this->serverActive = $status === 200;
    }

    public function startServer()
    {   
        // Verify no processes are running on the 8080 port

        // Start the server
        (new StartHydeServer())->__invoke();

        // Verify that the server is running

        $this->serverActive = true;
        $this->emit('serverStatus', 200);
    }
}
