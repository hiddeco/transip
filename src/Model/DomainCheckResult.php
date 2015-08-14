<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class DomainCheckResult
{
    const STATUS_INYOURACCOUNT = 'inyouraccount';
    const STATUS_UNAVAILABLE = 'unavailable';
    const STATUS_NOTFREE = 'notfree';
    const STATUS_FREE = 'free';
    const STATUS_INTERNALPULL = 'internalpull';
    const STATUS_INTERNALPUSH = 'internalpush';
    const ACTION_REGISTER = 'register';
    const ACTION_TRANSFER = 'transfer';
    const ACTION_INTERNALPULL = 'internalpull';
    const ACTION_INTERNALPUSH = 'internalpush';

    /**
     * @var string
     */
    public $domainName;

    /**
     * @var string
     */
    public $status;

    /**
     * @var array
     */
    public $actions;
}
