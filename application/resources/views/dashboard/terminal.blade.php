<x-app-layout>
    <x-slot name="title">
        {{ config('app.name') }} Terminal
    </x-slot>
    
    <header class="px-4 py-4 mt-5 text-center">
        <h1 class="text-3xl font-bold">
            HydeCLI Terminal Preview
        </h1>
        
        <div class="alert alert-warning mt-3" role="alert">
            <strong>Warning!</strong> Do not run the serve command in this terminal as it will cause the PHP server to halt.
        </div>

        <p class=" text-gray-600">
			The Terminal Preview currently only proxies commands and returns the output.
			It does not work with interactive commands. You should also not run commands
            that do not stop automatically like the `serve` command, as the terminal runs
            in the same process as the application which will cause Buddy to freeze.
		</p>

    </header>

	<div class="col-12 mx-auto p-3 mb-5">
		<livewire:terminal />
	</div>
</x-app-layout>