<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>
   
    <div class="">

         @if ($leader_email)
            <p>Logged in as: {{ $leader_email }}</p>
        @else
            <p>You are not logged in.</p>
        @endif
        <div class="flex flex-row justify-center items-center gap-x-4 mt-20">
            <img src="{{ asset('images/b2.png') }}" alt="blue wave" class="h-28 md:h-32 absolute top-12 left-1/2">
            <img src="{{ asset('images/y1.png') }}" alt="yellow plus" class="h-28 md:h-40 absolute top-20 left-0">

            <div class="text-right">
                <div
                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 font-bold text-3xl">
                    Digital Creative
                </div>
                <div
                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 font-bold text-3xl">
                    Student Challenge
                </div>
            </div>
            <div class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-orange-400 font-bold text-7xl">
                2025
            </div>
        </div>

        <h2 class="text-[#1E1E1E] font-semibold text-lg text-center mt-4">
            "{{ $competition->competition_name }}"
        </h2>

        <img src="{{ asset('images/b1.png') }}" alt="blue half circle" class="h-28 md:h-40 absolute top-100 left-10">
        <img src="{{ asset('images/double.png') }}" alt="double element" class="h-28 md:h-40 absolute top-70 right-0">

    </div>


    <div class="flex flex-col items-center mt-60">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">

        <h2 class="text-base text-[#1E1E1E] px-6 py-3 max-w-[800px] text-center">
            <strong>Digital Creative Student Challenge</strong> adalah kompetisi internasional tahunan yang
            diselenggarakan oleh Student Council Universitas Ciputra. Kompetisi ini menjadi wadah bagi mahasiswa di
            seluruh dunia untuk menunjukkan bakat dan kreativitas mereka dalam bidang desain, fotografi, dan
            videografi.
        </h2>
    </div>

    <img src="{{ asset('images/ky.png') }}" alt="double element" class="h-28 md:h-40 absolute top-70 right-0">

    <div class="flex flex-col items-center mt-48 mb-20">
        <h2 class="text-[#1E1E1E] text-2xl font-bold mb-4">Countdown</h2>
        <div class="border rounded-lg p-4 shadow-lg bg-white">
            <div class="flex items-center justify-center gap-x-6">
                <div class="text-center">
                    <div class="text-4xl text-[#1E1E1E] font-bold">{{ $countdown_days }}</div>
                    <div class="text-gray-500 text-sm">Days</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-[#1E1E1E] font-bold">{{ $countdown_hours }}</div>
                    <div class="text-gray-500 text-sm">Hours</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-[#1E1E1E] font-bold">{{ $countdown_minutes }}</div>
                    <div class="text-gray-500 text-sm">Mins</div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
