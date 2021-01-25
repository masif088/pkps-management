<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Distribusi Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Distribusi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.distribution.index') }}">Buat Distribusi Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-distribution action="create"/>
    </div>
</x-app-layout>
