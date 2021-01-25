<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Product Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Product</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Buat Product Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-product action="create"/>
    </div>
</x-app-layout>
