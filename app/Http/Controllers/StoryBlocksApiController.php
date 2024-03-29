<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ImageSearchTrait;

class StoryBlocksApiController extends Controller
{
    use ImageSearchTrait;

    public function searchImage(Request $request){
        if(empty($request->all())){
            return false;
        }
        $urlParamsArr = (array)$request->all();        
        $response = $this->storyBlocksRequest($urlParamsArr);

        return $response;
    }
}
