<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>

    @if (count($results) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 items-center">
            @foreach ($stages as $stage)
                <div class="p-5 rounded-lg shadow-md text-center transition-transform transform hover:scale-105">

                    <h1>
                        {{ $stage->stage_name }}
                    </h1>

                    {{-- table here --}}
                    <table class="text-center">
                        <tr>
                            <th class="px-12 py-2 border-b border-gray-400">Result name</th>
                            <th class="px-12 py-2 border-b border-gray-400">Team name</th>
                        </tr>
                        <tbody>
                            @forelse($stage->outputs as $output)
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-2 text-gray-500">
                                        No results available for this stage.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500">No categories available for the latest competition.</p>
    @endif



</x-layout>
