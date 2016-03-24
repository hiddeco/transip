<?php

namespace TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class MailForward
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $targetAddress;

    /**
     * @param string $name          Mail address to forward email from
     * @param string $targetAddress Address to forward to
     */
    public function __construct($name, $targetAddress)
    {
        $this->name = $name;
        $this->targetAddress = $targetAddress;
    }
}
