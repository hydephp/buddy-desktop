<div>
    <figure class="terminal">
        <table>
            <tbody>
                @foreach ($lines as $line)
                    <tr class="terminal-row">
                        <td>{{ $line }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </figure>

    <form wire:submit.prevent="sendCommand">
        <div class="input-group terminal-input">
            <span class="input-group-text opacity-8">php hyde</span>
            <input type="search" class="form-control px-2" id="command" wire:model.defer="command" placeholder="Enter a command" required  wire:loading.attr="disabled">
            <button type="submit" class="my-0 btn btn-dark" wire:loading.attr="disabled">Send</button>
        </div>
    </form>

    <style>
        .terminal {
            width: 100%;
            height: 100%;
            min-width: 400px;
            min-height: 300px;
            max-height: 600px;
            background-color: #292D3E;
            overflow-y: auto;
            padding: 8px 10px;
            color: white;
            font-family: 'Consolas', monospace;
        }   
        .terminal-row {
            white-space: pre;
        }
        .terminal-input span, .terminal-input input {
            font-family: 'Consolas', monospace;
        }
    </style>

    <div wire:init="bootConsole"></div>
</div>
