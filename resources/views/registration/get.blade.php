<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <div>
        @if (count($stages) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 items-center">
                @foreach ($stages as $stage)
                    <div class="p-5 rounded-lg shadow-md text-center transition-transform transform hover:scale-105">
                        <!-- Display Stage Name -->
                        <h1 class="text-xl font-bold text-gray-700 mb-4">
                            {{ $stage->stage_name }}
                        </h1>

                        <!-- Display Stage Details -->
                        <p class="text-sm text-gray-600">
                            <strong>Start:</strong> {{ $stage->stage_start }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>End:</strong> {{ $stage->stage_end }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>Category ID:</strong> {{ $stage->category_id }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Message if no stages exist -->
            <p class="text-center text-gray-500">No stages available for this category.</p>
        @endif
    </div>
</x-layout>
