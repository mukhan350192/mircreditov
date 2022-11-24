<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientHistoryRequest;
use App\Models\ClientHistory;
use Illuminate\Http\Request;

class ClientHistoryController extends Controller
{
    public function addHistory(ClientHistoryRequest $request)
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
