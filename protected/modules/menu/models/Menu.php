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
class Menu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_order, menu_name, menu_url, menu_icon, visible', 'required'),
			array('menu_order, parent_menu_id, visible, user_created, user_modified, deleted', 'numerical', 'integerOnly'=>true),
			array('menu_name', 'length', 'max'=>50),
			array('menu_url', 'length', 'max'=>100),
			array('menu_icon', 'length', 'max'=>30),
			array('time_created, time_modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menu_order, menu_name, menu_url, menu_icon, parent_menu_id, visible, user_created, time_created, user_modified, time_modified, deleted', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_order' => 'Menu Order',
			'menu_name' => 'Menu Name',
			'menu_url' => 'Menu URL',
			'menu_icon' => 'Menu Icon',
			'parent_menu_id' => 'Parent Menu',
			'visible' => 'Visible',
			'user_created' => 'User Created',
			'time_created' => 'Time Created',
			'user_modified' => 'User Modified',
			'time_modified' => 'Time Modified',
			'deleted' => 'Deleted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
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
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
