<div>
    <div class="card-header pb-0 p-3 d-flex align-items-center">
        <h6 class="mb-0">Quick Actions</h6>
        @if($serverActive)
        <span class="text-sm mt-1 ms-2">
            <span class="text-success status-bullet" role="presentation">•</span>
            Your site is live at <a href="http://localhost:8080">
                localhost:8080
            </a>
        </span>
        @endif
    </div>
    <div class="card-body p-3 pb-0">
        <menu role="toolbar" wire:poll.30s="ping" class="d-flex list-unstyled mt-0">
            <li>
                <button class="btn btn-primary py-1 px-3 me-2">Create new file</button>
            </li>
            <li>
                <button onclick="window.open('{{ route('api.actions.compile-static-site') }}', 'popup', 'width=800, height=760')" target="popup" class="btn btn-warning py-1 px-3 me-2">
                    Compile static site
                </a>
            </li>
            <li wire:init="ping">
                @if($serverActive)
                <a href="http://localhost:8080" target="_blank" class="btn btn-success py-1 px-3 me-2">
                    View site
                </a>
                @else
                <button wire:click="startServer" class="btn btn-success py-1 px-3 me-2" wire:loading.attr="disabled"></span>
                    <span wire:loading.remove>
                        Start Server
                    </span>
                    <span wire:loading>
                        Loading status...
                    </span>
                </button>
                @endif
            </li>
        </menu>
    </div>
</div>