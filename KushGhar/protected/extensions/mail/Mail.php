<?php



// Created by Khanh Nam
class Mail extends CApplicationComponent{
    public function init() {
        parent::init();
        try{
        $dir = dirname(__FILE__);
        error_log("#############################################3".dirname(__FILE__));
        $alias = md5($dir);
        Yii::setPathOfAlias($alias,$dir);
        Yii::import($alias.'.coActiveMailServer');
        error_log("#############################################3".dirname(__FILE__));
        }catch(Exception $ex){
    error_log("==========Error+_occurred-=====in sendMails====".$ex->getMessage());
}
    }
    public function sendmails($obj){
error_log("************in mail*************");
try{
     error_log("************in mail*************".dirname(__FILE__).'/coActiveMailServer.php');
   // include dirname(__FILE__).'/coActiveMailServer.php';
   
       return new coActiveMailServer($obj);
}catch(Exception $ex){
    error_log("==========Error+_occurred-=====in sendMails====".$ex->getMessage());
}
        
    }
}
?>

