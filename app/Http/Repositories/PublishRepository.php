<?php

namespace App\Http\Repositories;

use App\Events\PublishTopicEvent;
use Exception;
use App\Models\Topic;
use App\Models\Subscription;
use App\Traits\JsonResponse;
use App\Http\Requests\PublishRequest;
use App\Models\Publish;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PublishRepository
{
    use JsonResponse;

    public function publishTopic(PublishRequest $request, $topic_name)
    {
        try {
            $data = $request->data;

            $topicID = Topic::where('name', $topic_name)->first()->id;

            $subscriptions = Subscription::where('topic_id', $topicID)->get();

            $payload = [
                'topic' => $topic_name,
                'data' => $data
            ];

            $savePublish = Publish::create([
                'topic_id' => $topicID,
                'data' => json_encode($data)
            ]);

            if ($savePublish) {

                $publishedResponse = PublishTopicEvent::dispatch($subscriptions, $payload);

                return $publishedResponse;
            }
        } catch (Exception $exception) {

            throw new HttpException(503, 'Unable to subscribe', $exception);
        }
    }
}
