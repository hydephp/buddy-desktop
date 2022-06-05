<x-app-layout>
    <x-slot name="title">
        {{ config('app.name') }} Dashboard
    </x-slot>
    
    <header class="px-4 py-4 mt-5 text-center">
        <h1 class="text-3xl font-bold">
            {{ config('app.name') }} Dashboard
        </h1>
        
        <p class="text-xl text-gray-600">
            Welcome to your dashboard. Here you can easily manage your Hyde project.
        </p>
    </header>
    
    <div class="col-12 container d-flex flex-wrap justify-content-center">
        <section class="col-12 m-4">
            <div class="card">
                <section>
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Hyde Installation Details</h6>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <livewire:hyde-installation-details />
                    </div>
                </section>
                <section>
                	<livewire:action-toolbar />
                </section>
            </div>
        </section>

        <section class="col-12 m-4">
            <div class="card">
                <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Content Explorer</h5>
                </div>
                <div class="card-body p-3">
                    <livewire:content-explorer />
                </div>
            </div>
        </section>
    </div>
    
</x-app-layout>