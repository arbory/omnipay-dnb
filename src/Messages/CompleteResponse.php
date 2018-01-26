<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\DnbLink\Utils\Pizza;
use Symfony\Component\HttpFoundation\ParameterBag;

class CompleteResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        if (in_array($this->data['VK_T_STATUS'], [1, 2])) {
            return true;
        }
        return false;
    }

    /**
     * Checks if user has canceled transaction
     * Only way user can cancel transaction is via timeout, there are no other ways
     *
     * @return bool
     */
    public function isCancelled()
    {
        return $this->data['VK_T_STATUS'] == '3';
    }

    public function getMessage()
    {
        if($this->data['VK_T_STATUS'] == 3){
            return 'Paymant canceled by user';
        }
        return 'Unknown gateways error';
    }
}