<?php

namespace App\Http\Livewire\Panel\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;

    public $editMode = false;
    public $paginate = 5;
    public $keyword;
    public $category;

    protected $listeners = [
        'resetForm'
    ];

    protected $rules = [
        'category.name' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.panel.category.index', [
            'categories' => $this->getCategories()
        ])->layout('layouts.panel',[
            'title' => 'Kategori'
        ]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        $this->editMode = true;
    }

    public function store()
    {
        $this->validate();
        $this->category['slug'] = $this->category['name'];

        if(!$this->editMode) {
            Category::create($this->category);
        } else {
            $data = $this->category->toArray();
            $this->category->update($data);
        }
            
        $this->emit('resetForm');
        $this->emit('swals', 'Berhasil menyimpan data');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        $this->emit('swals', 'Berhasil menghapus kategori');
    }

    public function resetForm()
    {
        $this->editMode = false;
        $this->reset('category');
    }

    public function getCategories()
    {
        $categories = Category::latest()->where('id', '!=', 1);

        if(strlen($this->keyword) > 0) {
            $categories->where('name', 'like', "%{$this->keyword}%");
        }

        return $categories->paginate($this->paginate);
    }
}
