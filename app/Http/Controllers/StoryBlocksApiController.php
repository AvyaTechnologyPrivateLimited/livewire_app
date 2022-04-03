<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ImageSearchTrait;

class StoryBlocksApiController extends Controller
{
    use ImageSearchTrait;

    public function searchImage(Request $request){

        $urlParamsArr = [];
        $urlParamsArr['keywords'] = isset($request->keyword) ? $request->keyword : 'wildlife';
        $response = $this->storyBlocksRequest($urlParamsArr);

        return $response;
    }
}
