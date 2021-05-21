    <div class="dark:text-white">
        <label class="label" for="title"> Title
            <input class="dark:bg-gray-700" type="text" name="title" placeholder="Title"
                   value="{{$project->title}}">
        </label>
    </div>
    <div class="dark:text-white">
        <label class="label" for="title"> Description
            <textarea
                class="dark:bg-gray-700"
                name="description"
                placeholder="Describe your Project">
                        {{ $project->description }}
                    </textarea>
        </label>
    </div>
    <div>
        <button type="submit" class="bg-indigo-400 inline-block text-white px-4 py-1 rounded-lg shadow-md">
            {{ $button }}
        </button>
        <a href="/projects" class="inline-block text-white bg-red-400 px-4 py-1 rounded-lg shadow-md">
            Back
        </a>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ $error }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20"><title>Close</title><path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
            </div>
        @endforeach
        @endif
</form>
