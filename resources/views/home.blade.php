<x-layout>
    <x-slot:layoutTitle>{{ $title }}</x-slot:layoutTitle>
    <x-slot:bgColor>bg-blue-500</x-slot:bgColor>
    <section class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Welcome to Our <?= $email ?> Page</h1>
        <h2 class="text-2xl mb-6">I'm <?= $myname ?></h2>
        <p class="mb-6">Explore our content and find out more about what we do. We’re glad to have you here!
        </p>
        <a href="#"
            class="inline-block bg-soft-blue-dark text-text-color font-bold py-2 px-4 rounded hover:bg-soft-blue">Learn
            More</a>
    </section>
</x-layout>
