<?php
/*
* @author Vassilis Papapanagiotou <bpapapana@gmail.com>, Vassilis Triglianos <triglian@gmail.com>
* @link https://github.com/bsquaredlabs/YiiAmfGateway
* @copyright Copyright &copy; 2011 BSquaredLabs(http://bsquaredlabs.com),Vassilis Papapanagiotou & Vassilis Triglianos
* @license http://bsquaredlabs.com/licenses/YiiAmfGatewayLicense
*/

Yii::import('application.modules.amfGateway.vendors.*');
require_once 'Zend/Loader/Autoloader.php';
spl_autoload_unregister(array('YiiBase', 'autoload'));
spl_autoload_register(array('Zend_Loader_Autoloader', 'autoload'));
spl_autoload_register(array('YiiBase', 'autoload'));
Yii::import("application.modules.amfGateway.vendors.Zend.Amf.Server", true);

/**
 * Basic Zend AMF server class
 * This class provides the basic structure for creating an AMF controller.
 * To use it you have to extend it and declare the servicesDir in which the
 * AMF services are placed. Then handle should be called. E.g.
 * $this->setServicesDir(
 * 
 * Porting, Coupling & Dependencies:
 * This class is coupled with Zend AMF. To port it copy Zend AMF library
 * directory in the protected/vendors/ directory and this file in the 
 * protected/components/ directory and you are done.
 * 
 * @author Vassilis Papapanagiotou
 * @version 0.1
 * @package application.components
 */
abstract class AmfController extends CController
{

	private $server;
	private $servicesDir = '';
	private $productionMode = FALSE;

	public function __construct()
	{
		$this->server = new Zend_Amf_Server();
	}

	public function getServicesDir()
	{
		return $this->servicesDir;
	}

	public function setServicesDir($servicesDir)
	{
		if (is_dir($servicesDir)) {
			$this->servicesDir = $servicesDir;
		} else {
			throw new CException("servicesDir defined as '{$servicesDir}' cannot be found");
		}
	}

	public function getProductionMode()
	{
		return $this->productionMode;
	}

	public function setProductionMode($productionMode)
	{
		$this->productionMode = $productionMode;
	}

	public function handle($servicesDir = NULL)
	{
		if ($servicesDir !== NULL) {
			$this->setServicesDir($servicesDir);
		}
		$this->server->addDirectory($this->servicesDir);
		//Yii::trace('Zend AMF was called!');
		$this->server->setProduction($this->productionMode);
		echo $this->server->handle();
	}

}