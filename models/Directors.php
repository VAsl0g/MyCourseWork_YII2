<?php
namespace app\models;


use yii\db\ActiveRecord;
class Directors extends ActiveRecord
{

    
    
        public function getDepartments()
        {
            return $this->hasOne(Departments::className(), ['director' => 'id_director']);
        }

        public function getContracts()
        {
            return $this->hasOne(Contracts::className(), ['director' => 'id_director']);
        }
    
}
