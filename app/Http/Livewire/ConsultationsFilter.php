<?php

namespace App\Http\Livewire;

use App\Application\Model\Consultations;
use App\Application\Model\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class ConsultationsFilter extends Component
{

    use WithPagination;

    public $speciality;
    public $rating;

    protected $listeners = ['filterUpdated' => '$refresh'];

    public function render()
    {
        $items = Consultations::where('published', 1)->get();

        if ($this->speciality) {
            $speciality = $this->speciality;
            $items = $items->filter(function ($item) use ($speciality) {
                if ($item->consultationcategories->slug == $speciality) {
                    return $item;
                }
            });
        } 

        if ($this->rating) {
            $items = $items->filter(function ($item) {
                if ($item->ConsultationRating > ((int) $this->rating - 1) and $item->ConsultationRating <= (int) $this->rating) {
                    return $item;
                }
            });
        }

        $paging = $items->forPage($this->page, 8);
        $paginator = new LengthAwarePaginator($paging, $items->count(), 8, $this->page);

        return view('website.livewire.consultations-filter', [
            'items' => $paginator
        ]);
    }

    public function updateFilter(){
        $this->emit('filterUpdated');
    }

    public function resetFilter(){
        $this->speciality = null;
        $this->rating = null;
    }  

}
