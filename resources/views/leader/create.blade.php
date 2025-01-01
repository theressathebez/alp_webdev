<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <form action="{{ route('leader.store') }}" method="POST">
        @csrf
        <input type="hidden" name="team_id" value="{{ $team_id }}">

        {{-- Leader Name --}}
        <div class="mb-4">
            <label for="leader_name" class="block text-gray-700 text-sm font-bold mb-2">Leader Name</label>
            <input type="text" name="leader_name" id="leader_name" value="{{ old('leader_name') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_name') border-red-500 @enderror">
            @error('leader_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Leader Date of Birth --}}
        <div class="mb-4">
            <label for="leader_dob" class="block text-gray-700 text-sm font-bold mb-2">Leader Date of Birth</label>
            <input type="date" name="leader_dob" id="leader_dob" value="{{ old('leader_dob') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_dob') border-red-500 @enderror">
            @error('leader_dob')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Leader Location --}}
        <div class="mb-4">
            <label for="leader_location" class="block text-gray-700 text-sm font-bold mb-2">Leader Location</label>
            <input type="text" name="leader_location" id="leader_location" value="{{ old('leader_location') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_location') border-red-500 @enderror">
            @error('leader_location')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Leader Email --}}
        <div class="mb-4">
            <label for="leader_email" class="block text-gray-700 text-sm font-bold mb-2">Leader Email</label>
            <input type="email" name="leader_email" id="leader_email" value="{{ old('leader_email') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_email') border-red-500 @enderror">
            @error('leader_email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Leader Phone --}}
        <div class="mb-4">
            <label for="leader_phone" class="block text-gray-700 text-sm font-bold mb-2">Leader Phone</label>
            <input type="text" name="leader_phone" id="leader_phone" value="{{ old('leader_phone') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_phone') border-red-500 @enderror">
            @error('leader_phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Leader Password --}}
        <div class="mb-4">
            <label for="leader_password" class="block text-gray-700 text-sm font-bold mb-2">Leader Password</label>
            <input type="password" name="leader_password" id="leader_password" value="{{ old('leader_password') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_password') border-red-500 @enderror">
            @error('leader_password')
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



{{-- Name --}}
        {{-- <div class="mb-4">
            <label for="participant_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="participant_name" id="participant_name" value="{{ old('participant_name') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('participant_name') border-red-500 @enderror">
            @error('participant_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div> --}}