<div class="bg-white rounded-lg shadow-lg px-4 py-3 h-44">
    <div class="flex items-center mt-3">
        <p class="-ml-4 border-l h-8 w-1 bg-indigo-400"></p>
        <h4 class="font-semibold text-sm ml-2 tracking-wide">
            <a href="{{ $project->path() }}"
               class="hover:text-indigo-400"
            >
                {{ $project->title}}
            </a>
        </h4>
    </div>

    <div class="mt-3 text-gray-400">
        {{ Str::limit($project->description,100)}}
    </div>
</div>
