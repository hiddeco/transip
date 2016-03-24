<?php

namespace TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class SubDomain
{
    /**
     * @var string
     */
    public $name;

    /**
     * @param string $name Name of the sub domain
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
