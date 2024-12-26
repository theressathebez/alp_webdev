<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>
    <div x-data="{ open: false, selectedCategory: null }">
        @if(count($categories) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($categories as $category)
                    <div class="p-5 bg-white rounded-lg shadow-md text-center transition-transform transform hover:scale-105">
                        <h2 class="text-xl font-semibold mb-3">{{ $category->category_name }}</h2>
                        <div>
                            <button 
                                @click="open = true; selectedCategory = { name: '{{ $category->category_name }}', description: '{{ $category->category_desc }}' }" 
                                class="mt-3 px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                Read More
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No categories available for the latest competition.</p>
        @endif

        <!-- Popup Modal -->
        <div 
            x-show="open" 
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" 
            x-cloak>
            <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-lg">
                <h3 class="text-2xl font-bold mb-4" x-text="selectedCategory?.name"></h3>
                <p class="text-m mb-3" x-text="selectedCategory?.description"></p>
                
                <button 
                    @click="open = false" 
                    class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                    Close
                </button>
            </div>
        </div>
    </div>
</x-layout>
