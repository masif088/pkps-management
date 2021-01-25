<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-form-select :options="$optionUser" :selected="$data['user_id']" title="Kepada" model="data.user_id"/>
        <x-form-select :options="$optionStatus" :selected="$data['status']" title="Status" model="data.status"/>
        <x-form-textarea title="keterangan tambahan" model="data.note"/>
        <x-form-date title="Tanggal" model="data.created_at" type="datepicker"/>
{{--{{$data['created_at']}}--}}
        <x-form-select2 :options="$optionProduct" :selected="$product" title="list product" model="product"/>

        @if($product!=null)
            @foreach($listProduct as $p)
                @if(in_array(intval($p->id),array_map('intval',$product)))
                    <x-form-input type="number" title="{{$p->title.' - '.$p->piece}} (harga {{$p->price}}/pcs)"
                                  model="detailDistribution.{{$p->id}}"/>
                @endif
            @endforeach
        @endif
        @php
            $a=0;
            foreach ($this->product as $p) {
                if( isset($this->detailDistribution[$p])){
                    $a += $this->listProduct->find($p)->price * intval($this->detailDistribution[$p]);
                }
            }
        @endphp
        <h2>Total : {{$a}}</h2>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
