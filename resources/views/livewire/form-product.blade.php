<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-form-input type="text" title="nama product" model="data.title"/>
        <x-form-input type="text" title="satuan product" model="data.piece"/>
        <x-form-input type="number" title="harga product" model="data.price"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
