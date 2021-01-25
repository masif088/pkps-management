<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Distribution') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Distribution</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.distribution.index') }}">Data Distribution</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="distribution" :model="$distribution" />
    </div>
</x-app-layout>
