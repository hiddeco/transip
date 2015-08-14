<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class OperatingSystem
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
    public $dateTimeCreate;

    /**
     * @var bool
     */
    public $isPreinstallableImage;
}