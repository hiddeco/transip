<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Vps
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $operatingSystem;

    /**
     * @var string
     */
    public $diskSize;

    /**
     * @var string
     */
    public $memorySize;

    /**
     * @var string
     */
    public $cpus;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $ipAddress;

    /**
     * @var string
     */
    public $vncHostname;

    /**
     * @var string
     */
    public $vncPortNumber;

    /**
     * @var string
     */
    public $vncPassword;

    /**
     * @var bool
     */
    public $isBlocked;

    /**
     * @var bool
     */
    public $isCustomerLocked;
}