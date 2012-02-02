
package 
{

	
	import flash.events.*;
	
	
	import flash.display.MovieClip;
    import flash.net.NetConnection;
	import flash.net.Responder;
	import flash.net.FileReference;
	import flash.net.FileFilter;
	

	public class amftest extends MovieClip
	{
		var con:NetConnection = new NetConnection();
		// point it to the gateway controller (gateway.php in your application/controllers folder)
        var gateway:String = "http://amftestapp/index.php?r=amfGateway";
		var fileRef:FileReference = new FileReference();
       
		

public function print_a(obj:*, level:int = 0, output:String = ""):* {
    var tabs:String = "";
 for(var i:int = 0; i < level; i++)  tabs += "\t";
    
    for(var child:* in obj) {
        output += tabs +"["+ child +"] => "+ obj[child];
        
        var childOutput:String = print_a(obj[child], level+1);
        if(childOutput != '') output += ' {\n'+ childOutput + tabs +'}';
        
        output += "\n";
    }
    
    if(level == 0) trace(output);
    else return output;
 }
  

		public function amftest()
		{
			stop();
						
			/*Zend_AMF Test*/
			con.connect(gateway);
			con.call("TestService.getMessage", new Responder(onResult, onFault), "Hello World!", "hello 2!");
			//con.connect(gateway);
//			con.call("BakerMasterDbAmfService.load_test", new Responder(onResult, onFault), "flashuser", "12flash34", "Company");


		}
		
		/*Zend AMF Test*/
		function onResult(event:Object):void
       {
          trace('Result: ' + String(event));
		  print_a(event);

       }

       function onFault(event:Object):void
       {
          trace('Fault:' + String(event));
		  print_a(event);
       }
	}
	
}