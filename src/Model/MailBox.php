<?php

namespace TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 */
class MailBox
{
    const SPAMCHECKER_STRENGTH_AVERAGE = 'AVERAGE';
    const SPAMCHECKER_STRENGTH_OFF = 'OFF';
    const SPAMCHECKER_STRENGTH_LOW = 'LOW';
    const SPAMCHECKER_STRENGTH_HIGH = 'HIGH';

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $spamCheckerStrength;

    /**
     * @var int
     */
    public $maxDiskUsage;

    /**
     * @var bool
     */
    public $hasVacationReply;

    /**
     * @var string
     */
    public $vacationReplySubject;

    /**
     * @var string
     */
    public $vacationReplyMessage;

    /**
     * @param string $address              Address of this mail box
     * @param string $spamCheckerStrength  Spam checker strength
     * @param int    $maxDiskUsage         Max mail box size in mb
     * @param bool   $hasVacationReply     Vacation reply status
     * @param string $vacationReplySubject Subject of vacation reply
     * @param string $vacationReplyMessage Message of vacation reply
     */
    public function __construct(
        $address,
        $spamCheckerStrength = self::SPAMCHECKER_STRENGTH_AVERAGE,
        $maxDiskUsage = 20,
        $hasVacationReply = false,
        $vacationReplySubject = '',
        $vacationReplyMessage = ''
    ) {
        $this->address = $address;
        $this->spamCheckerStrength = $spamCheckerStrength;
        $this->maxDiskUsage = $maxDiskUsage;
        $this->hasVacationReply = $hasVacationReply;
        $this->vacationReplySubject = $vacationReplySubject;
        $this->vacationReplyMessage = $vacationReplyMessage;
    }
}
