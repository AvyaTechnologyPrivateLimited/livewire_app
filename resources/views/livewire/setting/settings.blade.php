<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Setting
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Select Photo Search
                                    Engine</label>
                                <div class="flex justify-center">
                                    <div>
                                        <div class="form-check">
                                            <input @if ($photo_search_api == 'StoryBlocks')
                                                @checked(true)
                                            @endif
                                            class="" type="radio"
                                            wire:model="photo_search_api" name="photo_search_api" id="photo_search_api1"
                                            value="StoryBlocks">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="photo_search_api1">
                                                StoryBlocks
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input @if ($photo_search_api == 'ShutterStock')
                                                @checked(true)
                                            @endif
                                            class="" type="radio"
                                            wire:model="photo_search_api" name="photo_search_api" id="photo_search_api2"
                                            value="ShutterStock">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="photo_search_api2">
                                                ShutterStock
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @error('photo_search_api') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>

                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="store()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                            <button wire:click="closeModal()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                            </button>
                        </span>
                </form>
            </div>
        </div>
    </div>
</div>