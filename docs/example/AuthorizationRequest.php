<?php
require_once("InordLink.php");

class AuthorizationRequest extends InordLink {
	private $VK_REC_ID;
	private $VK_T_NO;
	private $VK_PER_CODE;
	private $VK_PER_FNAME;
	private $VK_PER_LNAME;
	private $VK_COM_CODE;
	private $VK_COM_NAME;
	private $VK_TIME;


	function __construct($pPub, $pSndId, $pRecId, $pStamp, $pTNo, $pPerCode, $pPerFname, $pPerLname, $pComCode, $pComName, $pTime, $pMac, $pLang){
		$this->PUB_KEY_PATH = $pPub;
		$this->VK_SERVICE = "2001";
		$this->VK_STAMP = $pStamp;
		$this->VK_SND_ID = $pSndId;
		$this->VK_LANG = $pLang;
		$this->VK_REC_ID = $pRecId;
		$this->VK_T_NO = $pTNo;
		$this->VK_PER_CODE = $pPerCode;
		$this->VK_PER_FNAME = $pPerFname;
		$this->VK_PER_LNAME = $pPerLname;
		$this->VK_COM_CODE = $pComCode;
		$this->VK_COM_NAME = $pComName;
		$this->VK_TIME = $pTime;
		$this->VK_MAC = $pMac;
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
			$this->formatValue($this->VK_PER_CODE).
			$this->formatValue($this->VK_PER_FNAME).
			$this->formatValue($this->VK_PER_LNAME).
			$this->formatValue($this->VK_COM_CODE).
			$this->formatValue($this->VK_COM_NAME).
			$this->formatValue($this->VK_TIME);

	}

	function getVK_REC_ID(){
		return $this->VK_REC_ID;
	}

	function getVK_T_NO(){
		return $this->VK_T_NO;
	}

	function getVK_PER_CODE(){
		return $this->VK_PER_CODE;
	}

	function getVK_PER_FNAME(){
		return $this->VK_PER_FNAME;
	}

	function getVK_PER_LNAME(){
		return $this->VK_PER_LNAME;
	}

	function getVK_COM_CODE(){
		return $this->VK_COM_CODE;
	}

	function getVK_COM_NAME(){
		return $this->VK_COM_NAME;
	}

	function getVK_TIME(){
		return $this->VK_TIME;
	}
}
?>