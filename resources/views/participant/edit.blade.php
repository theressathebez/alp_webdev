<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>
    <form action="{{ route('participant.update', $participant) }}" method="POST">
        @method('PUT')
        @csrf
        
        {{-- Name --}}
        <div class="mb-4">
            <label for="participant_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="participant_name" id="participant_name" value="{{ $participant->participant_name }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_name') border-red-500 @enderror">
            @error('participant_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Date of Birth --}}
        <div class="mb-4">
            <label for="participant_dob" class="block text-gray-700 text-sm font-bold mb-2">participant_dob</label>
            <input type="date" name="participant_dob" id="participant_dob" value="{{ $participant->participant_dob }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_dob') border-red-500 @enderror">
            @error('participant_dob')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Location --}}
        <div class="mb-4">
            <label for="participant_location" class="block text-gray-700 text-sm font-bold mb-2">participant_location</label>
            <input type="text" name="participant_location" id="participant_location" value="{{ $participant->participant_location }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_location') border-red-500 @enderror">
            @error('participant_location')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="participant_email" class="block text-gray-700 text-sm font-bold mb-2">participant_email</label>
            <input type="text" name="participant_email" id="participant_email" value="{{ $participant->participant_email }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_email') border-red-500 @enderror">
            @error('participant_email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Phone --}}
        <div class="mb-4">
            <label for="participant_phone" class="block text-gray-700 text-sm font-bold mb-2">participant_phone</label>
            <input type="text" name="participant_phone" id="participant_phone" value="{{ $participant->participant_phone }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_phone') border-red-500 @enderror">
            @error('participant_phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="participant_password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="text" name="participant_password" id="participant_password" value="{{ $participant->participant_password }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_password') border-red-500 @enderror">
            @error('participant_password')
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
