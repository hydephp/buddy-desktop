<x-app-layout>
    <x-slot name="title">
        Welcome to {{ config('app.name') }}
    </x-slot>
    
    <header class="px-4 py-4 my-5 text-center">
        <h1 class="display-5 fw-bold">Welcome to {{ config('app.name') }}!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                Bridging the gap between flatfile content managment and a traditional CMS.
            </p>
        </div>
    </header>

    <section>
        <livewire:hyde-manager />
    </section>
</x-app-layout>