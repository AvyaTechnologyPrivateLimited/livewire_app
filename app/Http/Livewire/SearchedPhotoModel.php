<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\SearchedPhoto;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StoryBlocksApiController;

class SearchedPhotoModel extends Component
{
    public $show = false;
    public $task;
    public $task_id;
    public $keyword;
    public $photosArr;

    public function show(Task $task){
        $this->show = true;
        $this->task = $task;
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
        $taskArr = json_decode($this->task, true);
        $task_id = isset($taskArr['id']) ? $taskArr['id'] : '';
        $this->task_id = $task_id;
        $this->photosArr = SearchedPhoto::where('task_id', $this->task_id)->get()->toArray();
        return view('livewire.searched-photo-model', ['photosArr' => $this->photosArr]);
    }

    // public function searchKeyword(){
    //     $validatedData = $this->validate([
    //         'keyword' => 'required',
    //     ]);

    //     $keyword = $validatedData['keyword']; 
    //     $task_id = $this->task_id;
    //     $photosArr = [];
    //     if($keyword != ""){
    //         $storyBlocksObj = new StoryBlocksApiController;
    //         $myRequest = new \Illuminate\Http\Request();
    //         $myRequest->setMethod('POST'); //default METHOD
    //         $myRequest->request->add(['keyword' => $keyword]);
    //         $myRequest->request->add(['page' => 1]);
    //         $myRequest->request->add(['results_per_page' => 10]);
    //         $this->photosArr = json_decode($storyBlocksObj->searchImage($myRequest), true);

    //         if (!empty($this->photosArr)) {
    //             foreach ($this->photosArr['response']['results'] as $val) {
    //                 SearchedPhoto::updateOrInsert(
    //                     ['user_id' => Auth::user()->id, 'task_id' => $task_id, 'photo_id' => $val['id']],
    //                     ['title' => $val['title'], 'type' => $val['type'], 'thumbnail_url' => $val['thumbnail_url'], 'preview_url' => $val['preview_url'], 'is_new' => $val['is_new'], 'source' => 'StoryBlocks']
    //                 );
    //             }
    //         }
    //     }

    //     // echo "<pre>";
    //     // print_r($this->photosArr);die;
    //     return view('livewire.search-photo-model', ['photosArr' => $this->photosArr]);
    //     // dd($photosArr);
    // }
}
