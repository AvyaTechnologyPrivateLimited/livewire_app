<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\SearchedPhoto;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StoryBlocksApiController;

class SearchPhotoModel extends Component
{
    public $show = false;
    public $showSearchBox = true;
    public $task;
    public $task_id;
    public $keyword;
    public $content_type = "all";
    public $orientation = "all";
    public $color;
    public $categories;
    public $page ='1';
    public $results_per_page ='20';
    public $sort_by ='most_relevant';
    public $sort_order ='ASC';
    public $required_keywords;
    public $filtered_keywords;
    public $source_language ='iso';
    public $contributor_id;
    public $library_ids;
    public $exclude_library_ids;
    public $translate;
    public $safe_search;
    public $has_transparency;
    public $has_talent_released;
    public $has_property_released;
    public $is_editorial;
    public $content_scores;
    public $extended='download_formats';


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
        return view('livewire.search-photo-model', ['task_id' => $this->task_id]);
    }

    public function searchKeyword(){
        $validatedData = $this->validate([
            'keyword' => 'required',
            // 'color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ]);
        
        $keyword = $validatedData['keyword']; 
        $task_id = $this->task_id;
        $photosArr = [];
        if($keyword != ""){
            $storyBlocksObj = new StoryBlocksApiController;
            $myRequest = new \Illuminate\Http\Request();
            $myRequest->setMethod('POST'); //default METHOD
            $myRequest->request->add(['keyword' => $keyword]);
            if (!empty($this->content_type)) { $myRequest->request->add(['content_type' => $this->content_type]); }
            if (!empty($this->orientation)) { $myRequest->request->add(['orientation' => $this->orientation]); }
            if (!empty($this->color)) { $myRequest->request->add(['color' => $this->color]); }
            if (!empty($this->categories)) { $myRequest->request->add(['categories' => $this->categories]); }
            if (!empty($this->sort_by)) { $myRequest->request->add(['sort_by' => $this->sort_by]); }
            if (!empty($this->sort_order)) { $myRequest->request->add(['sort_order' => $this->sort_order]); }
            if (!empty($this->required_keywords)) { $myRequest->request->add(['required_keywords' => $this->required_keywords]); }
            if (!empty($this->filtered_keywords)) { $myRequest->request->add(['filtered_keywords' => $this->filtered_keywords]); }
            if (!empty($this->source_language)) { $myRequest->request->add(['source_language' => $this->source_language]); }
            if (!empty($this->contributor_id)) { $myRequest->request->add(['contributor_id' => $this->contributor_id]); }
            if (!empty($this->library_ids)) { $myRequest->request->add(['library_ids' => $this->library_ids]); }
            if (!empty($this->exclude_library_ids)) { $myRequest->request->add(['exclude_library_ids' => $this->exclude_library_ids]); }
            if (!empty($this->translate)) { $myRequest->request->add(['translate' => $this->translate == '1' ? 'true' : 'false']); }
            if (!empty($this->safe_search)) { $myRequest->request->add(['safe_search' => $this->safe_search == '1' ? 'true' : 'false']); }
            if (!empty($this->has_transparency)) { $myRequest->request->add(['has_transparency' => $this->has_transparency == '1' ? 'true' : 'false']); }
            if (!empty($this->has_talent_released)) { $myRequest->request->add(['has_talent_released' => $this->has_talent_released == '1' ? 'true' : 'false']); }
            if (!empty($this->has_property_released)) { $myRequest->request->add(['has_property_released' => $this->has_property_released == '1' ? 'true' : 'false']); }
            if (!empty($this->is_editorial)) { $myRequest->request->add(['is_editorial' => $this->is_editorial == '1' ? 'true' : 'false']); }
            if (!empty($this->content_scores)) { $myRequest->request->add(['content_scores' => $this->content_scores == '1' ? 'true' : 'false']); }
            if (!empty($this->extended)) { $myRequest->request->add(['extended' => $this->extended]); }
            $myRequest->request->add(['page' => !empty($this->page) ? $this->page :'1']);
            $myRequest->request->add(['results_per_page' => !empty($this->results_per_page) ? $this->results_per_page:'10']);
            
            $this->photosArr = json_decode($storyBlocksObj->searchImage($myRequest), true);
            // print_r($this->photosArr);
            if (isset($this->photosArr['response']['results']) && !empty($this->photosArr['response']['results'])) {
                $this->showSearchBox = false;
                foreach ($this->photosArr['response']['results'] as $val) {
                    SearchedPhoto::updateOrInsert(
                        ['user_id' => Auth::user()->id, 'task_id' => $task_id, 'photo_id' => $val['id']],
                        ['title' => $val['title'], 'type' => $val['type'], 'thumbnail_url' => $val['thumbnail_url'], 'preview_url' => $val['preview_url'], 'is_new' => $val['is_new'], 'source' => 'StoryBlocks']
                    );
                }
            }else{
                session()->flash('message', 'Something Went Wrong, Please Try Again!');
            }

        }

        // echo "<pre>";
        // print_r($this->photosArr);die;
        return view('livewire.search-photo-model', ['photosArr' => $this->photosArr]);
        // dd($photosArr);
    }
}
