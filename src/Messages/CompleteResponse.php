<?php

namespace Omnipay\DnbLink\Messages;

use Omnipay\DnbLink\Utils\Pizza;
use Symfony\Component\HttpFoundation\ParameterBag;

class CompleteResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        try {
            $this->verifyResponse();
            if (in_array($this->data['VK_T_STATUS'], [1, 2])) {
                return true;
            }

        } catch (\Exception $e) {
            //nothing here, only errors are further left..
        }

        return false;
    }

    public function getMessage()
    {
        try{
            $this->verifyResponse();
        }catch (\Exception $e){
            return $e->getMessage();
        }
        if($this->data['VK_T_STATUS'] == 3){
            return 'Paymant canceled by user';
        }
        return 'Unknown  error';
    }

    /**
     * array with required response keys, boolean shows if field used for control code calculation
     * @var array
     */
    protected $responseKeys = [
        'VK_SERVICE' => true,
        'VK_VERSION' => true,
        'VK_SND_ID' => true,
        'VK_REC_ID' => true,
        'VK_STAMP' => true,
        'VK_T_NO' => true,
        'VK_AMOUNT' => true,
        'VK_CURR' => true,
        'VK_REC_ACC' => true,
        'VK_REC_NAME' => true,
        'VK_SND_ACC' => true,
        'VK_SND_NAME' => true,
        'VK_REF' => true,
        'VK_MSG' => true,
        'VK_T_DATE' => true,
        'VK_MAC' => false,
        'VK_LANG' => false,
        'VK_AUTO' => false,
        'VK_ENCODING' => false
    ];

    /**
     * @return bool
     * @throws \Exception
     */
    protected function verifyResponse()
    {
        $responseData = new ParameterBag($this->data);
        if (in_array($responseData->get('VK_SERVICE'), ['1102'])) {

            // Get keys that are required for control code generation
            $controlCodeKeys = array_filter($this->responseKeys, function ($val) {
                return $val;
            });

            // Get control code required fields with values
            $controlCodeFields = array_intersect_key($responseData->all(), $controlCodeKeys);

            if (count($controlCodeFields) != count($controlCodeKeys)) {
                throw new \Exception('Required fields are missing in response');
            }

            //If you are testing requests by spoofing manually bank response, don't forget to url encode VK_MAC value
            //https://stackoverflow.com/questions/5628738/strange-base64-encode-decode-problem
            //$test = Pizza::test($controlCodeFields, $this->getCertificatePath(), $this->getEncoding());

            if (!Pizza::isValidControlCode($controlCodeFields, $responseData->get('VK_MAC'),
                $this->getCertificatePath(), $this->getEncoding())) {
                throw new \Exception('Invalid control code');
            }
        } else {
            throw new \Exception('Unsupported VK_SERVICE in response');
        }

        return true;
    }
}