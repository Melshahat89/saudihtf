<?php

namespace App\Http\Livewire;

use App\Application\Model\Blogposts;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class FilterBlog extends Component
{
    use WithPagination;

    public $key;
    public $sortBy;
    public $speciality;

    protected $listeners = ['filterUpdated' => '$refresh'];

    public function mount(){
        $this->key = session()->has('tag_slug') ? session()->get('tag_slug') : null;
        $this->speciality = session()->has('category_slug') ? session()->get('category_slug') : null;
    }

    public function render()
    {
        $items = Blogposts::where('status', 1);

        if ($this->key) {
            $items = $items->where(function ($query) {
                $query->where("title", "like", "%" . $this->key . "%")
                    ->orWhere("description", "like", "%" . $this->key . "%")
                    ->orWhere('seo_keys', "like", "%" . $this->key . "%")
                ;
            });
            saveSearchKey($this->key);
        }

        if($this->speciality){
            $speciality = $this->speciality;
            
            $items = $items->whereHas('categories', function($q) use ($speciality) {
                $q->whereHas('category', function($q2) use ($speciality) {
                    $q2->where('slug', $speciality)
                    ->orWhere('slug', urlencode($speciality));
                });
            });
        }

        if($this->sortBy == 1){
            $items = $items->orderBy('created_at', 'ASC')->get();
        }else{
            $items = $items->orderBy('created_at', 'DESC')->get();
        }

        
        $paging = $items->forPage($this->page, 8);
        $paginator = new LengthAwarePaginator($paging, $items->count(), 8, $this->page);

        return view('website.livewire.filter-blog', [
            'items' => $paginator
        ]);
    }

    public function updateFilter(){
        $this->emit('filterUpdated');
    }

    public function resetFilter(){
        $this->speciality = null;
        $this->sortBy = null;
        $this->key = null;
    }  
}
