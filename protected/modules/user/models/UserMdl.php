<?php

class UserMdl extends User
{
	
	/**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        // $criteria->compare('create_at',$this->create_at);
        // $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('status',$this->status);
		
		if (!empty($this->create_at)) {
			$arrDate = explode('/', $this->create_at);
			$date_from = trim($arrDate[0]);
			$date_to = trim($arrDate[1]);
			$criteria->addCondition('DATE(create_at) >= DATE("'.date('Y-m-d',strtotime($date_from)).'") AND DATE(create_at) <= DATE("'.date('Y-m-d',strtotime($date_to)).'")');
		}

		if (!empty($this->lastvisit_at)) {
			$arrDate = explode('/', $this->lastvisit_at);
			$date_from = trim($arrDate[0]);
			$date_to = trim($arrDate[1]);
            $criteria->addCondition('DATE(lastvisit_at) >= DATE("'.date('Y-m-d',strtotime($date_from)).'") AND DATE(lastvisit_at) <= DATE("'.date('Y-m-d',strtotime($date_to)).'")');
		}

        return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'username ASC',
			),
        	'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
        ));
    }

	public function downloadDataByFilter()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        // $criteria->compare('create_at',$this->create_at);
        // $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('status',$this->status);
		$criteria->order = 'username ASC';

		if (!empty($this->create_at)) {
			$arrDate = explode('/', $this->create_at);
			$date_from = trim($arrDate[0]);
			$date_to = trim($arrDate[1]);
			$criteria->addCondition('DATE(create_at) >= DATE("'.date('Y-m-d',strtotime($date_from)).'") AND DATE(create_at) <= DATE("'.date('Y-m-d',strtotime($date_to)).'")');
		}

		if (!empty($this->lastvisit_at)) {
			$arrDate = explode('/', $this->lastvisit_at);
			$date_from = trim($arrDate[0]);
			$date_to = trim($arrDate[1]);
            $criteria->addCondition('DATE(lastvisit_at) >= DATE("'.date('Y-m-d',strtotime($date_from)).'") AND DATE(lastvisit_at) <= DATE("'.date('Y-m-d',strtotime($date_to)).'")');
		}

		return UserMdl::model()->findAll($criteria);
	}

}