<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 02.12.13
 * Time: 0:39
 */

namespace Likedimion\Listener;


use Symfony\Component\EventDispatcher\EventDispatcher;

class PersistListener {
    /** @var  EventDispatcher */
    protected $eventDispatcher;

    public function onPersist(){

    }

    /**
     * @param \Symfony\Component\EventDispatcher\EventDispatcher $eventDispatcher
     */
    public function setEventDispatcher($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }


} 