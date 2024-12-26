<x-layout>
    <x-slot:layoutTitle>Register</x-slot:layoutTitle>

    <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-sky-100 to-white">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-700">Create an Account</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf <!-- Laravel's CSRF protection token -->

                <!-- Full Name -->
                <div>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                        placeholder="Enter your full name" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                        placeholder="Enter your email" required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                        placeholder="Create a password" required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div>
                    <input type="date" id="dob" name="dob" value="{{ old('dob') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                        required>
                    @error('dob')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <input type="text" id="participant_location" name="participant_location"
                        value="{{ old('participant_location') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                        placeholder="Enter your location" required>
                    @error('participant_location')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300 focus:outline-none">
                        Register
                    </button>
                </div>


            </form>

            <!-- Login Link -->
            <p class="text-sm text-center text-gray-500">
                Already have an account?
                <a href="" class="text-blue-500 hover:underline">Log in</a>
            </p>
        </div>
    </div>
</x-layout>
