<?php
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