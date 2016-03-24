<?php

namespace TransIP\Model;

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
     * @var \TransIP\Model\Cronjob[]
     */
    public $cronjobs;

    /**
     * @var \TransIP\Model\MailBox[]
     */
    public $mailBoxes;

    /**
     * @var \TransIP\Model\Db[]
     */
    public $dbs;

    /**
     * @var \TransIP\Model\MailForward[]
     */
    public $mailForwards;

    /**
     * @var \TransIP\Model\SubDomain[]
     */
    public $subDomains;
}
