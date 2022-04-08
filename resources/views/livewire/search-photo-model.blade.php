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
                            <label for="keyword" class="block text-gray-700 text-sm font-bold mb-2">Keyword</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="keyword" placeholder="Enter Keyword" wire:model="keyword">
                            @error('keyword') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="content_type" class="block text-gray-700 text-sm font-bold mb-2">Content
                                    type</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="content_type" id="content_type" wire:model="content_type">
                                    <option value="all" selected="selected">All</option>
                                    <option value="photos">Photos</option>
                                    <option value="illustrations">illustrations</option>
                                    <option value="vectors">Vectors</option>

                                </select>

                                <small class="block mt-1 text-xs text-gray-600">Filter by general content type. Multiple
                                    can be provided as a comma separated list. Possible values include photos,
                                    illustrations, vectors, and all. Defaults to all.</small>
                            </div>


                            <div>
                                <label for="orientation"
                                    class="block text-gray-700 text-sm font-bold mb-2">Orientation</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="orientation" id="orientation" wire:model="orientation">
                                    <option value="all" selected>All</option>
                                    <option value="portrait">portrait</option>
                                    <option value="square">Square</option>
                                    <option value="landscape">Landscape</option>

                                </select>
                                <small class="block mt-1 text-xs text-gray-600">Filter by image orientation. Possible
                                    values include portrait, square, landscape, and all. Defaults to all.</small>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="color" id="color" wire:model="color">
                                @error('color') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="categories"
                                    class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="categories" id="categories" wire:model="categories">
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
                                <label for="results_per_page" class="block text-gray-700 text-sm font-bold mb-2">Results
                                    Per Page</label>
                                <input type="number"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="results_per_page" id="results_per_page" wire:model="results_per_page">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="sort_by" class="block text-gray-700 text-sm font-bold mb-2">Sort By</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="sort_by" id="sort_by" wire:model="sort_by">
                                    <option value="most_relevant" selected>Most Relevant</option>
                                    <option value="most_downloaded">Most Downloaded</option>
                                    <option value="most_recent">Most Recent</option>
                                    <option value="trending_now">Trending Now</option>
                                    <option value="undiscovered">Undiscovered</option>

                                </select>

                            </div>
                            <div>
                                <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">Sort
                                    Order</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="sort_order" id="sort_order" wire:model="sort_order">
                                    <option value="ASC" selected>ASC</option>
                                    <option value="DESC">DESC</option>
                                </select>

                            </div>
                        </div>
                        {{-- <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="required_keywords"
                                    class="block text-gray-700 text-sm font-bold mb-2">Required Keywords</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="required_keywords" id="required_keywords" wire:model="required_keywords">
                            </div>
                            <div>
                                <label for="filtered_keywords"
                                    class="block text-gray-700 text-sm font-bold mb-2">Filtered keywords</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="filtered_keywords" id="filtered_keywords" wire:model="filtered_keywords">
                            </div>
                        </div> --}}
                        <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="source_language" class="block text-gray-700 text-sm font-bold mb-2">Source
                                    Language</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="source_language" id="source_language" wire:model="source_language">
                                    <option value="ISO" selected>ISO</option>

                                </select>

                            </div>
                            <div>
                                <label for="extended"
                                    class="block text-gray-700 text-sm font-bold mb-2">Extended</label>
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="extended" id="extended" wire:model="extended">
                                    <option value="download_formats" selected>download_formats</option>
                                    <option value="keywords">keywords</option>
                                    <option value="isSensitiveContent">isSensitiveContent</option>
                                    <option value="hasTalentReleased">hasTalentReleased</option>
                                    <option value="hasPropertyReleased">hasPropertyReleased</option>
                                    <option value="categories">categories</option>
                                    <option value="description">description</option>
                                    <option value="isEditorial">isEditorial</option>
                                    <option value="aspectRatio">aspectRatio</option>
                                    <option value="colors">colors</option>
                                </select>

                            </div>
                        </div>
                        {{-- <div class="grid grid-cols-2 gap-2 mb-2">
                            <div>
                                <label for="library_ids" class="block text-gray-700 text-sm font-bold mb-2">Library
                                    Ids</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="library_ids" id="library_ids" wire:model="library_ids">
                            </div>
                            <div>
                                <label for="exclude_library_ids"
                                    class="block text-gray-700 text-sm font-bold mb-2">Exclude Library Ids</label>
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="exclude_library_ids" id="exclude_library_ids"
                                    wire:model="exclude_library_ids">
                            </div>

                        </div> --}}

                        <input type="checkbox" name="translate" id="translate" wire:model="translate"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="translate">Translate</label>
                        <input type="checkbox" class="default" name="safe_search" id="safe_search"
                            wire:model="safe_search"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="safe_search">Safe Search</label>
                        <input type="checkbox" class="default" name="has_transparency" id="has_transparency"
                            wire:model="has_transparency"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="has_transparency">Has
                            Transparency</label>
                        <input type="checkbox" class="default" name="has_talent_released" id="has_talent_released"
                            wire:model="has_talent_released"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="has_talent_released">Has Talent
                            Released</label>
                        <input type="checkbox" class="default" name="has_property_released" id="has_property_released"
                            wire:model="has_property_released"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="has_property_released">Has
                            Property Released</label>
                        <input type="checkbox" class="default" name="is_editorial" id="is_editorial"
                            wire:model="is_editorial"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="is_editorial">Is
                            Editorial</label>
                        <input type="checkbox" class="default" name="content_scores" id="content_scores"
                            wire:model="content_scores"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                        <label class="form-check-label inline-block text-gray-800" for="content_scores">Content
                            Scores</label>
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
        @if (isset($photosArr['response']['results']) && !empty($photosArr['response']['results']))

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
                @foreach($photosArr['response']['results'] as $photos)
                <tr>
                    <td class="border px-4 py-2"></td>
                    <td class="border px-4 py-2">{{ $photos['id'] }}</td>
                    <td class="border px-4 py-2">{{ $photos['title'] }}</td>
                    <td class="border px-4 py-2"><img src="{{ $photos['thumbnail_url'] }}" width="100"></td>
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
    @this.set('results_per_page','20');
    
    //console.log('Hello');
});
</script>