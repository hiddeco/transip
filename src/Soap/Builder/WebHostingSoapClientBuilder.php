<?php

namespace TransIP\Soap\Builder;

use TransIP\Model\Cronjob;
use TransIP\Model\Db;
use TransIP\Model\MailBox;
use TransIP\Model\MailForward;
use TransIP\Model\SubDomain;
use TransIP\Model\WebHost;
use TransIP\Model\WebHostingPackage;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class WebHostingSoapClientBuilder extends SoapClientBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getWsdlPath()
    {
        return '/wsdl?service=WebhostingService';
    }

    /**
     * {@inheritdoc}
     */
    protected function getClassMap()
    {
        return [
            'WebhostingPackage' => WebHostingPackage::class,
            'WebHost'           => WebHost::class,
            'Cronjob'           => Cronjob::class,
            'MailBox'           => MailBox::class,
            'Db'                => Db::class,
            'MailForward'       => MailForward::class,
            'SubDomain'         => SubDomain::class,
        ];
    }
}
