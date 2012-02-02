<?php
/*
* @author Vassilis Papapanagiotou <bpapapana@gmail.com>, Vassilis Triglianos <triglian@gmail.com>
* @link https://github.com/bsquaredlabs/YiiAmfGateway
* @copyright Copyright &copy; 2011 BSquaredLabs(http://bsquaredlabs.com),Vassilis Papapanagiotou & Vassilis Triglianos
* @license http://bsquaredlabs.com/licenses/YiiAmfGatewayLicense
*/

Yii::import('application.modules.amf_gateway.components.*');
Yii::import('application.modules.amf_gateway.controllers.DefaultController');

class DefaultControllerTest extends CTestCase {
	
	public function testActionIndex() {
		$amfGateway = new DefaultController();
		$this->assertNotNull($amfGateway);
		$amfGateway->actionIndex();
		$servicesFolder = Yii::getPathOfAlias(
			Yii::app()->getModule('amf_gateway')->servicesDirAlias);
		$this->assertEquals($amfGateway->getServicesDir(), $servicesFolder);
		
	}
}