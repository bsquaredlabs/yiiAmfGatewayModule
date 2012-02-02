<?php
/**
 * This is the class-gateway to php-actionscript
 * @author Vassilis Papapanagiotou
 * @version 0.1
 * @package application.controllers
 */
class DefaultController extends AmfController
{
	public function actionIndex() {
          	$productionMode = Yii::app()->getModule('amfGateway')->production;
		$this->setProductionMode($productionMode);
		$servicesFolder = Yii::getPathOfAlias(
			Yii::app()->getModule('amfGateway')->servicesDirAlias);
		$this->handle($servicesFolder);
		return $servicesFolder;
	}	
}