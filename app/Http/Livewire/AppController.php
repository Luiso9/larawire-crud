<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AppModel;

class AppController extends Component
{

    use WithPagination;

    public $modalFormVisible = false;
    public $modelId;
    public $judul, $genre;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = AppModel::where('judul', 'like', '%' . $this->search . '%')
        ->orWhere('genre', 'like', '%' . $this->search . '%')
        ->paginate(5);
        return view('livewire.app-controller', [
            'data' => $data
        ]);
    }

    // Fungsi untuk Modal
    public function showModalForm()
    {
        $this->modalFormVisible = true;
    }

    public function hideModalForm()
    {
        $this->modalFormVisible = false;
    }

    // Buat Data 
    public function create()
    {
        $this->validate([
            'judul' => 'required',
            'genre' => 'required',
            // Kolom Judul & Genre wajib di-isi
        ]);

        AppModel::create([
            'judul' => $this->judul,
            'genre' => $this->genre,
        ]);

    
        $this->hideModalForm();
        $this->reset();
    }

    // Fungsi Edit data
    public function edit($id)
    {
        $data = AppModel::findOrFail($id);
        $this->modelId = $id;
        $this->judul = $data->judul;
        $this->genre = $data->genre;

        $this->showModalForm();
    }


    // Fungsi untuk mempublish data setelah selesai di-edit.
    public function update()
    {
        $this->validate([
            'judul' => 'required',
            'genre' => 'required',
        ]);

        $data = AppModel::findOrFail($this->modelId);
        $data->judul = $this->judul;
        $data->genre = $this->genre;

        $this->hideModalForm();
        $this->resetPage();
    }

    // Hapus Data
    public function delete($id)
    {
        AppModel::findOrFail($id)->delete();
    }
}
