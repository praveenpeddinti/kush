<?php


/**
 * Класс команды-примера устновки заданий.
 *
 * @author Evgeny Blinov <suresh.govindu@techo2.com>
 * @package PHPDocCrontab
 * @subpackage Go
 */
class RecycleCommand extends CConsoleCommand{
public function run($args)
    {

 $this->CreateCycle();
 $this->probationPeriodCheck();
 $this->complianceCert();
      echo 'Hello, world';
    }
    
    function CreateCycle(){
     $coadminService=new CoActiveAdminService();
     
        $coadminService->reCyclesForEmployerBySystem(); 
        
    }
    
       function probationPeriodCheck() {
        $coadminService = new CoActiveAdminService();
        $coadminService->probationPeriodCheck();
    }
       function complianceCert() {
        $coadminService = new CoActiveAdminService();
        $coadminService->complianceCert();
    }
    
    
}
