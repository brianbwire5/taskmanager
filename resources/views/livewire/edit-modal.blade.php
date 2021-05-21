<div>
  <x-modal wire:model="show">
      <form action="" method="POST">
          @csrf
          @method('PATCH')

          <div class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
              <p class="font-semibold text-gray-800"> Edit Project</p>
              <svg
                  x-on:click = "show = false"
                  class="w-6 h-6"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                  ></path>
              </svg>
          </div>
          <div class="flex flex-col px-6 py-5 bg-gray-50 space-y-2.5">
              <label for="description">Project Title</label>
              <input class="px-6 py-3 focus:outline-none border-gray-300 shadow-sm rounded-md"
                     value=""
                     type="text"
                     name="title"
                     placeholder="Title">

              <label for="description">Description</label>
              <textarea
                  type="text"
                  name=""
                  placeholder="Type description..."
                  class="p-5 mb-5 bg-white border border-gray-200 rounded shadow-sm h-36"
                  id=""
              ></textarea>
          </div>
          <div class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg">
              <button type="clear" class="font-semibold text-gray-600">Cancel</button>
              <button type="submit" class="px-4 py-2 text-white font-semibold bg-indigo-400 rounded">
                  Edit
              </button>
          </div>

      </form>
  </x-modal>
</div>
