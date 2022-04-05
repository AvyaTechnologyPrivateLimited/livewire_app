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
        $urlParamsArr['page'] = isset($request->page) ? $request->page : 1;
        $urlParamsArr['results_per_page'] = isset($request->results_per_page) ? $request->results_per_page : 10;
        $response = $this->storyBlocksRequest($urlParamsArr);

        return $response;
    }
}
