<?php

namespace App\Http\Livewire;

use App\Models\Budget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormBudget extends Component
{
    use WithFileUploads;

    public $data;
    public $dataId;
    public $action;
    public $photo;

    protected function getRules()
    {
        if ($this->action=="updatedBlog") {
            $rules = [
                'data.title' => 'required|max:128',
            ];
        }else{
            $rules = [
                'data.title' => 'required|max:128',
            ];
        }
        return $rules;
    }

    public function create()
    {
        $this->resetErrorBag();
        $this->validate();
        if ($this->photo!=null){
            $this->data['file'] = Auth::user()->name . ' - ' . Str::slug($this->data['title']) . ' - ' . date('m-d-Y') . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/pkps', $this->data['file']);
        }
        Budget::create($this->data);

        $this->emit('swal:alert', [
            'icon'  => 'success',
            'title' => 'Berhasil menambahkan Budget',
        ]);

        $this->emit('redirect');

    }


    public function update()
    {
        $this->resetErrorBag();
        $this->validate();

        if ($this->photo!=null){
            $this->data['file'] = Auth::user()->name . ' - ' . Str::slug($this->data['title']) . ' - ' . date('m-d-Y').'.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('public/pkps', $this->data['file']);
        }

        Budget::query()
            ->where('id', $this->dataId)
            ->update($this->data);

        $this->emit('swal:alert', [
            'icon'  => 'success',
            'title' => 'Berhasil Mengubah BUdget',
        ]);
        $this->emit('redirect');
    }

    public function mount()
    {
        $this->data['status_transaction']=0;
        $this->data['time_transaction']="";
        if ($this->dataId) {
            $data = Budget::find($this->dataId);

            $this->data = [
                "title" => $data->title,
                "pic_internal" => $data->pic_internal,
                "pic_external"=>$data->pic_external,
                "money" =>$data->money,
                "note" =>$data->note,
                "status_transaction" =>$data->status_transaction,
                "time_transaction" =>$data->time_transaction,
                "file"=>$data->file
            ];
        }
    }
    public function render()
    {
        return view('livewire.form-budget');
    }
}
