<?php

namespace App\Livewire\Admin;

use App\Models\UserRole;
use Livewire\Component;
use Livewire\WithPagination;

class PeranUserLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $id, $role;

    public $modules = [];

    public $paginate = "10";

    public function updatedPaginate()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userRoles = UserRole::latest()
        ->paginate($this->paginate);

        return view('livewire.admin.peran-user.index', ['userRoles' => $userRoles]);
    }

    public function edit($id)
    {
        $userRole = UserRole::findOrFail($id);
        $this->role = $userRole->role;
        $this->modules = $userRole->modules;
        $this->id = $userRole->id;
    }

    public function storeOrUpdate()
    {
        if($this->id) {
            $this->validate([
                'role' => 'required|unique:user_roles,role,' . $this->id,
                'modules' => 'required|array'
            ], [
                'role.required' => 'Nama peran tidak boleh kosong',
                'role.unique' => 'Nama peran sudah tersedia',
                'modules.required' => 'Pilih minimal 1 modul'
            ]);
        } else {
            $this->validate([
                'role' => 'required|unique:user_roles,role',
                'modules' => 'required|array'
            ], [
                'role.required' => 'Nama peran tidak boleh kosong',
                'role.unique' => 'Nama peran sudah tersedia',
                'modules.required' => 'Pilih minimal 1 modul'
            ]);
        }

        UserRole::updateOrCreate([
            'id' => $this->id
        ], [
            'role' => strtoupper($this->role),
            'modules' => $this->modules
        ]);

        $this->resetValidation();
        $this->reset(['id', 'role', 'modules']);

        $this->dispatch('notifStoreOrUpdate', title: 'Sukses', text: $this->id ? 'Peran user berhasil diperbarui' 
        : 'Peran user berhasil ditambah', icon: 'success');
    }

    public function updateStatus($id)
    {

        $userRole = UserRole::findOrFail($id);

        $userRole->status = !$userRole->status;

        $userRole->save();

        $this->dispatch('notifUpdateStatus', title: 'Sukses', text: 'Status peran berhasi diperbarui', icon: 'success');
    }
}
