<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <form action="{{ route('registration.store') }}" method="POST">
        @csrf
        {{-- untuk handle fk fk  --}}
        <input type="hidden" name="team_id" value="{{ $team_id }}">

        {{-- Date Registration--}}
        <div class="mb-4"> 
            <label for="registration_date" class="block text-gray-700 text-sm font-bold mb-2">Registration_Date</label>
            <input type="date" name="registration_date" id="registration_date" value="{{ old('registration_date') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('registration_date') border-red-500 @enderror">
            @error('registration_date')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- category --}}
        <label for="category">Choose a category:</label>
        <select name="category_id" id="category" required>
            <option value="" disabled selected>Select an category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('institution_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>  
        @error('category_id')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror

        {{-- Submit Button --}}
        <button type="submit"
            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
</x-layout>
