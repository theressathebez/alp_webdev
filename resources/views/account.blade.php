<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <div class="flex ">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-white text-[#1E1E1E] p-5 rounded-md shadow-md border-2"
            style="border-image: linear-gradient(to right, #40C9FF, #FF88DC, #FFB64D) 1;">
            <h2 class="text-xl font-bold mb-5">My Account</h2>
            <nav class="space-y-4 ">
                <button onclick="showContent('dashboard')"
                    class="block px-4 py-2 rounded-md hover:bg-blue-100 w-full text-left">
                    Dashboard
                </button>
                <button onclick="showContent('team')"
                    class="block px-4 py-2 rounded-md hover:bg-blue-100 w-full text-left">
                    Team
                </button>
                <button onclick="showContent('registration')"
                    class="block px-4 py-2 rounded-md hover:bg-blue-100 w-full text-left">
                    Registration
                </button>
            </nav>

            <div class="flex justify-center mt-10">
                <form method="POST" action="{{ route('leader.logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white p-2 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-5">
            <div id="dashboard" class="content-section">
                <h1 class="text-2xl font-bold mb-5">Welcome to the Dashboard</h1>
                <div class="bg-white p-5 rounded-lg shadow-md text-start">
                    <p><strong>Team ID:</strong> {{ $team->id }}</p>
                    <p><strong>Team Name:</strong> {{ $team->team_name }}</p>
                    <p><strong>Institution Name:</strong> {{ $institution->institution_name }}</p>
                    <p><strong>Leader Name:</strong> {{ $leader->leader_name }}</p>

                </div>
            </div>

            <div id="team" class="content-section hidden">
                <h1 class="text-2xl font-bold mb-5">Team</h1>
                <div class="space-y-4 bg-white p-5 rounded-lg shadow-md text-start">
                    <p><strong>Team ID:</strong> {{ $team->id }}</p>
                    <p><strong>Team Name:</strong> {{ $team->team_name }}</p>


                    <h2 class="font-semibold mt-5">Members:</h2>

                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Date of Birth</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Phone</th>
                                <th class="px-4 py-2 border">Activity</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="px-4 py-2 border">{{ $leader->leader_name }}</td>
                                <td class="px-4 py-2 border">{{ $leader->leader_dob }}</td>
                                <td class="px-4 py-2 border">{{ $leader->leader_email }}</td>
                                <td class="px-4 py-2 border">{{ $leader->leader_phone }}</td>

                                <td class="px-4 py-2 border">
                                    <a href="{{ route('leader.edit', ['leader' => $leader->id]) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        <img src="{{ asset('images/edit.png') }}" alt="Edit"
                                            class="h-6 w-6 inline-block">
                                    </a>
                                </td>

                            </tr>
                            @if ($participants->isEmpty())
                                <p>No participants found for this team.</p>
                            @else
                                @foreach ($participants as $participant)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $participant->participant_name }}</td>
                                        <td class="px-4 py-2 border">{{ $participant->participant_dob }}</td>
                                        <td class="px-4 py-2 border">{{ $participant->participant_email }}</td>
                                        <td class="px-4 py-2 border">{{ $participant->participant_phone }}</td>
                                        <td class="px-4 py-2 border">
                                            <a href="{{ route('participant.edit', ['participant' => $participant->id]) }}"
                                                class="text-blue-500 hover:text-blue-700">
                                                <img src="{{ asset('images/edit.png') }}" alt="Edit"
                                                    class="h-6 w-6 inline-block">
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="mt-10">
                        <a href="{{ route('participant.create', ['leader_id' => $leader->id, 'team_id' => $leader->team_id]) }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">
                            + Add Participant
                        </a>
                    </div>


                </div>
            </div>

            <div id="registration" class="content-section hidden">
                <h1 class="text-2xl font-bold mb-5">Registration</h1>
                <div class="bg-white p-5 rounded-lg shadow-md text-start">
                    @if ($registrations->isEmpty())
                        <h2 class="font-semibold mb-5">Do the registration in here!!!</h2>
                        <a href="{{ route('registration.create', ['leader_id' => $leader->id, 'team_id' => $leader->team_id]) }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Registration here
                        </a>
                    @else
                        @foreach ($registrations as $registration)
                            <p><strong>Registration Date:</strong> {{ $registration->registration_date }}</p>
                            <p><strong>Category Name:</strong> {{ $registration->category->category_name }}</p>
                            <p><strong>Competition Name:</strong>
                                {{ $registration->category->competition->competition_name }}
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>
        </main>
    </div>

    <script>
        function showContent(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });
            // Show the selected section
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>

</x-layout>
