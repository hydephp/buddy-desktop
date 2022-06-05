<x-app-layout>
    <x-slot name="title">
        {{ config('app.name') }} Blog Posts
    </x-slot>
    
    <header class="px-4 py-4 mt-5 text-center">
        <h1 class="text-3xl font-bold">
            Manage Hyde Blog Posts
        </h1>

    </header>

	<div class="col-12 mx-auto p-3 mb-5">
        <livewire:blog-post-feed />
	</div>
</x-app-layout>