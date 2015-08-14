<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class DataCenterVisitor
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $reservationNumber;

    /**
     * @var string
     */
    public $accessCode;

    /**
     * @var bool
     */
    public $hasBeenRegisteredBefore;
}
