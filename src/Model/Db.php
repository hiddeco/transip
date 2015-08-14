<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Db
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $username;

    /**
     * @var int
     */
    public $maxDiskUsage;

    /**
     * @param string $name         Database name
     * @param string $username     Database username
     * @param int    $maxDiskUsage Database size in mb
     */
    public function __construct($name, $username = '', $maxDiskUsage = 100)
    {
        $this->name = $name;
        $this->username = $username;
        $this->maxDiskUsage = $maxDiskUsage;
    }
}