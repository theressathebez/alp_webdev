<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <form action="{{ route('participant.store') }}" method="POST">
        @csrf
        {{-- untuk handle fk fk  --}}
        <input type="hidden" name="leader_id" value="{{ $leader_id }}">
        <input type="hidden" name="team_id" value="{{ $team_id }}">

        {{-- Name --}}
        <div class="mb-4">
            <label for="participant_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="participant_name" id="participant_name" value="{{ old('participant_name') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_name') border-red-500 @enderror">
            @error('participant_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Date of Birth --}}
        <div class="mb-4">
            <label for="participant_dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth</label>
            <input type="date" name="participant_dob" id="participant_dob" value="{{ old('participant_dob') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_dob') border-red-500 @enderror">
            @error('participant_dob')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Location --}}
        <div class="mb-4">
            <label for="participant_location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
            <input type="text" name="participant_location" id="participant_location" value="{{ old('participant_location') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_location') border-red-500 @enderror">
            @error('participant_location')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="participant_email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" name="participant_email" id="participant_email" value="{{ old('participant_email') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_email') border-red-500 @enderror">
            @error('participant_email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Phone --}}
        <div class="mb-4">
            <label for="participant_phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
            <input type="text" name="participant_phone" id="participant_phone" value="{{ old('participant_phone') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_phone') border-red-500 @enderror">
            @error('participant_phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit
        </button>
    </form>
</x-layout>
