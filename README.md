# Zend AMF Yii module

The module amfGateway permits anyone to have a very easily configurable
RPC with Flash and Flex. 
 
## Features
 
This Yii module uses `Zend AMF` to communicate with `Flash`or `Flex` applications.
 
## Setting up and usage 

To use the module follow these steps:

1. Make sure you have a `modules` folder in your protected folder of your Yii
application. If not create it. 
2. Inside the modules directory copy the `modules/amfGateway` folder provided 
by this repository.
3. Now you have to enable the module in your Yii application. Open the file
`protected/config/main.php` and in the `modules` section add

```php
'modules' => array(
  'amfGateway' => array(
    'servicesDirAlias' => 'application.services.amf',
    'production' => TRUE,
   )
),
```
Now your gateway for AMF is found at `http://yiiurl?r=amfGateway`. The classes and
methods that are exposed to Flash/Flex are found in the `application.services.amf`
directory which essentially is `protected/services/amf`. You can find an example
in the `services/amf/TestService.php` file that is provided.

If you have any problem while setting it up and you want to see more error messages,
change the 'production' parameter seen above to FALSE.

Zend AMF is located in the vendors/ folder inside the module folder. If it is
not up-to-date can be easily updated by downloading Zend AMF from 
`http://framework.zend.com/download/amf` and then extracting the Zend folder
directly into the Zend folder.
 
## Demo

You can view a demo live at: TODO
 
There is a flash example in the folder flash_demo. To make it work make sure you
setup the module as described above. Then copy the services folder in the yii
protected/ folder. After that go to amftest.as and change the following line
 
```actionscript
 var gateway:String = "http://amftestapp/index.php?r=amfGateway";
```
 
to make sure it points to the right URL according to your computer.
You can now run amftest.fla and see in the console the results.