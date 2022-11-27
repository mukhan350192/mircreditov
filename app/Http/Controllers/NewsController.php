<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsEditRequest;
use App\Http\Requests\NewsRemoveRequest;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function create(NewsRequest $request)
    {
        return News::create($request->title, $request->mini_description, $request->description);
    }

    public function remove(NewsRemoveRequest $request){
        return News::remove($request->newsID);
    }

    public function edit(NewsEditRequest $request){
        return News::edit($request->newsID,$request->title,$request->mini_description,$request->description);
    }
}
