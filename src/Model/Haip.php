<?php

namespace TransIP\Model;

class Haip
{
    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $status = '';

    /**
     * @var bool
     */
    public $isBlocked = false;

    /**
     * @var bool
     */
    public $isLoadBalancingEnabled = false;

    /**
     * @var string
     */
    public $loadBalancingMode = '';

    /**
     * @var string
     */
    public $stickyCookieName = '';

    /**
     * @var string
     */
    public $healthCheckMode = '';

    /**
     * @var string
     */
    public $httpHealthCheckPath = '';

    /**
     * @var string
     */
    public $httpHealthCheckPort = '';

    /**
     * @var string
     */
    public $ipv4Address = '';

    /**
     * @var string
     */
    public $ipv6Address = '';

    /**
     * @var string
     */
    public $ipSetup = '';

    /**
     * @var array|Vps[]
     */
    public $attachedVpses = [];

    /**
     * @var string
     *
     * @deprecated 5.6 Only shows data from one of the attached VPSes
     * @see Haip::$attachedVpses
     */
    public $vpsName = '';

    /**
     * @var string
     *
     * @deprecated 5.6 Only shows data from one of the attached VPSes
     * @see Haip::$attachedVpses
     */
    public $vpsIpv4Address = '';

    /**
     * @var string
     *
     * @deprecated 5.6 Only shows dat from one of the attached VPSes
     * @see Haip::$attachedVpses
     */
    public $vpsIpv6Address = '';
}
