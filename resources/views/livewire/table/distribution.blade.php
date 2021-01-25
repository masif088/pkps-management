<div>
    <x-data-table :data="$data" :model="$distributions">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        Dikirim kepada
                        @include('components.sort-icon', ['field' => 'user_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('money')" role="button" href="#">
                        Jumlah transaksi
                        @include('components.sort-icon', ['field' => 'money'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                        Status
                        @include('components.sort-icon', ['field' => 'status'])
                    </a></th>
                <th>Detail</th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Tanggal Pengiriman
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($distributions as $distribution)
                <tr x-data="window.__controller.dataTableController({{ $distribution->id }})">
                    <td>{{ $distribution->id }}</td>
                    <td>{{ $distribution->user->name }}</td>
                    <td>{{ $distribution->money }}</td>
                    <td>{{ $distribution->status }}</td>
                    <td>

                            @foreach($distribution->detailDistributions as $dd)
                                <p>{{$dd->product->title.' - '.$dd->product->piece .' : '. $dd->amount}}</p>
                            @endforeach

                    </td>
                    <td>{{ $distribution->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{request()->segment(2)}}/{{$distribution->id }}/edit" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
