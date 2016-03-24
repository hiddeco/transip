<?php

namespace TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class Tld
{
    const CAPABILITY_REQUIRESAUTHCODE = 'requiresAuthCode';
    const CAPABILITY_CANREGISTER = 'canRegister';
    const CAPABILITY_CANTRANSFERWITHOWNERCHANGE = 'canTransferWithOwnerChange';
    const CAPABILITY_CANTRANSFERWITHOUTOWNERCHANGE = 'canTransferWithoutOwnerChange';
    const CAPABILITY_CANSETLOCK = 'canSetLock';
    const CAPABILITY_CANSETOWNER = 'canSetOwner';
    const CAPABILITY_CANSETCONTACTS = 'canSetContacts';
    const CAPABILITY_CANSETNAMESERVERS = 'canSetNameservers';

    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $price;

    /**
     * @var float
     */
    public $renewalPrice;

    /**
     * @var array
     */
    public $capabilities;

    /**
     * @var int
     */
    public $registrationPeriodLength;

    /**
     * @var int
     */
    public $cancelTimeFrame;
}
