<?php
namespace app\models;
use yii\db\ActiveRecord;
class Categories extends ActiveRecord
{


        
        public function getEmployees()
        {
            return $this->hasMany(Employees::className(), ['category' => 'id_category']);
        }
    
    
}