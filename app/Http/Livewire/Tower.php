<?php

namespace App\Http\Livewire;

use App\TowerModel;
use Carbon\Carbon;
use Livewire\Component;

class Tower extends Component
{

    public $count;
    public $id;

    public $jumlah_lantai;
    public $di_huni;
    public $jumlah_Unit;


    public function AddForm()
    {
        $tower = new TowerModel;
        $tower->created_at = Carbon::now();
        $tower->report_id = $_COOKIE["id_fase"];
        $tower->save();
    }
    public function PostData($id)
    {
        $tower = TowerModel::find($id);
        $tower->Jumlah_lantai = $this->jumlah_lantai;
        $tower->Jumlah_unit = $this->jumlah_Unit;
        $tower->Jumlah_Yang_di_huni = $this->di_huni;
        $tower->save();
        $this->jumlah_lantai = '';
        $this->di_huni = '';
        $this->jumlah_Unit = '';
    }


    public function render()
    {
        $tower = TowerModel::where('report_id', $_COOKIE["id_fase"])->get();
        return view('livewire.tower', ['tower' => $tower]);
    }
}
