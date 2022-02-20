<div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg px-4 py-3 h-44 mt-3">
    <div class="font-semibold text-lg text-indigo-600 dark:text-white tracking-wide flex items-center mb-4">Tag a user
    </div>
    <form method="POST" action="{{ $project->path().'/invitations'}}">
        @csrf
        <input type="email" name="email"
               class="px-3 py-2 w-full border-gray-300 dark:bg-gray-700 dark:placeholder-white dark:text-white shadow-sm focus:outline-none rounded-lg focus:ring-2 focus:ring-indigo-400"
               placeholder="Email Address">
        <button class="bg-indigo-400 inline-block text-white px-4 py-1 rounded-lg shadow-md mt-2"
                type="submit">
            Invite
        </button>
    </form>
</div>
