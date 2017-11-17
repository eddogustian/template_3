<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property integer $menu_order
 * @property string $menu_name
 * @property string $menu_url
 * @property string $menu_icon
 * @property integer $parent_menu_id
 * @property integer $visible
 * @property integer $user_created
 * @property string $time_created
 * @property integer $user_modified
 * @property string $time_modified
 * @property integer $deleted
 */
class MenuMdl extends Menu
{
	 
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuMdl the static model class
	 */
	 public static function model($className=__CLASS__)
	 {
		 return parent::model($className);
	 }

		 /**
	  * @return array relational rules.
	  */
	 public function relations()
	  {
		  // NOTE: you may need to adjust the relation name and the related
		  // class name for the relations automatically generated below.
		  $arRel = parent::relations();
		  $arRel["users"] = array(self::BELONGS_TO, 'Users', 'user_created');
		  return $arRel;
	 }
  
	 function behaviors()
	 {
		 return array(
			 'trash'=>array(
				 'class'=>'ext.ETrashBinBehavior',
				 // Deletion flag table column name (required)
				 'trashFlagField'=>'deleted',
				 // Value that is written to $trashFlagField when model is deleted
				 // Default is 1
				 'removedFlag'=>1,
				 // Value that is written to $trashFlagField when model is restored
				 // Default is 0
				 'restoredFlag'=>0,
			 ),
		 );
	 }
 
	 public function beforeSave()
	 {
		 if(parent::beforeSave())
		 {
			 if($this->isNewRecord)
			 {
				 $this->user_created = Yii::app()->user->id;
				 $this->time_created = date('Y-m-d H:i:s');
				 $this->user_modified = 0;
				 $this->time_modified = '0000-00-00 00:00:00';
			 }
			 else{
				 $this->user_modified = Yii::app()->user->id;
				 $this->time_modified = date('Y-m-d H:i:s');
			 }
			 return true;
		 }
		 else
			 return false;
	 }

	 public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'visible' => array(
				'' => MenuModule::t(''),
				'0' => MenuModule::t('No'),
				'1' => MenuModule::t('Yes'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
	 public function search()
	 {
		 // @todo Please modify the following code to remove attributes that should not be searched.
 
		 $criteria=new CDbCriteria;
 
		 $criteria->compare('id',$this->id);
		 $criteria->compare('menu_order',$this->menu_order);
		 $criteria->compare('menu_name',$this->menu_name,true);
		 $criteria->compare('menu_url',$this->menu_url,true);
		 $criteria->compare('menu_icon',$this->menu_icon,true);
		 $criteria->compare('parent_menu_id',$this->parent_menu_id);
		 $criteria->compare('visible',$this->visible);
		 $criteria->compare('user_created',$this->user_created);
		 $criteria->compare('time_created',$this->time_created,true);
		 $criteria->compare('user_modified',$this->user_modified);
		 $criteria->compare('time_modified',$this->time_modified,true);
		 $criteria->compare('deleted',$this->deleted);
 
		 return new CActiveDataProvider($this, array(
			 'criteria'=>$criteria,
			 'sort'=>array(
					'defaultOrder'=>'menu_name ASC',
			 )
		 ));
	 }
 
}
