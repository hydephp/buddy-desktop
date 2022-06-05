<div wire:init="ping" wire:poll.30s>
    <div wire:loading>
        Pinging...
    </div>
    <div wire:loading.attr="hidden">
        @if($loaded)
            @switch($status)
                @case(0)
                    <a href="javascript:void(null);" wire:click="ping" title="Click to refresh" class="text-secondary">
                        Server Offline
                    </a>    
                    <span class="text-secondary fw-bold" role="presentation">&bullet;</span>
                    @break
                @case(200)
                    <a href="javascript:void(null);" wire:click="ping" title="Click to refresh" class="fw-medium text-success">
                        Server Online
                    </a>
                    <span class="text-success fw-bold" role="presentation">&bullet;</span>
                    @break
                @default
                    
                Unexpected response {{ $status }}
            @endswitch
        @else
            Pinging...
        @endif
    </div>
</div>
