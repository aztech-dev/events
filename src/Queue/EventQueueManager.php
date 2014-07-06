<?php
namespace Evaneos\Events\Queue;

use Evaneos\Events\Event;

interface EventQueueManager
{
    /**
     * Add an event to the queue
     * 
     * @param Event $event the event to add to the queue
     */
    public function addToQueue(Event $event);
    
    /**
     * Returns the next event in queue
     * 
     * @param string $category
     * 
     * @return Event null if no event in queue
     */
    public function nextEvent($category);
    
    /**
     * Notify the queue of the state of an event
     * 
     * @param Event $event
     * @param string $state
     */
    public function notifyQueue(Event $event, $state);
}