<?php

namespace App\Listeners;

use App\Classes\ProcessPublish;
use App\Events\PublishTopicEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifySubscribersListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ProcessPublish $processPublish)
    {
        $this->processPublish = $processPublish;
    }

    /**
     * Handle the event.
     *
     * @param  PublishTopicEvent  $event
     * @return void
     */
    public function handle(PublishTopicEvent $event)
    {
        $response = $this->processPublish->notify($event->subscriptions, $event->payload);

        return $response;
    }
}
