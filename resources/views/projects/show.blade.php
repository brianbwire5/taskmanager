<x-app-layout>
    <header>
        <div class="flex items-center justify-between">
            <p class="font-normal text-sm text-gray-500">
                <a href="/projects">My Projects</a> / {{$project->title}}
            </p>
            <a href="{{route('create')}}"
               class="px-8 py-2 text-white text-sm bg-indigo-400 inline-block rounded-lg shadow-lg"> Add Project</a>
        </div>
    </header>

    <div class="flex my-3 -mx-3">
        <div class="w-3/4 px-3 space-y-4">
            <div class="space-y-3">
                <h3 class="text-base text-gray-500 mb-2"> Tasks </h3>
                @foreach($project->tasks as $task)
                        <div class="bg-white shadow-md px-4 py-3 rounded-lg">
                            <form action="{{ $task->path() }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="flex items-center justify-between space-x-3">
                                    <input class="w-full {{$task->completed ? 'text-gray-400' : ''}}" name="body" value="{{ $task->body }}">
                                    <input class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" name="completed" type="checkbox" onchange="this.form.submit()" {{ $task->completed ? "checked" : ''}}>
                                </div>

                            </form>
                        </div>
                @endforeach
                <div class="bg-white shadow-md px-4 py-3 rounded-lg">
                    <form action="{{$project->path() . '/tasks'}}" method="POST">
                        @csrf
                        <input class="w-full focus:ring-indigo-500 focus:border-indigo-500 rounded border-gray-300" type="text" name="body" placeholder="Add Tasks...">
                    </form>
                </div>
            </div>

            <div>
                <h3 class="text-base text-gray-500 mb-2">General Notes</h3>

                <form method="POST" action="{{ $project->path() }}">
                    @method('PATCH')
                    @csrf

<textarea name="notes" rows="6"
          class="shadow-md focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
          placeholder="Anything on the project ..."
>
    {{ $project->notes }}
</textarea>

                    <button class="bg-indigo-400 inline-block text-white px-4 py-1 rounded-lg shadow-md mt-2" type="submit">
                        Submit
                    </button>
                </form>

            </div>
        </div>

        <div class="w-1/4 px-3 ">
            @include('components.card')
            <div class="bg-white rounded-lg shadow-lg px-4 py-3 h-44 mt-3">
                <div class="font-semibold text-lg text-indigo-600 tracking-wide flex items-center">Activities</div>
                <ul>
                    @foreach($project->activity as $activity)
                            <li class="text-sm hover:text-indigo-500">
                                @include("projects.activity.{$activity->description}") ~
                                <span class="text-xs text-gray-500 font-light">
                                   {{ $activity->created_at->diffForHumans( null, true) }}
                                </span>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
