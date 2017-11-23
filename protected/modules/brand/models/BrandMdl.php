<?php

/**
 * This is the model class for table "brand".
 *
 * The followings are the available columns in table 'brand':
 * @property integer $id
 * @property string $brand_name
 * @property string $brand_type
 */
class BrandMdl extends Brand
{
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
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_type',$this->brand_type,true);
		$criteria->compare('user_created',$this->user_created);
		$criteria->compare('time_created',$this->time_created,true);
		$criteria->compare('user_modified',$this->user_modified);
		$criteria->compare('time_modified',$this->time_modified,true);
		$criteria->compare('deleted',$this->deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'brand_name ASC',
			)
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BrandMdl the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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

	public function downloadDataByFilter()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_type',$this->brand_type,true);
		$criteria->compare('user_created',$this->user_created);
		$criteria->compare('time_created',$this->time_created,true);
		$criteria->compare('user_modified',$this->user_modified);
		$criteria->compare('time_modified',$this->time_modified,true);
		// $criteria->compare('deleted',$this->deleted);
		$criteria->order = 'brand_name ASC';

		return BrandMdl::model()->findAll($criteria);
	}

}
