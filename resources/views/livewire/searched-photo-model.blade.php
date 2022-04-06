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
    </x-search-photo>
</div>
