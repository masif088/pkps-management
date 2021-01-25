<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Keuangan Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Keuangan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.budget.index') }}">Buat Keuangan Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-budget action="create"/>
    </div>
</x-app-layout>
