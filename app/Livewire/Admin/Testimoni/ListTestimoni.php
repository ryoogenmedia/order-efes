<?php

namespace App\Livewire\Admin\Testimoni;

use Livewire\Component;
use App\Models\Testimoni;
use Livewire\WithPagination;


class ListTestimoni extends Component
{
    public Testimoni $testimonis;
    public $isShow;

    public $perPage = 10;
    public $page = 1;

    public function mount(Testimoni $testimoni)
    {
        $this->testimonis = $testimoni;
    }

    public function render()
    {

        return view(
            'livewire.admin.testimoni.list-testimoni'
        );
    }

    public function next($lastPage)
    {
        if ($this->page < $lastPage) {
            $this->page += 1;
        }
    }

    public function previous()
    {
        if ($this->page > 1) {
            $this->page -= 1;
        }
    }

    public function update($id, $status)
    {
        try {
            if ($status == false) {
                $this->testimonis->find($id)->update(['is_show' => true]);
            } else {
                $this->testimonis->find($id)->update(['is_show' => false]);
            }
        } catch (\Exception $e) {
            flash()->error('Operation Failed');
        }
    }
}
