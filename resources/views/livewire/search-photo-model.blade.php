<div>
    <x-search-photo wire:search-photo="show">
        <div class="p-6">
            <form wire:submit.prevent="searchKeyword">
				<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
					<div class="">
						<div class="mb-4">
							<label for="keyword" class="block text-gray-700 text-sm font-bold mb-2">Keyword</label>
                            
							<input type="text"
								class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
								id="keyword" placeholder="Enter Keyword" wire:model="keyword">
							@error('keyword') <span class="text-red-500">{{ $message }}</span>@enderror
                            <label for="content_type" class="block text-gray-700 text-sm font-bold mb-2">content_type</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="content_type" id="content_type" wire:model="content_type">
                            <small>Filter by general content type. Multiple can be provided as a comma separated list. Possible values include photos, illustrations, vectors, and all. Defaults to all.</small>
                            <label for="orientation" class="block text-gray-700 text-sm font-bold mb-2">orientation</label>
                            <input type="text" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="orientation" id="orientation" wire:model="orientation">
                            <small>Filter by image orientation. Possible values include portrait, square, landscape, and all. Defaults to all.</small>
                            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">color</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="color" id="color" wire:model="color">
                            <label for="categories" class="block text-gray-700 text-sm font-bold mb-2">Categories</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="categories" id="categories" wire:model="categories">
                            <label for="page" class="block text-gray-700 text-sm font-bold mb-2">Page</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="page" id="page" wire:model="page">
                            <label for="results_per_page" class="block text-gray-700 text-sm font-bold mb-2">Results Per Page</label>
                            <input type="number" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="results_per_page" id="results_per_page" wire:model="results_per_page">
                            <label for="sort_by" class="block text-gray-700 text-sm font-bold mb-2">Sort By</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="sort_by" id="sort_by" wire:model="sort_by">
                            <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">Sort Order</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="sort_order" id="sort_order" wire:model="sort_order">
                            <label for="required_keywords" class="block text-gray-700 text-sm font-bold mb-2">Required Keywords</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="required_keywords" id="required_keywords" wire:model="required_keywords">
                            <label for="filtered_keywords" class="block text-gray-700 text-sm font-bold mb-2">Filtered keywords</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="filtered_keywords" id="filtered_keywords" wire:model="filtered_keywords">
                            <label for="source_language" class="block text-gray-700 text-sm font-bold mb-2">Source Language</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="source_language" id="source_language" wire:model="source_language">
                            <label for="contributor_id" class="block text-gray-700 text-sm font-bold mb-2">Contributor Id</label>
                            <input type="number" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="contributor_id" id="contributor_id" wire:model="contributor_id">
                            <label for="library_ids" class="block text-gray-700 text-sm font-bold mb-2">Library Ids</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="library_ids" id="library_ids" wire:model="library_ids">
                            <label for="exclude_library_ids" class="block text-gray-700 text-sm font-bold mb-2">Exclude Library Ids</label>
                            <input type="text" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="exclude_library_ids" id="exclude_library_ids" wire:model="exclude_library_ids">

                            <input type="checkbox" name="translate" id="translate" wire:model="translate" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="translate">Translate</label>
                            <input type="checkbox" class="default" name="safe_search" id="safe_search" wire:model="safe_search" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="safe_search">Safe Search</label>
                            <input type="checkbox" class="default" name="has_transparency" id="has_transparency" wire:model="has_transparency" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="has_transparency">Has Transparency</label>
                            <input type="checkbox" class="default" name="has_talent_released" id="has_talent_released" wire:model="has_talent_released" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="has_talent_released">Has Talent Released</label>
                            <input type="checkbox" class="default" name="has_property_released" id="has_property_released" wire:model="has_property_released" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="has_property_released">Has Property Released</label>
                            <input type="checkbox" class="default" name="is_editorial" id="is_editorial" wire:model="is_editorial" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="is_editorial">Is Editorial</label>
                            <input type="checkbox" class="default" name="content_scores" id="content_scores" wire:model="content_scores" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                            <label class="form-check-label inline-block text-gray-800" for="content_scores">Content Scores</label>
						</div>
					</div>
				</div>

				<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
					<span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
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
        @if ($photosArr)
            
        <span class="text-green-600">Photos are saved in DB for Admin review</span>
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
