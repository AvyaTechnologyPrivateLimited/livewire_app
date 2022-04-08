<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\SearchedPhoto;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShutterStockApiController;

class SearchShutterStockPhotoModel extends Component
{
    public $show = false;
    public $showSearchBox = true;
    public $task;
    public $task_id;
    public $query;
    public $image_type = "photo";
    public $orientation = "vertical";
    public $people_number;
    public $language;
    public $color;
    public $category;
    public $sort;
    public $view;
    public $page ='1';
    public $per_page ='10';

    public $photoArr;

    public function show(Task $task){
        $this->show = true;
        $this->task = $task;
    }

    protected $listeners = [
        'show' => 'show'
    ];

    public function render()
    {
        $taskArr = json_decode($this->task, true);
        $task_id = isset($taskArr['id']) ? $taskArr['id'] : '';
        $this->task_id = $task_id;
        return view('livewire.search-shutter-stock-photo-model', ['photosArr' => $this->photoArr]);
    }

    public function searchKeyword(){
        $validatedData = $this->validate([
            'query' => 'required',
            // 'color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ]);
        
        $query = $validatedData['query']; 
        $task_id = $this->task_id;
        $photosArr = [];
        if($query != ""){
            $shutterStockObj = new ShutterStockApiController;
            $myRequest = new \Illuminate\Http\Request();
            $myRequest->setMethod('POST'); //default METHOD
            $myRequest->request->add(['query' => $query]);
            $myRequest->request->add(['image_type' => !empty($this->image_type) ? $this->image_type :'photo']);
            $myRequest->request->add(['orientation' => !empty($this->orientation) ? $this->orientation :'vertical']);
            $myRequest->request->add(['people_number' => 3]);
            if (!empty($this->language)) { $myRequest->request->add(['language' => $this->language]); }
            if (!empty($this->color)) { $myRequest->request->add(['color' => $this->color]); }
            if (!empty($this->category)) { $myRequest->request->add(['category' => $this->category]); }
            if (!empty($this->sort)) { $myRequest->request->add(['sort' => $this->sort]); }
            if (!empty($this->view)) { $myRequest->request->add(['view' => $this->view]); }
            $myRequest->request->add(['page' => !empty($this->page) ? $this->page :'1']);
            $myRequest->request->add(['per_page' => !empty($this->per_page) ? $this->per_page:'10']);
            
            $this->photosArr = json_decode($shutterStockObj->searchImage($myRequest), true);
            if (isset($this->photosArr['response']['data']) && !empty($this->photosArr['response']['data'])) {
                $this->showSearchBox = false;
                foreach ($this->photosArr['response']['data'] as $val) {
                    SearchedPhoto::updateOrInsert(
                        ['user_id' => Auth::user()->id, 'task_id' => $task_id, 'photo_id' => $val['id']],
                        ['title' => $val['description'], 'type' => $val['image_type'], 'thumbnail_url' => $val['assets']['small_thumb']['url'], 'preview_url' => $val['assets']['preview']['url'], 'is_new' => 1, 'source' => 'ShutterStock', 'contributor' => $val['contributor']['id'], 'has_model_release' => $val['has_model_release'], 'media_type' => $val['media_type'], 'aspect' => $val['aspect'], 'assets' => json_encode($val['assets'])]
                    );
                }
            }else{
                session()->flash('message', 'Something Went Wrong, Please Try Again!');
            }
        }

        return view('livewire.search-shutter-stock-photo-model', ['photosArr' => $this->photosArr]);
    }
}
