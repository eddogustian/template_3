<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AppComponent extends CApplicationComponent {

    public static function get_user_menu() {
        
        $sql = "SELECT b.* FROM users_menu as a INNER JOIN menu as b ON a.menu_id = b.id 
                WHERE a.deleted = 0 AND b.deleted = 0 AND a.status = 1 AND b.visible = 1 AND a.user_id = ".Yii::app()->user->id." 
                ORDER BY b.menu_order";
        $get_data = Yii::app()->db->createCommand($sql)->queryAll();
        
        return $get_data;
    }

    public static function get_user_access($menu_name, $access) {
        
        $sql = "SELECT a.* FROM users_menu as a INNER JOIN menu as b ON a.menu_id = b.id 
                WHERE a.deleted = 0 AND b.deleted = 0 AND a.status = 1 AND a.user_id = ".Yii::app()->user->id." AND b.menu_name = '$menu_name' 
                ORDER BY b.menu_order";
        $get_data = Yii::app()->db->createCommand($sql)->queryAll();
        
        $user_access = 0;
        if (count($get_data) > 0) {
            foreach($get_data as $row){
                $user_access = $row[$access];
            }
        } 

        return $user_access;
    }

    public static function get_menu_icon_by_name($menu_name) {
        
        $sql = "SELECT * FROM menu 
                WHERE deleted = 0 AND menu_name = '$menu_name'";
        $get_data = Yii::app()->db->createCommand($sql)->queryAll();
        
        $menu_icon = 'icon-grid';
        if (count($get_data) > 0) {
            foreach($get_data as $row){
                $menu_icon = $row['menu_icon'];
            }
        } 

        return $menu_icon;
    }

}

?>
