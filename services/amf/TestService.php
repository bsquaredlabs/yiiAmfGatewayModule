<?php
Yii::import('application.services.amf.*');

class TestService
{
	/**
	 *
	 * @param string $recvString
	 * @param string $recvStr2
	 * @return string 
	 */
	public function getMessage($recvString = '', $recvStr2 = '')
	{
		return "Yii Hello from " . __Class__ . " php received: {$recvString}, {$recvStr2}"; // Hello from Testservice
	}
}