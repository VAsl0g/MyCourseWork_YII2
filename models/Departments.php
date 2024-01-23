<?php
namespace app\models;
use yii\db\ActiveRecord;
class Departments extends ActiveRecord
{
    
        public function getEquipments()
        {
            return $this->hasMany(Categories::className(), ['department' => 'id_department']);
        }

        public function getDirectors()
        {
            return $this->hasOne(Directors::className(), ['id_director' => 'director']);
        }
    
}
