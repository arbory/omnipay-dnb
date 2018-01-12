<?php
require_once("InordLink.php");

class OrderRequest extends InordLink {
	private $VK_AMOUNT;
	private $VK_CURR;
	private $VK_MSG;
	private $VK_ACC;
	private $VK_NAME;
	private $VK_REG_ID;
	private $VK_SWIFT;
	private $VK_REF;
	private $VK_RETURN;
	private $VK_RETURN2;
	private $VK_TIME_LIMIT;

	function __construct($pPriv, $pSndId, $pStamp, $pAmount, $pCurr, $pAcc, $pName, $pRegId, $pSwift, $pRef, $pMsg, $pReturn, $pReturn2, $pTimeLimit, $pLang){
		$this->PRV_KEY_PATH = $pPriv;
		$this->VK_SERVICE = "1002";
		$this->VK_AMOUNT = $pAmount;
		$this->VK_CURR = $pCurr;
		$this->VK_MSG = $pMsg;
		$this->VK_ACC = $pAcc;
		$this->VK_NAME = $pName;
		$this->VK_STAMP = $pStamp;
		$this->VK_REG_ID = $pRegId;
		$this->VK_SND_ID = $pSndId;
		$this->VK_SWIFT = $pSwift;
		$this->VK_REF = $pRef;
		$this->VK_RETURN = $pReturn;
		$this->VK_RETURN2 = $pReturn2;
		$this->VK_TIME_LIMIT = $pTimeLimit;
		$this->VK_LANG = $pLang;
		$this->VK_MAC = $this->encode();
	}

	function getData() {
		return 
			$this->formatValue($this->VK_SERVICE).
			$this->formatValue($this->VK_VERSION).
			$this->formatValue($this->VK_SND_ID).
			$this->formatValue($this->VK_STAMP).
			$this->formatValue($this->VK_AMOUNT).
			$this->formatValue($this->VK_CURR).
			$this->formatValue($this->VK_ACC).
			$this->formatValue($this->VK_NAME).
			$this->formatValue($this->VK_REG_ID).
			$this->formatValue($this->VK_SWIFT).
			$this->formatValue($this->VK_REF).
			$this->formatValue($this->VK_MSG).
			$this->formatValue($this->VK_RETURN).
			$this->formatValue($this->VK_RETURN2);
	}

	function getVK_AMOUNT(){
		return $this->VK_AMOUNT;	
	}

	function getVK_CURR(){
		return $this->VK_CURR;
	}

	function getVK_MSG(){
		return $this->VK_MSG;
	}

	function getVK_ACC(){
		return $this->VK_ACC;
	}

	function getVK_NAME(){
		return $this->VK_NAME;
	}

	function getVK_REG_ID(){
		return $this->VK_REG_ID;
	}

	function getVK_SWIFT(){
		return $this->VK_SWIFT;
	}

	function getVK_REF(){
		return $this->VK_REF;
	}

	function getVK_RETURN(){
		return $this->VK_RETURN;
	}

	function getVK_RETURN2(){
		return $this->VK_RETURN2;
	}

	function getVK_TIME_LIMIT(){
		return $this->VK_TIME_LIMIT;
	}
}
?>