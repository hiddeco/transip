<?php

namespace HiddeCo\TransIP\Soap\Builder;

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
            'WebhostingPackage' => 'HiddeCo\TransIP\Model\WebHostingPackage',
            'WebHost'           => 'HiddeCo\TransIP\Model\WebHost',
            'Cronjob'           => 'HiddeCo\TransIP\Model\Cronjob',
            'MailBox'           => 'HiddeCo\TransIP\Model\MailBox',
            'Db'                => 'HiddeCo\TransIP\Model\Db',
            'MailForward'       => 'HiddeCo\TransIP\Model\MailForward',
            'SubDomain'         => 'HiddeCo\TransIP\Model\SubDomain',
        ];
    }
}
