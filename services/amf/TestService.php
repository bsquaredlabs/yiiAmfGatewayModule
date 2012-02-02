<?php
/*
* @author Vassilis Papapanagiotou <bpapapana@gmail.com>, Vassilis Triglianos <triglian@gmail.com>
* @link https://github.com/bsquaredlabs/YiiAmfGateway
* @copyright Copyright &copy; 2011 BSquaredLabs(http://bsquaredlabs.com),Vassilis Papapanagiotou & Vassilis Triglianos
* @license http://bsquaredlabs.com/licenses/YiiAmfGatewayLicense
*/

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