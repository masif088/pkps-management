<div>
    <x-data-table :data="$data" :model="$products">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('piece')" role="button" href="#">
                        piece
                        @include('components.sort-icon', ['field' => 'piece'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('price')" role="button" href="#">
                    Price
                    @include('components.sort-icon', ['field' => 'price'])
                </a></th>
                <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                    Diubah terakhir
                    @include('components.sort-icon', ['field' => 'updated_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($products as $product)
                <tr x-data="window.__controller.dataTableController({{ $product->id }})">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->piece }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{request()->segment(2)}}/{{$product->id }}/edit" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
