<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    <div>
        @if ($groupedStages->count() > 0)
            <div class="flex flex-col justify-center items-center min-h-screen space-y-10">

                {{-- Daftar tombol kategori --}}
                <div class="space-x-3">
                    @foreach ($groupedStages as $categoryId => $stages)
                        <button
                            id="button-{{ $categoryId }}"
                            class="px-4 py-2 {{ $loop->first ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-800' }} text-sm rounded-3xl font-semibold transition-transform transform hover:scale-105 focus:outline-none"
                            onclick="toggleCategory({{ $categoryId }})">
                            {{ $stages->first()->category->category_name ?? 'N/A' }}
                        </button>
                    @endforeach
                </div>

                {{-- Daftar stage per kategori --}}
                @foreach ($groupedStages as $categoryId => $stages)
                    <div id="category-{{ $categoryId }}" class="{{ $loop->first ? '' : 'hidden' }} max-w-3xl space-y-5">
                        <h1
                            class="pb-5 text-base md:text-2xl font-bold text-transparent text-gray-800 text-center">
                            {{ $stages->first()->category->category_name ?? 'N/A' }}
                        </h1>

                        @foreach ($stages as $stage)
                            <div
                                class="p-10 rounded-lg shadow-md text-center transition-transform transform hover:scale-105">
                                <h2
                                    class="pb-5 text-lg md:text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-pink-500 to-orange-500">
                                    {{ $stage->stage_name }}
                                </h2>

                                {{-- Tabel hasil --}}
                                <table class="text-center w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-12 py-2 border-b border-gray-400">Ranking</th>
                                            <th class="px-12 py-2 border-b border-gray-400">Team</th>
                                            <th class="px-12 py-2 border-b border-gray-400">Institution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($stage->outputs as $output)
                                            @if ($output->result_id == 4)
                                                @continue
                                            @endif
                                            <tr>
                                                <td class="px-4 py-2 border-b border-gray-300">
                                                    {{ $output->result->result_name ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-2 border-b border-gray-300">
                                                    {{ $output->registration->team->team_name ?? 'N/A' }}
                                                </td>
                                                <td class="px-4 py-2 border-b border-gray-300">
                                                    {{ $output->registration->team->institution->institution_name ?? 'N/A' }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="px-4 py-2 text-gray-500">
                                                    No results available for this stage.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No categories available for the latest competition.</p>
        @endif
    </div>

    {{-- Script untuk toggle kategori --}}
    <script>
        function toggleCategory(categoryId) {
            // Sembunyikan semua kategori
            document.querySelectorAll('[id^="category-"]').forEach(element => {
                element.classList.add('hidden');
            });

            // Reset semua tombol ke abu-abu
            document.querySelectorAll('[id^="button-"]').forEach(button => {
                button.classList.remove('bg-blue-500', 'text-white');
                button.classList.add('bg-gray-300', 'text-gray-800');
            });

            // Tampilkan kategori yang dipilih
            const selectedCategory = document.getElementById(`category-${categoryId}`);
            if (selectedCategory) {
                selectedCategory.classList.remove('hidden');
            }

            // Ubah gaya tombol yang dipilih
            const selectedButton = document.getElementById(`button-${categoryId}`);
            if (selectedButton) {
                selectedButton.classList.remove('bg-gray-300', 'text-gray-800');
                selectedButton.classList.add('bg-blue-500', 'text-white');
            }
        }

        // Menetapkan kategori pertama sebagai default saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const firstCategory = document.querySelector('[id^="category-"]:not(.hidden)');
            const firstButton = document.querySelector('[id^="button-"]:not(.bg-gray-300)');
            if (!firstCategory) {
                document.getElementById('category-1').classList.remove('hidden'); // Ganti 1 dengan ID kategori pertama
            }
            if (!firstButton) {
                document.getElementById('button-1').classList.add('bg-blue-500', 'text-white'); // Ganti 1 dengan ID kategori pertama
            }
        });
    </script>
</x-layout>
