<x-app-layout>
    <header>
        <div class="flex items-center justify-between">
            <h1 class="font-semibold text-lg text-gray-400 dark:text-white">My Tasks</h1>
            <button x-data="{}" x-on:click="window.livewire.emitTo('add-modal','show')"
                    class="px-8 py-2 text-white text-sm bg-indigo-400 inline-block rounded-lg shadow-lg"> Add Task</button>
        </div>
    </header>
    <div>
        <div class="flex flex-wrap -mx-3">
            @forelse($projects as $project)
                <div class="w-1/3 p-3">
                    @include('components.card')
                </div>
            @empty
                <div> No tasks Today 😮</div>
            @endforelse
        </div>

    </div>
    <livewire:add-modal/>
</x-app-layout>




