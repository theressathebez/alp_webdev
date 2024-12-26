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
                <button onclick="showContent('logout')"
                    class="px-6 py-2 rounded-md bg-red-500 text-white hover:bg-red-600">
                    Logout
                </button>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-5">
            <div id="dashboard" class="content-section">
                <h1 class="text-2xl font-bold mb-5">Welcome to the Dashboard</h1>
                <div class="bg-white p-5 rounded-lg shadow-md text-start">
                    @if ($team)
                        <p><strong>Team ID:</strong> {{ $team->id }}</p>
                        <p><strong>Team Name:</strong> {{ $team->team_name }}</p>
                        <p><strong>Institution Name:</strong> {{ $institution->institution_name ?? 'N/A' }}</p>
                        <p><strong>Leader Name:</strong> {{ $leader ? $leader->leader_name : 'N/A' }}</p>
                    @else
                        <p>No team data available.</p>
                    @endif


                </div>
            </div>

            <div id="team" class="content-section hidden">
                <h1 class="text-2xl font-bold mb-5">Team</h1>
                <div class="space-y-4 bg-white p-5 rounded-lg shadow-md text-start">
                    @if ($team)
                        <p><strong>Team ID:</strong> {{ $team->id }}</p>
                        <p><strong>Team Name:</strong> {{ $team->team_name }}</p>

                        <h2 class="font-semibold mt-5">Participants:</h2>
                        @if ($participants->isEmpty())
                            <p>No participants in this team.</p>
                        @else
                            <table class="table-auto w-full border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 border">Participant Name</th>
                                        <th class="px-4 py-2 border">Date of Birth</th>
                                        <th class="px-4 py-2 border">Email</th>
                                        <th class="px-4 py-2 border">Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td class="px-4 py-2 border">{{ $participant->participant_name }}</td>
                                            <td class="px-4 py-2 border">{{ $participant->participant_dob }}</td>
                                            <td class="px-4 py-2 border">{{ $participant->participant_email }}</td>
                                            <td class="px-4 py-2 border">{{ $participant->participant_phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @else
                        <p>No team data available.</p>
                    @endif
                </div>
            </div>

            <div id="registration" class="content-section hidden">
                <h1 class="text-2xl font-bold mb-5">Registration</h1>
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <p class="text-gray-700">Here is the registration section.</p>
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
