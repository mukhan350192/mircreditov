<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientHistoryRequest;
use App\Models\ClientHistory;
use Illuminate\Http\JsonResponse;

class ClientHistoryController extends Controller
{
    /**
     * @param ClientHistoryRequest $request
     * @return JsonResponse
     */
    public function addHistory(ClientHistoryRequest $request):JsonResponse
    {
        return ClientHistory::create(
            $request->token,
            $request->phone,
            $request->action,
            $request->utm_source,
            $request->utm_content,
            $request->utm_medium,
            $request->utm_term,
            $request->utm_campaign,
            $request->web_id
        );
    }
}
