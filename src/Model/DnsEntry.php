<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class DnsEntry
{
    const TYPE_A = 'A';
    const TYPE_AAAA = 'AAAA';
    const TYPE_CNAME = 'CNAME';
    const TYPE_MX = 'MX';
    const TYPE_NS = 'NS';
    const TYPE_TXT = 'TXT';
    const TYPE_SRV = 'SRV';

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $expire;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $content;

    /**
     * @param string $name
     * @param int    $expire
     * @param string $type
     * @param string $content
     */
    public function __construct($name, $expire, $type, $content)
    {
        $this->name = $name;
        $this->expire = $expire;
        $this->type = $type;
        $this->content = $content;
    }
}
