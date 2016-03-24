<?php

namespace TransIP\Soap\Builder;

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
            'WebhostingPackage' => 'TransIP\Model\WebHostingPackage',
            'WebHost'           => 'TransIP\Model\WebHost',
            'Cronjob'           => 'TransIP\Model\Cronjob',
            'MailBox'           => 'TransIP\Model\MailBox',
            'Db'                => 'TransIP\Model\Db',
            'MailForward'       => 'TransIP\Model\MailForward',
            'SubDomain'         => 'TransIP\Model\SubDomain',
        ];
    }
}
