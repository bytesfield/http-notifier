<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Actions\SubscriptionAction;
use App\Http\Requests\SubscriptionRequest;

class SubscriptionController extends Controller
{
    use JsonResponse;

    public function store(SubscriptionRequest $request, Subscription $subscription, SubscriptionAction $subscriptionAction, $topic)
    {
        $url = $request->url;

        $isSubscribed = $subscription->isSubscribed($url, $topic);

        if ($isSubscribed) {
            return $this->error('This url is already subscribed to this topic');
        }
        $response = $subscriptionAction->execute($request, $topic);

        return $this->success('Subscribed Successfully', array($response));
    }
}
