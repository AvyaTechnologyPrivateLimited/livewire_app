<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\StoryBlocksApiController;

class SearchPhotoModel extends Component
{
    public $show = false;
    public $task_id = null;
    public $keyword;
    public $photosArr;

    public function show(){
        $this->show = true;
    }

    protected $listeners = [
        'show' => 'show'
    ];

    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '7xl';
    }

    public function render()
    {
        
        return view('livewire.search-photo-model', ['task_id' => $this->task_id]);
    }

    public function searchKeyword(){
        $validatedData = $this->validate([
            'keyword' => 'required',
        ]);

        $keyword = $validatedData['keyword']; 
        $photosArr = [];
        if($keyword != ""){
            $storyBlocksObj = new StoryBlocksApiController;
            $myRequest = new \Illuminate\Http\Request();
            $myRequest->setMethod('POST'); //default METHOD
            $myRequest->request->add(['keyword' => $keyword]);
            $this->photosArr = json_decode($storyBlocksObj->searchImage($myRequest), true);
        }

        // echo "<pre>";
        // print_r($this->photosArr);die;
        return view('livewire.search-photo-model', ['photosArr' => $this->photosArr]);
        // dd($photosArr);
    }
}
