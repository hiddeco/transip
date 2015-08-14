<?php

namespace HiddeCo\TransIP\Model;

/**
 * @author Hidde Beydals <hello@hidde.co>
 * @see http://en.wikipedia.org/wiki/Cron
 */
class Cronjob
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $minuteTrigger;

    /**
     * @var string
     */
    public $hourTrigger;

    /**
     * @var string
     */
    public $dayTrigger;

    /**
     * @var string
     */
    public $monthTrigger;

    /**
     * @var string
     */
    public $weekdayTrigger;

    /**
     * @param string $name           Name of the cronjob
     * @param string $url            Cronjob URL to fetch
     * @param string $email          Mail address to send cron output to
     * @param string $minuteTrigger  Minute definition for cronjob
     * @param string $hourTrigger    Hour definition for cronjob
     * @param string $dayTrigger     Day definition for cronjob
     * @param string $monthTrigger   Month definition for cronjob
     * @param string $weekdayTrigger Weekday definition for cronjob
     */
    public function __construct($name, $url, $email, $minuteTrigger, $hourTrigger, $dayTrigger, $monthTrigger, $weekdayTrigger)
    {
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
        $this->minuteTrigger = $minuteTrigger;
        $this->hourTrigger = $hourTrigger;
        $this->dayTrigger = $dayTrigger;
        $this->monthTrigger = $monthTrigger;
        $this->weekdayTrigger = $weekdayTrigger;
    }
}