<?php

namespace App\Http\Livewire\Panel\Excul;

use App\Models\Excul;
use App\Services\Excul\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ExculIndex extends Component
{
    use WithPagination, WithFileUploads;

    public $editMode = false;
    public $paginate = 5;
    public $keyword;
    public $excul, $model;

    protected $rules = [
        'excul.name' => 'required|string|min:3',
    ];

    public function updated()
    {
        if(!is_string($this->excul['image'] ?? false)) {
            $this->validate([
                'excul.image' => 'sometimes|file|image|mimes:jpg,png,gif'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.panel.excul.index', [
            'exculs' => $this->getExculs()
        ])->layout('layouts.panel', [
            'title' => 'Ekstrakulikuler'
        ]);
    }

    public function store()
    {
        $this->validate();
        $this->manageProps();

        if(!$this->editMode) {
            Excul::create($this->excul);
        } else {
            $this->model->update($this->excul);
            $this->editMode = false;
        }

        $this->reset('excul', 'model');
        $this->emit('swals', 'Berhasil menyimpan data');
    }

    public function edit($id)
    {
        $this->editMode = true;
        $this->model = Excul::find($id);
        $this->excul = $this->model->toArray();
    }

    public function delete($id)
    {
        $excul = Excul::find($id);
        Image::delete($excul->image);
        $excul->delete();

        $this->emit('swals', 'Berhasil menghapus data');
    }

    public function getExculs()
    {
        $exculs = (strlen($this->keyword) > 0) ?
            Excul::latest()->where('name', 'like', "%{$this->keyword}%") :
            Excul::latest();

        return $exculs->paginate($this->paginate);
    }
    
    private function manageProps()
    {
        if($image = $this->excul['image'] ?? null) {
            if(!is_string($image)) {
                $old = $this->model->image ?? null;
                $this->excul['image'] = Image::upload($image, $old);
            }
        }
    }
}
