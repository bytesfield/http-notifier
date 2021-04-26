<?php

namespace App\Http\Actions;

use Exception;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Repositories\SubscriptionRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SubscriptionAction
{


    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }


    /**
     * Execute Subscription.
     *
     * @param \App\Http\Requests\SubscriptionRequest $request
     * @param \App\Models\Topic $topic
     *
     */
    public function execute(SubscriptionRequest $request, $topic)
    {
        $topic_name = $topic;

        $response = $this->subscriptionRepository->createSubscription($request, $topic_name);

        return $response;
    }
}
