<?php
require_once("InordLink.php");

class OrderResponse extends InordLink {
	private $VK_REC_ID;
	private $VK_T_NO;
	private $VK_AMOUNT;
	private $VK_CURR;
	private $VK_REC_ACC;
	private $VK_REC_NAME;
	private $VK_REC_REG_ID;
	private $VK_REC_SWIFT;
	private $VK_SND_ACC;
	private $VK_SND_NAME;
	private $VK_REF;
	private $VK_MSG;
	private $VK_T_DATE;
	private $VK_T_STATUS;

	function __construct($pPub, $pSndId, $pRecId, $pStamp, $pTNo, $pAmount, $pCurr, $pRecAcc, $pRecName, $pRecRegId, $pRrecSwift, $pSndAcc, $pSndName, $pRef, $pMsg, $pDate, $pStatus, $pMac, $pLang){
		$this->PUB_KEY_PATH = $pPub;
		$this->VK_SERVICE = "1102";
		$this->VK_SND_ID = $pSndId;
		$this->VK_REC_ID = $pRecId;
		$this->VK_STAMP = $pStamp;
		$this->VK_T_NO = $pTNo;
		$this->VK_AMOUNT = $pAmount;
		$this->VK_CURR = $pCurr;
		$this->VK_REC_ACC = $pRecAcc;
		$this->VK_REC_NAME = $pRecName;
		$this->VK_REC_REG_ID = $pRecRegId;
		$this->VK_REC_SWIFT = $pRrecSwift;
		$this->VK_SND_ACC = $pSndAcc;
		$this->VK_SND_NAME = $pSndName;
		$this->VK_REF = $pRef;
		$this->VK_MSG = $pMsg;
		$this->VK_T_DATE = $pDate;
		$this->VK_T_STATUS = $pStatus;
		$this->VK_MAC = $pMac;
		$this->VK_LANG = $pLang;
	}
	
	function decode(){
		return parent::decode();
	}

	function getData() {
		return 
			$this->formatValue($this->VK_SERVICE).
			$this->formatValue($this->VK_VERSION).
			$this->formatValue($this->VK_SND_ID).
			$this->formatValue($this->VK_REC_ID).
			$this->formatValue($this->VK_STAMP).
			$this->formatValue($this->VK_T_NO).
			$this->formatValue($this->VK_AMOUNT).
			$this->formatValue($this->VK_CURR).
			$this->formatValue($this->VK_REC_ACC).
			$this->formatValue($this->VK_REC_NAME).
			$this->formatValue($this->VK_REC_REG_ID).
			$this->formatValue($this->VK_REC_SWIFT).
			$this->formatValue($this->VK_SND_ACC).
			$this->formatValue($this->VK_SND_NAME).
			$this->formatValue($this->VK_REF).
			$this->formatValue($this->VK_MSG).
			$this->formatValue($this->VK_T_DATE).
			$this->formatValue($this->VK_T_STATUS);
	}

	function getVK_REC_ID(){
		return $this->VK_REC_ID;
	}

	function getVK_T_NO(){
		return $this->VK_T_NO;
	}

	function getVK_AMOUNT(){
		return $this->VK_AMOUNT;
	}

	function getVK_CURR(){
		return $this->VK_CURR;
	}

	function getVK_REC_ACC(){
		return $this->VK_REC_ACC;
	}

	function getVK_REC_NAME(){
		return $this->VK_REC_NAME;
	}

	function getVK_REC_REG_ID(){
		return $this->VK_REC_REG_ID;
	}

	function getVK_REC_SWIFT(){
		return $this->VK_REC_SWIFT;
	}

	function getVK_SND_ACC(){
		return $this->VK_SND_ACC;
	}

	function getVK_SND_NAME(){
		return $this->VK_SND_NAME;
	}

	function getVK_REF(){
		return $this->VK_REF;
	}

	function getVK_MSG(){
		return $this->VK_MSG;
	}

	function getVK_T_DATE(){
		return $this->VK_T_DATE;
	}

	function getVK_T_STATUS(){
		return $this->VK_T_STATUS;
	}
}
?>