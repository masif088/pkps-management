<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Product') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Product</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Data Product</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="product" :model="$product" />
    </div>
</x-app-layout>
