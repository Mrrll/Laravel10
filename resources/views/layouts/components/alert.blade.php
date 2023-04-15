@if (session('message'))
    <x-alert class="m-2" type="{{ session('message')['type'] }}">
        <x-slot name="title">
            {{ session('message')['title'] }}
        </x-slot>
        {{ session('message')['message'] }}
    </x-alert>
@endif
