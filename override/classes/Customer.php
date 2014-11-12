<?php

class Customer extends CustomerCore
{

	public static $isOverridenByMailChimpSync = true;

	public function update($nullValues = false)
	{
		$result = parent::update($nullValues);
		if ($result)
			Hook::exec('actionCustomerAccountUpdate', array('object' => $this));

		return $result;
	}
}

