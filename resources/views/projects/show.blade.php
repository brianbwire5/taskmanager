<x-app-layout>
    <header>
        <div class="flex items-center justify-between">
            <p class="font-normal text-sm text-gray-500 dark:text-white">
                <a href="/projects">My Projects</a> / {{$project->title}}
            </p>

            <div class="flex items-center space-x-2.5">
                @foreach($project->members as $member)
                    <img class="w-8 h-8 rounded-full border-2 border-indigo-300"
                         src="https://robohash.org/YOUR-TEXT.png" alt="{{$member->name}}'s avatar">
                @endforeach

                <button x-data="{}" x-on:click="window.livewire.emitTo('edit-modal','show')"
                    class="px-8 py-2 text-white text-sm bg-indigo-400 inline-block rounded-lg shadow-lg"> Edit Project</button>
            </div>

        </div>
    </header>

    <div class="flex my-3 -mx-3">
        <div class="w-3/4 px-3 space-y-4">
            <div class="space-y-3">
                <h3 class="text-base text-gray-500 mb-2 dark:text-white"> Tasks </h3>
                @foreach($project->tasks as $task)
                    <div class="bg-white dark:bg-gray-700 shadow-md px-4 py-3 rounded-lg">
                        <form action="{{ $task->path() }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="flex items-center justify-between space-x-3">
                                <input class=" dark:bg-gray-700 dark:text-white w-full {{$task->completed ? 'text-gray-400' : ''}}" name="body"
                                       value="{{ $task->body }}">
                                <input class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                       name="completed" type="checkbox"
                                       onchange="this.form.submit()" {{ $task->completed ? "checked" : ''}}>
                            </div>

                        </form>
                    </div>
                @endforeach
                <div class="bg-white dark:bg-gray-700 shadow-md px-4 py-3 rounded-lg">
                    <form action="{{$project->path() . '/tasks'}}" method="POST">
                        @csrf
                        <input class="w-full dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 rounded border-gray-300 dark:placeholder-white"
                               type="text" name="body"  placeholder="Add Tasks...">
                    </form>
                </div>
            </div>

            <div>
                <h3 class="text-base text-gray-500 mb-2 dark:text-white">General Notes</h3>

                <form method="POST" action="{{ $project->path() }}">
                    @method('PATCH')
                    @csrf

                    <textarea name="notes" rows="6"
                              class="dark:bg-gray-700 dark:text-white shadow-md focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                              placeholder="Anything on the project ...">
    {{ $project->notes }}
</textarea>

                    <button class="bg-indigo-400 inline-block text-white px-4 py-1 rounded-lg shadow-md mt-2"
                            type="submit">
                        Submit
                    </button>
                </form>

            </div>
            @include('components.errors')
        </div>

        <div class="w-1/4 px-3 mt-8">
            @include('components.card')
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg px-4 py-3 h-44 mt-3 overflow-y-auto">
                <div class="font-semibold text-lg text-indigo-600 dark:text-white tracking-wide flex items-center">Activities</div>
                <ul>
                    @foreach($project->activity as $activity)
                        <li class="text-sm hover:text-indigo-500 dark:text-white">
                            @include("projects.activity.{$activity->description}") ~
                            <span class="text-xs text-gray-500 dark:text-white font-light">
                                   {{ $activity->created_at->diffForHumans( null, true) }}
                                </span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @can('manage', $project)
                @include('projects.invite')
            @endcan

        </div>
    </div>
    <livewire:edit-modal/>
</x-app-layout>
