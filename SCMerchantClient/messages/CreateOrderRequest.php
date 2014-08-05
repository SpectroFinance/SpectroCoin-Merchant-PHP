<?php

class CreateOrderRequest
{
	private $orderId;
	private $payCurrency;
	private $payAmount;
	private $receiveAmount;
	private $description;
	private $culture;
	private $callbackUrl;
	private $successUrl;
	private $failureUrl;

	/**
	 * @param $orderId
	 * @param $payAmount
	 * @param $receiveAmount
	 * @param $description
	 * @param $culture
	 * @param $callbackUrl
	 * @param $successUrl
	 * @param $failureUrl
	 * @param string $payCurrency
	 */
	function __construct($orderId, $payAmount, $receiveAmount, $description, $culture, $callbackUrl, $successUrl, $failureUrl, $payCurrency = 'BTC')
	{
		$this->orderId = $orderId;
		$this->payAmount = $payAmount;
		$this->receiveAmount = $receiveAmount;
		$this->description = $description;
		$this->culture = $culture;
		$this->callbackUrl = $callbackUrl;
		$this->successUrl = $successUrl;
		$this->failureUrl = $failureUrl;
		$this->payCurrency = $payCurrency;
	}

	/**
	 * @return string
	 */
	public function getPayAmount()
	{
		return FormattingUtil::formatCurrency($this->payAmount == null ? 0.0 : $this->payAmount);
	}

	/**
	 * @return string
	 */
	public function getPayCurrency()
	{
		return $this->payCurrency;
	}

	/**
	 * @return string
	 */
	public function getOrderId()
	{
		return $this->orderId == null ? '' : $this->orderId;
	}

	/**
	 * @return string
	 */
	public function getReceiveAmount()
	{
		return FormattingUtil::formatCurrency($this->receiveAmount == null ? 0.0 : $this->receiveAmount);
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description == null ? '' : $this->description;
	}

	/**
	 * @return string
	 */
	public function getCulture()
	{
		return $this->culture == null ? '' : $this->culture;
	}
	
	/**
	 * @return string
	 */
	public function getCallbackUrl()
	{
		return $this->callbackUrl == null ? '' : $this->callbackUrl;
	}

	/**
	 * @return string
	 */
	public function getSuccessUrl()
	{
		return $this->successUrl == null ? '' : $this->successUrl;
	}

	/**
	 * @return string
	 */
	public function getFailureUrl()
	{
		return $this->failureUrl == null ? '' : $this->failureUrl;
	}


}