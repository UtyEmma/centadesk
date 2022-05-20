<x-guest-layout>
    <x-student-banner />

    <div class="container px-0">
        {{$slot}}
        <x-students.mentor-cta />
    </div>
</x-guest-layout>

