<?php

namespace App\Http\Livewire;

use App\Application\Model\Categories;
use App\Application\Model\Courses;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{

    use WithPagination;
    
    public $filtering;
    public $slug; 
    public $talks;
    public $events;
    public $type;
    public $sortBy;
    public $speciality;
    public $rating;
    public $duration;
    public $key;
    public $filters = array();

    protected $listeners = ['filterUpdated' => '$refresh'];

    public function mount(){
        request()->query->remove('key');
        $this->category = ($this->slug && Categories::where('slug', $this->slug)->exists()) ? Categories::where('slug', $this->slug)->first()->id : null;
    }

    public function render()
    {
        $items = Courses::where('published', 1)->where('soon', '!=', 1);

        if($this->category && !$this->speciality){
//            $items = $items->where('categories_id', $this->category);
            $items = $items->where(function ($query) {
                $query->where('categories_id', $this->category)
                    ->orWhere('other_categories', 'LIKE', '%"'.$this->category.'"%');
            });

        }


    
        if($this->type){
            $items = $items->where('type', $this->type);
        }

        if ($this->key) {
            $items = $items->where(function ($query) {
                $query->where("title", "like", "%" . $this->key . "%")
                    ->orWhere("search_keys", "like", "%" . $this->key . "%")
                    ->orWhere("doctor_name", "like", "%" . $this->key . "%")
                ;
            });
            saveSearchKey($this->key);
        }

        if($this->sortBy == 1){
            $items = $items->orderBy('created_at', 'ASC')->get();
        }else{
            $items = $items->orderBy('created_at', 'DESC')->get();
        }

        if ($this->rating) {
            $items = $items->filter(function ($item) {
                if ($item->CourseRating > ((int) $this->rating - 1) and $item->CourseRating <= (int) $this->rating) {
                    return $item;
                }
            });
        }
    
        if ($this->duration) {
            $duration = explode(":", $this->duration);
            $items = $items->filter(function ($item) use ($duration) {
                if (($item->CourseDuration > ($duration[0] * 60 * 60)) and ($item->CourseDuration <= ($duration[1] * 60 * 60))) {
                    return $item;
                }
            });
        } 
    
        if ($this->speciality) {
            $speciality = $this->speciality;
            $items = $items->filter(function ($item) use ($speciality) {
                if ($item->categories->slug == $speciality) {
                    return $item;
                }
            });
        } 

        $paging = $items->forPage($this->page, 8);
        $paginator = new LengthAwarePaginator($paging, $items->count(), 8, $this->page);

        return view('website.livewire.filter',[
            'items' => $paginator
        ]);
    }

    public function updateFilter(){
        $this->emit('filterUpdated');
    }


    public function resetFilter(){
        $this->rating = null;
        $this->duration = null;
        $this->speciality = null;
        $this->sortBy = null;
        $this->key = null;
    }  

}
