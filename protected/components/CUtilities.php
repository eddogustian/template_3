<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('Asia/Jakarta');

class CUtilities extends CApplicationComponent {

    public static function CheckAndParseDateFromDB($stringDate) {
        
        $date = CDateTimeParser::parse($stringDate, Yii::app()->params['dateDBParse']);
        if ((!empty($date))) {  //termasuk jika return not false
            $dataTanggal = date(Yii::app()->params['dateFormatPHP'], $date);
            return $dataTanggal;
        } else {
            return false;
        }
    }


    public static function CheckAndParseDateFromDBDateTime($stringDate) {

        $date = CDateTimeParser::parse($stringDate, Yii::app()->params['dateTimeDBParse']);
        if ((!empty($date))) {  //termasuk jika return not false
            $dataTanggal = date(Yii::app()->params['dateFormatPHP'], $date);
            return $dataTanggal;
        } else {
            return false;
        }
    }


    public static function CheckAndParseCustomFromDBDateTime($stringDate,$customFormat) {

        $date = CDateTimeParser::parse($stringDate, Yii::app()->params['dateTimeDBParse']);
        if ((!empty($date))) {  //termasuk jika return not false
            $dataTanggal = date($customFormat, $date);
            return $dataTanggal;
        } else {
            return false;
        }
    }

    public static function getDateFromDBFormat($stringDate) {

        $date = CDateTimeParser::parse($stringDate, Yii::app()->params['dateDBParse']);
        if ((!empty($date))) {  //termasuk jika return not false
            return $date;
        } else {
            return CDateTimeParser::parse(date("Y-m-d H:s"));
        }
    }

    public static function CheckAndParseDateTimeFromDB($stringDate) {

        $date = CDateTimeParser::parse($stringDate, Yii::app()->params['dateTimeDBParse']);       
        if ((!empty($date))) {  //termasuk jika return not false            
            $dataTanggal = date(Yii::app()->params['dateTimeFormatPHP'], $date);
            return $dataTanggal;
        } else {
            return false;
        }
    }

    public static function CheckAndFormatFromForm($stringDate) {

        $tanggal = CDateTimeParser::parse($stringDate, Yii::app()->params['dateToParse']);
        if (!empty($tanggal)) {
            $tanggal = date(Yii::app()->params['dateFormatPHPDB'], $tanggal);
            return $tanggal;
        } else {
            return null;
        }
    }

    public static function CheckAndFormatFromFormCustom($stringDate,$formatFrom) {

        if (empty($formatFrom)){
            $formatFrom = Yii::app()->params['dateToParse'];
        }
        
        $tanggal = CDateTimeParser::parse($stringDate, $formatFrom);
        if (!empty($tanggal)) {
            $tanggal = date(Yii::app()->params['dateFormatPHPDB'], $tanggal);
            return $tanggal;
        } else {
            return null;
        }
    }

    public static function CheckAndFormatDateTimeFromFormCustom($stringDate,$formatFrom) {

        if (empty($formatFrom)){
            $formatFrom = Yii::app()->params['dateToParse'];
        }
        
        $tanggal = CDateTimeParser::parse($stringDate, $formatFrom);
        if (!empty($tanggal)) {
            $tanggal = date(Yii::app()->params['dateTimeFormatPHPDB'], $tanggal);
            return $tanggal;
        } else {
            return null;
        }
    }

    public static function getCurrentDateTimeDBFormat() {

        $tanggal = date(Yii::app()->params['dateTimeFormatPHPDB']);
        //Yii::log($tanggal,"warning");
        return $tanggal;
    }


    public static function generateId() {
        usleep(1);
        $myarr = gettimeofday();
        $ID = "";
        foreach ($myarr as $indek => $nilai) {
            $ID = $ID . $nilai;
        }

        $ID = str_replace("-", "", $ID);
        $ID = str_replace(".", "", $ID);
        $ID = str_replace(",", "", $ID);
        return $ID;
    }


    // public static function generateCounter($initial="",$resetBy="d",$digit=20){

    //     $db = Yii::app()->db;
    //     $command = $db->createCommand("LOCK TABLES `counter` WRITE;")->execute();  
    //     //AC.01.042013.00000001
    //     try{
            
    //         if ($resetBy == "m"){
    //             $data = $db->createCommand('SELECT `counter`.`id`, MONTH(`counter`.`last_update`) as month FROM `counter`')->queryRow();
    //             $dataID = $data["id"];
    //             $date = intval($data["month"]);
    //             $now = intval(date('n'));
    //         }else{

    //             $data = $db->createCommand('SELECT `counter`.`id`, DAY(`counter`.`last_update`) as day FROM `counter`')->queryRow();
    //             $dataID = $data["id"];
    //             $date = intval($data["day"]);
    //             $now = intval(date('j'));
    //         }

    //         if ((empty($dataID)) || ($date != $now) ){
    //             $command = $db->createCommand("UNLOCK TABLES")->execute();
    //             //set auto commit .. tidak menggunakan begin transaction 
    //             CUtilities::setAutoCommit(0);
    //             //create new lock transaction 
    //             $dataID = $db->createCommand('TRUNCATE TABLE `counter`')->execute();
    //             $command = $db->createCommand("LOCK TABLES `counter` WRITE;")->execute();
    //             $dataID = $db->createCommand('INSERT INTO `counter` VALUES(1,NOW())')->execute();
    //             $data = $db->createCommand('SELECT `counter`.`id`, DAY(`counter`.`last_update`) as day FROM `counter`')->queryRow();
    //             $dataID = $data["id"];
    //             $date = $data["day"];
                
    //             CUtilities::setAutoCommit(1);

    //         }

    //         $newID = $dataID + 1;
    //         $dataID = $db->createCommand('UPDATE `counter` SET `id`='. $newID .', last_update=NOW() WHERE `id`= '.$dataID.'')->execute();            
    //         //UNLOCK TABLES
    //         $command = $db->createCommand("UNLOCK TABLES")->execute();
    
    //     }catch(Exception $e) {
    //         print_r($e);
    //         $command = $db->createCommand("UNLOCK TABLES")->execute();
    //         throw new CHttpException(400,'Fail to generate code. Please contact system administrator.');
    //     }

    //     $s = $newID;
    //     $initLength = strlen($initial);
    //     $digit = $digit - $initLength;

    //     if ($resetBy == "m"){
    //         $digit = $digit - 6;
    //         $xId = sprintf("%0".$digit."s",$newID);
    //         $newID = $initial . date('Ym') . $xId;
    //     }else{
    //         $digit = $digit - 8;
    //         $xId = sprintf("%0".$digit."s", $newID);
    //         $newID = $initial . date('Ymd') . $xId;
    //     }
    //     return $newID;
        

    // }

    public static function setAutoCommit($val = 0){
        $db = Yii::app()->db;
        $dataID = $db->createCommand('SET autocommit='.$val)->execute();
    }


    public static function beginTransaction(){
        $db = Yii::app()->db;
        $dataID = $db->createCommand('START TRANSACTION')->execute();
        $dataID = $db->createCommand('SET autocommit=0')->execute();
    }

    public static function commitTransaction(){
        $db = Yii::app()->db;
        $dataID = $db->createCommand('COMMIT')->execute();
        $dataID = $db->createCommand('SET autocommit=1')->execute();
    }

    public static function rollbackTransaction(){
        $db = Yii::app()->db;
        $dataID = $db->createCommand('ROLLBACK')->execute();
        $dataID = $db->createCommand('SET autocommit=1')->execute();
    }

    //tidak boleh digunakan di dalam block transaction 

    public static function generateCounter($initial="",$resetBy="d",$digit=20, $reset = true){

        $withDate = false;

        $db = Yii::app()->db;
        // $currentTransaction = $db->getCurrentTransaction();
        // $transactionActive = false;
        // if (is_null($currentTransaction)){
        //     $transactionActive = false;
        // }else{
        //     if ($currentTransaction instanceof CDbTransaction){
        //         $transactionActive = $currentTransaction->active;
        //     } else {
        //         $transactionActive = false;
        //     }
        // }

        $command = $db->createCommand("LOCK TABLES `counter_by_symbol` WRITE;")->execute();  
        //AC.01.042013.00000001
        try{
            
            if ($reset){
                $withDate = true;
                if ($resetBy == "m"){
                    $data = $db->createCommand('SELECT `counter_by_symbol`.`prefix`, `counter_by_symbol`.`value`, MONTH(`counter_by_symbol`.`last_update`) as month FROM `counter_by_symbol` 
                        WHERE `counter_by_symbol`.`prefix` = \''.$initial.'\'

                        ')->queryRow();

                    $dataID = $data["value"];
                    $date = intval($data["month"]);
                    $prefix = $data["prefix"];
                    $now = intval(date('n'));

                }else{

                    $data = $db->createCommand('SELECT `counter_by_symbol`.`prefix`,`counter_by_symbol`.`value`, DAY(`counter_by_symbol`.`last_update`) as day FROM `counter_by_symbol`
                        WHERE `counter_by_symbol`.`prefix` = \''.$initial.'\'

                        ')->queryRow();
                    $dataID = $data["value"];
                    $date = intval($data["day"]);
                    $prefix = $data["prefix"];
                    $now = intval(date('j'));
                }


            }else{
                $withDate = false;
                //jika tanpa reset maka akan langsung namabah 
                //jika data kosong maka akan diinsert 
                $data = $db->createCommand('SELECT `counter_by_symbol`.`prefix`, `counter_by_symbol`.`value`, MONTH(`counter_by_symbol`.`last_update`) as month FROM `counter_by_symbol` 
                        WHERE `counter_by_symbol`.`prefix` = \''.$initial.'\'
                        ')->queryRow();


                $dataID = $data["value"];
                $date = intval($data["month"]);
                $prefix = $data["prefix"];
                $now = $date;

            }
            


            if ((empty($dataID)) || ($date != $now) ){
                //$command = $db->createCommand("UNLOCK TABLES")->execute();
                //set auto commit .. tidak menggunakan begin transaction 
                //CUtilities::setAutoCommit(0);
                //create new lock transaction 
                // $dataID = $db->createCommand('TRUNCATE TABLE `counter_by_symbol`')->execute();
                // $command = $db->createCommand("LOCK TABLES `counter_by_symbol` WRITE;")->execute();

                $data = $db->createCommand('SELECT * FROM `counter_by_symbol`
                    WHERE `counter_by_symbol`.`prefix` = \''.$initial.'\'
                    ')->queryRow();

                if (!$data){ //data kosong
                    $dataID = $db->createCommand('INSERT INTO `counter_by_symbol` VALUES(\''.$initial.'\',0,NOW())')->execute();
                }else{
                    $dataID = $db->createCommand('UPDATE `counter_by_symbol` SET `value` = 0  WHERE `prefix`= \''.$initial.'\'')->execute();
                }
                
                $data = $db->createCommand('SELECT  `counter_by_symbol`.`prefix`, `counter_by_symbol`.`value`, DAY(`counter_by_symbol`.`last_update`) as day FROM `counter_by_symbol`
                    WHERE `prefix`= \''.$initial.'\'
                    ')->queryRow();

                $dataID = $data["value"];
                $date = $data["day"];
                $prefix = $data["prefix"];
                
                //CUtilities::setAutoCommit(1);

            }

            $newID = $dataID + 1;
            $dataID = $db->createCommand('UPDATE `counter_by_symbol` SET `value`='. $newID .', last_update=NOW() WHERE `prefix`= \''.$initial.'\'')->execute();    

            //UNLOCK TABLES
            // if ($transactionActive){
            //     $command = $db->createCommand("UNLOCK TABLES")->execute(); 
            // }else{
            //     //tidak di unlock karena dalam transaksi 
            // }
            
            $command = $db->createCommand("UNLOCK TABLES")->execute();  
    
        }catch(Exception $e) {
            print_r($e);
            $command = $db->createCommand("UNLOCK TABLES")->execute();
            throw new CHttpException(400,'Fail to generate code. Please contact system administrator.');
        }

        $s = $newID;
        $initLength = strlen($initial);
        $digit = $digit - $initLength;

        if ($withDate){
            if ($resetBy == "m"){
                $digit = $digit - 6;
                $xId = sprintf("%0".$digit."s",$newID);
                $newID = $initial . date('Ym') . $xId;
            }else{
                $digit = $digit - 8;
                $xId = sprintf("%0".$digit."s", $newID);
                $newID = $initial . date('Ymd') . $xId;
            }
        }else{

            $digit = $digit;
            $xId = sprintf("%0".$digit."s", $newID);
            $newID = $initial . $xId;
        }
        
        return $newID;
        

    }


    public static function arrayErrorToString($errorsData = array()){
        $return = "";
        if (is_array($errorsData)){
            foreach ($errorsData as $key => $value) {
                # code...
                $return .= "[".$key."]";
                if (is_array($value)){
                    foreach ($value as $keyData => $valueData) {
                        # code...
                        $return .= "[".$keyData."]".$valueData .";";
                    }
                }
            }
        }

        return $return;

    }


    public static function saveImageFromString($string,$path,$pathThumb,&$name){
        
        if (!empty($string)){

            $data = base64_decode($string);
            if (!$data){
                return false;
            }else{
                error_reporting(0);
                $im = imagecreatefromstring($data);
                if (!$im){
                    return false;
                }else{

                    $fileName = $path ."/".$name.".jpg";
                    $thumbnailName = $pathThumb ."/".$name.".jpg";

                    if (imagejpeg($im,$fileName,100)){
                        imagedestroy($im);
                        $image = Yii::app()->image->load($fileName);
                        $imgWidth = $image->width;
                        $imgHeight = $image->height;
                        
                        if ($imgWidth < $imgHeight){
                            $image->resize(100, 100, Image::WIDTH)->quality(100);
                        }else{
                            $image->resize(100, 100, Image::HEIGHT)->quality(100);
                        }

                        $name = $name.".jpg";

                        //$image->crop(100,100);
                        if (empty($pathThumb) == false) {
                            $image->save($thumbnailName,0775);
                        }

                        return true;
                    }else{
                        return false;
                    }

                }
            }

        }else{
            return true;
        }
        

    }

    public  static function imageToString64($fileName,&$result){
        $result = "";
        if (!empty($fileName)){
            if (is_file($fileName)){
                if($fp = fopen($fileName,"rb", 0)) 
                { 
                    $img = fread($fp,filesize($fileName)); 
                    fclose($fp); 
                    $result = chunk_split(base64_encode($img));
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    public static function buildStringInCondition($dataArray= array()){
        $returnString = "";
        if (is_array($dataArray)){
            $arTemp = array();
            foreach ($dataArray as $key => $value) {
                 $arTemp[] = "'".$value."'";
            }
            return implode(",", $arTemp);
        }else{
            return "";
        }
    }

}

?>
