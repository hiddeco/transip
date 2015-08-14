<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Webhost
{
    /**
     * @var string
     */
    public $domainName;

    /**
     * @var \HiddeCo\TransIP\Model\Cronjob[]
     */
    public $cronjobs;

    /**
     * @var \HiddeCo\TransIP\Model\MailBox[]
     */
    public $mailBoxes;

    /**
     * @var \HiddeCo\TransIP\Model\Db[]
     */
    public $dbs;

    /**
     * @var \HiddeCo\TransIP\Model\MailForward[]
     */
    public $mailForwards;

    /**
     * @var \HiddeCo\TransIP\Model\SubDomain[]
     */
    public $subDomains;
}
