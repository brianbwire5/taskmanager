<x-app-layout>
    <div>
        <h1>Create a Project</h1>
    </div>

<div class="container mt-6">
    <form class="space-y-4" action="/projects" method="POST">
        @csrf
        <div>
            <label class="label" for="title"> Title
                <input type="text" name="title" placeholder="Title">
            </label>
        </div>
       <div>
           <label class="label" for="title"> Description
               <textarea name="description" placeholder="Describe your Project"></textarea>
           </label>
       </div>
     <div>
         <button class="bg-indigo-400 inline-block text-white px-4 py-1 rounded-lg shadow-md" type="submit">
             Submit
         </button>
         <a href="/projects" class="inline-block text-white bg-red-400 px-4 py-1 rounded-lg shadow-md">
             Cancel
         </a>
     </div>
</form>
</div>

</x-app-layout>
