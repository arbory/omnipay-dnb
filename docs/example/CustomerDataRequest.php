<?php
require_once("InordLink.php");

class CustomerDataRequest extends InordLink {
	private $VK_RETURN;

	function __construct($pPriv, $pSndId, $pStamp, $pReturn, $pLang){
		$this->PRV_KEY_PATH = $pPriv;
		$this->VK_SERVICE = "3001";
		$this->VK_STAMP = $pStamp;
		$this->VK_SND_ID = $pSndId;
		$this->VK_RETURN = $pReturn;
		$this->VK_LANG = $pLang;
		$this->VK_MAC = $this->encode();
	}

	function getData() {
		return 
			$this->formatValue($this->VK_SERVICE).
			$this->formatValue($this->VK_VERSION).
			$this->formatValue($this->VK_SND_ID).
			$this->formatValue($this->VK_STAMP).
			$this->formatValue($this->VK_RETURN);
	}

	
	function getVK_RETURN(){
		return $this->VK_RETURN;
	}
}
?>