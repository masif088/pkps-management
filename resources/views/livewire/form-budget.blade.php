<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Judul')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="data.title"
                   required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Jenis')}}</label>
            <select id="type" class="form-control" wire:model.defer="data.status_transaction" required>
                <option value="">Silahkan pilih</option>
                <option value="0" {{ $data['status_transaction']=='0' ? 'selected="selected"' : '' }}>Pemasukan</option>
                <option value="1" {{ $data['status_transaction']=='1' ? 'selected="selected"' : '' }}>Pengeluaran</option>
            </select>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Jumlah Uang')}}</label>
            <input id="name" type="number" class="mt-1 block w-full form-control shadow-none" wire:model="data.money"
                   required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('pic internal')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="data.pic_internal"/>
        </div>
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('pic external')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="data.pic_external"/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="name">{{__('Time Transaction')}}</label>
            <input id="time" type="text" class="mt-1 block w-full form-control shadow-none datetimepicker" wire:model.defer="data.time_transaction"/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Note')}}</label>
            <textarea id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model="data.note">

            </textarea>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('File')}}</label>
            <input type="file" id="file" class="mt-1 block w-full form-control shadow-none" wire:model="photo"
            />
            <div wire:loading wire:target="photo">Uploading...</div>
            @if($photo)
                @if($photo->getClientOriginalExtension())
                    File .{{$photo->getClientOriginalExtension()}} anda berhasil terupload

                @endif
            @endif




        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
    <script>

        document.addEventListener('livewire:load', function () {



            $("#time").on("change.datetimepicker", () => {
                var data = document.getElementById('time').value;
            @this.set('data.time_transaction', data)
            })

            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.budget.index')}}"; //will redirect to your data page (an ex: data.html)
                }, 2000); //will call the function after 2 secs.
            })

        });
    </script>

</div>
