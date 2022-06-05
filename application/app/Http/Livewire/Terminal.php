<?php

namespace App\Http\Livewire;

use App\Core\Concerns\InteractsWithProject;
use Livewire\Component;

class Terminal extends Component
{
    use InteractsWithProject;

    public array $lines = [];
    public string $command = '';

    public function mount()
    {
        $this->lineOut('Booting the HydeCLI console...');
    }

    public function bootConsole()
    {
        $this->call('list --no-ansi');
    }

    public function sendCommand()
    {
        $this->call($this->command);
        $this->command = '';
    }

    protected function lineOut(string $line = '')
    {
        $this->lines[] = $line;
    }

    protected function call(string $command)
    {
        $output = $this->artisan($command);
        foreach (explode("\n", $output) as $line) {
            if (trim($line) !== '') {
                $this->lineOut($this->stripAnsi($line));
            }
        }
    }

    protected function stripAnsi(string $line)
    {
        return preg_replace('/\x1b\[\d+m/', '', $line);
    }

    public function render()
    {
        return view('livewire.terminal');
    }
}
