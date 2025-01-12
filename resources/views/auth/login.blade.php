<x-layout>
    <x-slot:layoutTitle>Leader Login</x-slot:layoutTitle>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <form action="{{ route('leader.login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="leader_email" class="block text-sm font-bold mb-2">Leader Email</label>
            <input type="email" name="leader_email" required 
                class="w-full p-2 border rounded @error('leader_email') border-red-500 @enderror">
            @error('leader_email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="leader_password" class="block text-sm font-bold mb-2">Leader Password</label>
            <input type="password" name="leader_password" required 
                class="w-full p-2 border rounded @error('leader_password') border-red-500 @enderror">
            @error('leader_password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
            class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">
            Login
        </button>
    </form>
</x-layout>
