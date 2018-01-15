<?php

abstract class InordLink {
	protected $VK_SERVICE;
	protected $VK_VERSION = "101";
	protected $VK_SND_ID;
	protected $VK_STAMP;
	protected $VK_MAC;
	protected $VK_LANG;
	protected $PRV_KEY_PATH;
	protected $PUB_KEY_PATH;
	
	private function getPrivateKeyPath(){
		return $this->PRV_KEY_PATH;
	}

	private function getPublicKeyPath(){
		return $this->PUB_KEY_PATH;
	}

	function getVK_SERVICE() {
		return $this->VK_SERVICE;
	}

	function getVK_VERSION() {
		return $this->VK_VERSION;
	}

	function getVK_SND_ID() {
		return $this->VK_SND_ID;
	}

	function getVK_STAMP() {
		return $this->VK_STAMP;
	}

	function getVK_MAC() {
		return $this->VK_MAC;
	}

	function getVK_LANG() {
		return $this->VK_LANG;
	}

	protected function formatValue($pValue) {
		$len = mb_strlen($pValue, 'UTF-8');
		if (strlen($len) == 1) {
			$len = "00".$len;
		} else if (strlen($len) == 2) {
			$len = "0".$len;
		}
		return $len.$pValue;
	}

	protected function decode() {
		try {
			// fetch public key from certificate and ready it
			$fp = fopen($this->getPublicKeyPath(), "r");

			$cert = fread($fp, 8192);
			fclose($fp);
			$pubkeyid = openssl_get_publickey($cert);

			// state whether signature is okay or not
			$ok = openssl_verify($this->getData(), base64_decode($this -> VK_MAC), $pubkeyid);

			openssl_free_key($pubkeyid);
			if ($ok == 1) {
				 return true;
			} else {
				 return false;
			}
		} catch (Exception $e) {
			print("Caught exception: $e->getMessage()");
		}
	}

	protected function encode() {
		$fp = fopen($this->getPrivateKeyPath(), "r");
        $priv_key = fread($fp, 8192);
        fclose($fp);
        
        $pkeyid = openssl_get_privatekey($priv_key);
        openssl_sign($this->getData(), $mySignature, $pkeyid);
        openssl_free_key($pkeyid);
        
        $mySignature = base64_encode($mySignature);

		return $mySignature;
	}

	abstract protected function getData();
}
?>