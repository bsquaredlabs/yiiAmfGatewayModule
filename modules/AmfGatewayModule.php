<?php

/**
 * The module amf_gateway permits anyone to have a very easily configurable
 * RPC with Flash and Flex. The underlying AMF mechanism uses Zend AMF. This
 * module contains Zend AMF 1.1.8.
 * 
 * To add AMF functionality to your Yii project, just copy the amf_gateway folder
 * in the modules/ directory of your project and add the following to your 
 * 'modules' record in main.php:
 *  
 * 'modules' => array(
  'amf_gateway' => array(
  'servicesDirAlias' => 'application.services.amf',
  )
  ),
 * 
 * The servicesDirAlias is configurable by the user and specifies the directory
 * which contains the classes that will have RPC enabled.The default directory
 * is services/amf/ which by the way does not exist by default in Yii.Another
 * possible configuration might be 'servicesDirAlias' => 'application.models'
 * but sharing all your models with Flash/Flex may not be the most secure idea.
 * 
 * 
 * @author Vassilis Papapanagiotou
 * @version 0.1
 * @package application.modules.amf_gateway
 */
class AmfGatewayModule extends CWebModule {

    public $servicesDirAlias = 'application.services.amf';
    public $production = FALSE;

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'application.modules.amfGateway.models.*',
            'application.modules.amfGateway.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            
            return true;
        }
        else
            return false;
    }

}