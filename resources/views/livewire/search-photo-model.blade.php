<div>
    <x-search-photo wire:search-photo="show">
        <div class="p-6">
            <form wire:submit.prevent="searchKeyword">
				<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
					<div class="">
						<div class="mb-4">
							<label for="keyword" class="block text-gray-700 text-sm font-bold mb-2">Keyword</label>
                            @php
                            // $taskArr = json_decode($task, true);
                            // echo $task_id = isset($taskArr['id']) ? $taskArr['id'] : '';
                            // echo "<input type='text' name='task_id' id='task_id' value='".$task_id."'  wire:model='task_id'>";
                            @endphp
                            
							<input type="text"
								class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
								id="keyword" placeholder="Enter Keyword" wire:model="keyword">
							@error('keyword') <span class="text-red-500">{{ $message }}</span>@enderror
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
							Cancel
						</button>
					</span>
                </div>
			</form>
        </div>
        @if ($photosArr)
            
        
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
