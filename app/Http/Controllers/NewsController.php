<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsEditRequest;
use App\Http\Requests\NewsRemoveRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\JsonResponse;


class NewsController extends Controller
{
    /**
     * @param NewsRequest $request
     * @return JsonResponse
     */
    public function create(NewsRequest $request): JsonResponse
    {
        return News::create($request->title, $request->mini_description, $request->description);
    }

    /**
     * @param NewsRemoveRequest $request
     * @return JsonResponse
     */
    public function remove(NewsRemoveRequest $request): JsonResponse
    {
        return News::remove($request->newsID);
    }

    /**
     * @param NewsEditRequest $request
     * @return JsonResponse
     */
    public function edit(NewsEditRequest $request): JsonResponse
    {
        return News::edit($request->newsID, $request->title, $request->mini_description, $request->description);
    }

    /**
     * @return JsonResponse
     */
    public function show(): JsonResponse
    {
        $news = News::where('id','>',0)->get();
        $data = [];
        foreach ($news as $new){
            $data['data'][] = [
                'id' => $new->id,
                'title' => $new->title,
                'mini_description' => $new->mini_description,
                'description' => $new->description,
                'created_at' => $new->created_at,
                'updated_at' => $new->updated_at,
            ];
        }
        return response()->success($data);
    }
}
