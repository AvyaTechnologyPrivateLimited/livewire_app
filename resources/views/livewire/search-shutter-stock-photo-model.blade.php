<div>
    <x-search-photo wire:search-photo="show">
        <div class="p-6" @if(!$showSearchBox) style="display: none;" @endif>
            @if (session()->has('message'))
                <div class="bg-grey-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm text-red-500">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <form wire:submit.prevent="searchKeyword">
                <div class="bg-white">
                    <div class="">

                        <div class="mb-2">
                            <label for="query" class="block text-gray-700 text-sm font-bold mb-2">Query</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="query" placeholder="Enter Query" wire:model="query">
                            @error('query') <span class="text-red-500">{{ $message }}</span>@enderror
                            <small>One or more search terms separated by spaces; you can use NOT to filter out images
                                that match a term </small>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="image_type" class="block text-gray-700 text-sm font-bold mb-2">Image
                                    Type</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="image_type" id="image_type" wire:model="image_type">
                                    <option value="photo" selected>photo</option>
                                    <option value="illustration">illustration</option>
                                    <option value="vector">vector</option>
                                </select>
                                <small>Show images of the specified type</small>
                            </div>
                            <div>
                                <label for="orientation"
                                    class="block text-gray-700 text-sm font-bold mb-2">Orientation</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="orientation" id="orientation" wire:model="orientation">
                                    <option value="horizontal" selected>horizontal</option>
                                    <option value="vertical">vertical</option>
                                </select>
                                <small class="block mt-1 text-xs text-gray-600">Show image results with horizontal or
                                    vertical orientation

                                </small>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="color" id="color" wire:model="color">
                                @error('color') <span class="text-red-500">{{ $message }}</span>@enderror
                                <small>Specify either a hexadecimal color in the format '4F21EA' or 'grayscale'; the API
                                    returns images that use similar colors</small>
                            </div>
                            <div>
                                <label for="category"
                                    class="block text-gray-700 text-sm font-bold mb-2">category</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="category" id="category" wire:model="category">
                                <small>Show images with the specified Shutterstock-defined category; specify a category
                                    name or ID</small>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="page" class="block text-gray-700 text-sm font-bold mb-2">Page</label>
                                <input type="number"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="page" id="page" wire:model="page">
                            </div>
                            <div>
                                <label for="per_page" class="block text-gray-700 text-sm font-bold mb-2">Per
                                    Page</label>
                                <input type="number"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="per_page" id="per_page" wire:model="per_page">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="sort" class="block text-gray-700 text-sm font-bold mb-2">Sort By</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="sort" id="sort" wire:model="sort">
                                    <option value="popular" selected>popular</option>
                                    <option value="newest">newest</option>
                                    <option value="relevance">relevance</option>
                                    <option value="random">random</option>

                                </select>

                            </div>
                            <div>
                                <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">View</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="view" id="view" wire:model="view">
                                    <option value="minimal" selected>minimal</option>
                                    <option value="full">full</option>
                                </select>

                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="language"
                                    class="block text-gray-700 text-sm font-bold mb-2">Language</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="language" id="language" wire:model="language">
                                    <option value="en" selected>EN</option>

                                </select>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                        <button x-on:click="show = false" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
        @if (isset($photosArr['response']['data']) && !empty($photosArr['response']['data']))

        <span class="text-green-600 py-2" style="float: left;">Photos are saved in DB for Admin review</span>
        <span class="text-green-600 py-2" style="float: right;" x-on:click="show = false">CLOSE</span>
        <div style="clear: both;"></div>
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">Select</th>
                    <th class="px-4 py-2">#ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Thumbnail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photosArr['response']['data'] as $photos)
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2">{{ $photos['id'] }}</td>
                    <td class="border px-4 py-2">{{ $photos['description'] }}</td>
                    <td class="border px-4 py-2"><img src="{{ $photos['assets']['small_thumb']['url'] }}" width="100">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </x-search-photo>
</div>
<script>
    document.addEventListener('livewire:load', function () {
    @this.set('page','1');
    @this.set('per_page','10');
    
    //console.log('Hello');
});
</script>