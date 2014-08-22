<?php

class CarModels extends CActiveRecord {
    public $Id;
    public $make_id;
    public $model_name;
    public $status;
        
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    public function tableName() {
        return 'KG_Car_model';
    }
    public function getCarModels($makeId){
        try{
            $query="select count(*) as count from KG_Car_model where make_id=".$makeId;
            $result = Yii::app()->db->createCommand($query)->queryRow();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get Registered Contacts##############".$ex->getMessage());
        }
        return $result['count'];
    }
    public function getAllCarModels($makeId,$startLimit, $endLimit){
        try{            
            $query="select * from KG_Car_model where make_id=".$makeId." limit ".$startLimit.",".$endLimit;
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    } 
    public function ChangeModelStatus($id,$val){
        $result="failed";
       try{
           if($val==1)
                $query="update KG_Car_model set status=0 where id=".$id;
           else if ($val==0)
                $query="update KG_Car_model set status=1 where id=".$id;
           $result1 = YII::app()->db->createCommand($query)->execute();
           if($result1>0)
               $result = "success";
       } 
       catch (Exception $ex) {
           error_log("#########Exception occurred in changing status #########".$ex->getMessage());
       }
       return $result;
    }
    public function getModelDetails($id){
        try{
            $query="SELECT * FROM KG_Car_model where id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        }
        catch (Exception $ex) {
            error_log("getMakeDetailsById Exception occured==" . $ex->getMessage());
        }
        return $result;
    }
    public function checkNewModelExistInModelTable($model_name,$makeid){
        try {
            $result='';
            $newDetails = new CarModels();
            $user = CarModels::model()->findByAttributes(array(), 'model_name=:model_name and make_Id=:make_Id', array(':model_name' => $model_name,':make_Id'=>$makeid));
            if (empty($user)) { $result = "No model";} 
            else {
                $result = "Yes model";
            }
        } catch (Exception $ex) {
            error_log("############Error Occurred in Make get Details= #############" . $ex->getMessage());
        }
        return $result; 
    }
    public function UpdateModel($model){
        try{
            $query="Update KG_Car_model set model_name='".$model->model_name."' where id=".$model->id;
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in update model Details= #############" . $ex->getMessage());
        }
    }
    public function newModel($model,$makename){
        try{
            $query="INSERT INTO KG_Car_model (make_id,make_name,model_name) VALUES (".$model->make_name.",'".$makename."','".$model->model_name."')";
            error_log($query);
            $result = YII::app()->db->createCommand($query)->execute();
            if($result>0) return "success";
            else return "failure";
        } catch (Exception $ex) {
            error_log("############Error Occurred in Add new nodel Details= #############" . $ex->getMessage());
        }
    }

    public function getMakeNameByID($id){
        try{
            $query="select make_name from KG_Car_make where id=".$id;
            $result = YII::app()->db->createCommand($query)->queryRow();
        } catch (Exception $ex) {
            error_log("############Error Occurred in Get make name by Id #############" . $ex->getMessage());
        }
        return $result;
    }

    
    public function getAllModels() {
        try {
            $Criteria = new CDbCriteria();
            $Criteria->order = 'model_name ASC';
            $makesData = CarModels::model()->findAll($Criteria);
        } catch (Exception $ex) {
            
        }
        return $makesData;
    }
    
    public function getSelectedCarModels($makeName){
        try{            
            $query="select * from KG_Car_model where make_name='$makeName'";
            $result = Yii::app()->db->createCommand($query)->queryAll();
        }catch(Exception $ex){
            error_log("################Exception Occurred  get All Registered Contacts##############".$ex->getMessage());
        }
        return $result;
    }
}

?>
