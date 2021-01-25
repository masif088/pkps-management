<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class FormProduct extends Component
{
    public $action;
    public $dataId;

    public $data;

    public function getRules()
    {
        return [
            'data.title'=>'required',
            'data.price'=>'required|numeric'
        ];
    }

    public function mount()
    {
        if ($this->dataId!=null) {
            $data=Product::find($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'price'=>$data->price,
                'piece'=>$data->piece,

            ];
        }
    }


    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Product::create($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan product' ,
        ]);

        $this->emit('redirect',route('admin.product.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Product::find($this->dataId)->update($this->data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengedit product' ,
        ]);

        $this->emit('redirect',route('admin.product.index'));
    }


    public function render()
    {
        return view('livewire.form-product');
    }
}
