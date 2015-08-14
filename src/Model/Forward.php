<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Forward
{
    const FORWARDMETHOD_DIRECT = 'direct';
    const FORWARDMETHOD_FRAME = 'frame';

    /**
     * @var string
     */
    public $domainName;

    /**
     * @var string
     */
    public $forwardTo;

    /**
     * @var string
     */
    public $forwardMethod;

    /**
     * @var string
     */
    public $frameTitle;

    /**
     * @var string
     */
    public $frameIcon;

    /**
     * @var bool
     */
    public $forwardEverything;

    /**
     * @var bool
     */
    public $forwardSubdomains;

    /**
     * @var string
     */
    public $forwardEmailTo;

    /**
     * @param string $domainName
     * @param string $forwardTo
     * @param string $forwardMethod
     * @param string $frameTitle
     * @param string $frameIcon
     * @param bool   $forwardEverything
     * @param bool   $forwardSubdomains
     * @param string $forwardEmailTo
     */
    public function __construct(
        $domainName,
        $forwardTo,
        $forwardMethod = self::FORWARDMETHOD_DIRECT,
        $frameTitle = '',
        $frameIcon = '',
        $forwardEverything = true,
        $forwardSubdomains = true,
        $forwardEmailTo = ''
    ) {
        $this->domainName = $domainName;
        $this->forwardTo = $forwardTo;
        $this->forwardMethod = $forwardMethod;
        $this->frameTitle = $frameTitle;
        $this->frameIcon = $frameIcon;
        $this->forwardEverything = $forwardEverything;
        $this->forwardSubdomains = $forwardSubdomains;
        $this->forwardEmailTo = $forwardEmailTo;
    }
}
