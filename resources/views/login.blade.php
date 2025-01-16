<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <form action="{{ route('leader.login.post') }}" method="POST">
        @csrf

        {{-- Email --}}
        <div class="mb-4">
            <label for="leader_email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
            <input type="email" name="leader_email" id="leader_email" value="{{ old('leader_email') }}"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_email') border-red-500 @enderror">
            @error('leader_email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="leader_password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" name="leader_password" id="leader_password"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('leader_password') border-red-500 @enderror">
            @error('leader_password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Login
        </button>
    </form>
</x-layout>
