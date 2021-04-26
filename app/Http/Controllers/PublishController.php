<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use App\Http\Actions\PublishAction;
use App\Http\Requests\PublishRequest;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    use JsonResponse;

    public function store(PublishRequest $request, PublishAction $publishAction, $topic)
    {

        $response = $publishAction->execute($request, $topic);

        return $this->success('Topic Published Successfully', array($response));
    }
}
