<?php namespace Kitbs\Clockwork;

use Config;
use ClockworkException;

require_once dirname(__FILE__).'/../../Clockwork/class-Clockwork.php';

class ClockworkLaravel extends \Clockwork {

    public function __construct()
    {

        $key = Config::get('clockwork-sms::key');

        $options = Config::get('clockwork-sms::options');

        parent::__construct($key, $options);

    }

    public function send(array $sms, $checkNumbers = false) {

        if ($checkNumbers) {

            if (!is_array($sms)) {
                throw new ClockworkException("sms parameter must be an array");
            }
            $single_message = $this->is_assoc($sms);

            if ($single_message) {
                $sms = array($sms);
            }

            foreach ($sms as &$recipient) {
                $recipient['to'] = $this->correctNumber($recipient['to']);
            }

        }

        return parent::send($sms);

    }

    public function batch($message, array $recipients, $checkNumbers = false)
    {

        foreach ($recipients as &$recipient) {
            $recipient['message'] = $message;
            if ($checkNumbers) {
                $recipient['to'] = $this->correctNumber($recipient['to']);
            }
        }

        return parent::send($recipients);
        
    }

    public function correctNumber($number, $country = false)
    {

        return $number;

        // if (!$countryCode) { $countryCode = Config::get('clockwork-sms::country'); }

        // $number = preg_replace('/(^0|\D)/', '', $number);

        // if (stripos($number, $countryCode))

        // return $number;

    }

}