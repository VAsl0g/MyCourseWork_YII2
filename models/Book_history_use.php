<?php
namespace app\models;
use yii\db\ActiveRecord;
class Book_history_use extends ActiveRecord
{
    public $kol;
    public function getProjects()
        {
            return $this->hasOne(Projects::className(), ['id_project' => 'project']);
        }
    
    public function getEquipments()
        {
            return $this->hasOne(Equipments::className(), ['id_equipment' => 'equipment']);
        }
        
}