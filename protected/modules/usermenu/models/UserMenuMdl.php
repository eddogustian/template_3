<?php

/**
 * This is the model class for table "users_menu".
 *
 * The followings are the available columns in table 'users_menu':
 * @property integer $id
 * @property integer $user_id
 * @property integer $menu_id
 * @property integer $create
 * @property integer $update
 * @property integer $delete
 * @property integer $verify
 * @property integer $print
 * @property integer $status
 * @property integer $user_created
 * @property string $time_created
 * @property integer $user_modified
 * @property string $time_modified
 * @property integer $deleted
 */
class UserMenuMdl extends UserMenu
{
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserMenuMdl the static model class
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
		 $arRel["users"] = array(self::BELONGS_TO, 'User', 'user_id');
		 $arRel["menu"] = array(self::BELONGS_TO, 'Menu', 'menu_id');
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
		$sql = "SELECT id, username FROM users WHERE status = 1 ORDER BY username";
		$get_data = Yii::app()->db->createCommand($sql)->queryAll();
		$get_data_user = array('' => '');
		if (count(($get_data) > 0)) {
			foreach($get_data as $row){
				$get_data_user[$row['id']] = ucwords($row['username']);
			}
		}

		$sql = "SELECT id, menu_name FROM menu WHERE deleted = 0 ORDER BY menu_name";
		$get_data = Yii::app()->db->createCommand($sql)->queryAll();
		$get_data_menu = array('' => '');
		if (count(($get_data) > 0)) {
			foreach($get_data as $row){
				$get_data_menu[$row['id']] = ucwords($row['menu_name']);
			}
		}
		
		$_items = array(
			'user_id'=>$get_data_user,
			'menu_id'=>$get_data_menu,
			'create' => array(
				'' => UserMenuModule::t(''),
				'0' => UserMenuModule::t('No'),
				'1' => UserMenuModule::t('Yes'),
			),
			'update' => array(
				'' => UserMenuModule::t(''),
				'0' => UserMenuModule::t('No'),
				'1' => UserMenuModule::t('Yes'),
			),
			'delete' => array(
				'' => UserMenuModule::t(''),
				'0' => UserMenuModule::t('No'),
				'1' => UserMenuModule::t('Yes'),
			),
			'verify' => array(
				'' => UserMenuModule::t(''),
				'0' => UserMenuModule::t('No'),
				'1' => UserMenuModule::t('Yes'),
			),
			'print' => array(
				'' => UserMenuModule::t(''),
				'0' => UserMenuModule::t('No'),
				'1' => UserMenuModule::t('Yes'),
			),
			'status' => array(
				'' => UserMenuModule::t(''),
				'0' => UserMenuModule::t('Not Active'),
				'1' => UserMenuModule::t('Active'),
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('`create`',$this->create);
		$criteria->compare('`update`',$this->update);
		$criteria->compare('`delete`',$this->delete);
		$criteria->compare('verify',$this->verify);
		$criteria->compare('print',$this->print);
		$criteria->compare('t.`status`',$this->status);
		$criteria->compare('user_created',$this->user_created);
		$criteria->compare('time_created',$this->time_created,true);
		$criteria->compare('user_modified',$this->user_modified);
		$criteria->compare('time_modified',$this->time_modified,true);
		$criteria->compare('deleted',$this->deleted);
		
		$criteria->join = 'INNER JOIN users ON (t.user_id = users.id AND users.status = 1)
							INNER JOIN menu ON (t.menu_id = menu.id AND menu.deleted = 0)';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'users.username ASC',
				'defaultOrder'=>'menu.menu_name ASC',
		 	)
		));
	}

}
