<x-app-layout>
    <div>
        <h1 class="dark:text-white">Edit a Project</h1>
    </div>

    <div class="container mt-6">
        <form class="space-y-4" action="{{ $project->path() }}" method="POST">
        @csrf
        @method('PATCH')

        @include('projects.form',[
        'button' => 'Edit Project'
])
    </div>

</x-app-layout>
