<?php

namespace App\Http\Livewire;

use App\Models\DetailDistribution;
use App\Models\Distribution;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormDistribution extends Component
{
    public $action;
    public $dataId;

    public $data;
    public $product;
    public $detailDistribution;

    public $optionUser;
    public $optionProduct;
    public $listProduct;
    public $optionStatus;

    public function getRules()
    {
        return [
            'data.user_id' => 'required|numeric',
            'data.status' => 'required',
        ];
    }

    public function mount()
    {
        $this->data['user_id'] = Auth::id();
        $this->data['status'] = 'menunggu';
        $this->data['money'] = 0;
        $this->data['created_at'] = date("Y/m/d H:m:s");
        $this->listProduct = Product::get();
        $this->product = [];
//         = eloquent_to_options(, 'id', ['title','piece']);
        $this->optionProduct = array();
        foreach ($this->listProduct as $index => $a) {
            $this->optionProduct[$index]['value'] = $a->id;
            $this->optionProduct[$index]['title'] = $a->title.' - '.$a->piece;
        }
//        return $arr;

        $this->optionUser = eloquent_to_options(User::get(), 'id', 'name');
        $this->optionStatus = [
            ['value' => 'menunggu', 'title' => 'menunggu'],
            ['value' => 'diterima', 'title' => 'diterima'],
            ['value' => 'ditolak', 'title' => 'ditolak'],
        ];
        if ($this->dataId!=null) {
            $dd = DetailDistribution::whereDistributionId($this->dataId);
            $this->product=$dd->pluck('product_id')->toArray();
            $data=$dd->pluck('amount')->toArray();
            for($i=0;$i<count($data);$i++){
                $this->detailDistribution[$this->product[$i]]=$data[$i];
            }
            $data=Distribution::find($this->dataId);
            $this->data=[
                'title'=>$data->title,
                'created_at'=>$data->created_at->format('Y-m-d'),
                'status'=>$data->status,
                'money'=>$data->money,
                'note'=>$data->note,
                'user_id'=>$data->user_id,
            ];
        }
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->data['money'] = 0;
        foreach ($this->product as $p) {
            $this->data['money'] += $this->listProduct->find($p)->price * intval($this->detailDistribution[$p]);
        }
        $d = Distribution::create($this->data);
        foreach ($this->product as $p) {
            DetailDistribution::create([
                'distribution_id' => $d->id,
                'product_id' => $p,
                'amount' => $this->detailDistribution[$p]
            ]);
        }

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menambahkan distribusi',
        ]);

        $this->emit('redirect', route('admin.distribution.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->data['money'] = 0;
        foreach ($this->product as $p) {
            $this->data['money'] += $this->listProduct->find($p)->price * intval($this->detailDistribution[$p]);
        }
        $d = Distribution::find($this->dataId)->update($this->data);
        DetailDistribution::whereDistributionId($this->dataId)->delete();
        foreach ($this->product as $p) {
            DetailDistribution::create([
                'distribution_id' => $this->dataId,
                'product_id' => $p,
                'amount' => $this->detailDistribution[$p]
            ]);
        }

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil mengubah distribusi',
        ]);

        $this->emit('redirect', route('admin.distribution.index'));
    }


    public function calculate()
    {
//        dd($this->product,"asd");
        $this->data['money'] = 0;
        foreach ($this->product as $p) {
            $this->data['money'] += $this->listProduct->find($p)->price * intval($this->detailDistribution[$p]);
        }
    }

    public function render()
    {
        return view('livewire.form-distribution');
    }
}
