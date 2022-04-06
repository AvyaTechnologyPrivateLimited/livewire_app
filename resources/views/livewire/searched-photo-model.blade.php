<div>
    <x-search-photo wire:search-photo="show">
        
        @if ($photosArr)
            
        
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Thumbnail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photosArr as $photos)
                <tr>
                    <td class="border px-4 py-2">{{ $photos['id'] }}</td>
                    <td class="border px-4 py-2">{{ $photos['title'] }}</td>
                    <td class="border px-4 py-2"><img src="{{ $photos['thumbnail_url'] }}" width="100"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <button x-on:click="show = false" type="button"
            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Cancel
        </button>
    </x-search-photo>
</div>
