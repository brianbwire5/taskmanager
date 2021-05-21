<x-app-layout>
    <div>
        <h1>Create a Project</h1>
    </div>

    <div class="container mt-6">
        <form class="space-y-4" action="/projects" method="POST">
            @csrf
            @include('projects.form',[
            'project' => new \App\Models\Project,
            'button' => 'Create Project'
        ])
    </div>

</x-app-layout>
