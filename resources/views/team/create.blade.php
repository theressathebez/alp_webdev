<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <form action="{{ route('team.store') }}" method="POST">
        @csrf
        {{-- Name --}}
        <div class="mb-4">
            <label for="team_name" class="block text-gray-700 text-sm font-bold mb-2">Team Name</label>
            <input type="text" name="team_name" id="team_name" value="{{ old('team_name') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('team_name') border-red-500 @enderror">
            @error('team_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Institution --}}
        <label for="institution">Choose an Institution:</label>
        <select name="institution_id" id="institution" required>
            <option value="" disabled selected>Select an Institution</option>
            @foreach ($institutions as $institution)
                <option value="{{ $institution->id }}" {{ old('institution_id') == $institution->id ? 'selected' : '' }}>
                    {{ $institution->institution_name }}
                </option>
            @endforeach
        </select>

        @error('institution_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        {{-- Submit Button --}}
        <button type="submit"
            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
</x-layout>
