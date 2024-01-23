<?php
namespace app\models;
use yii\db\ActiveRecord;
class Equipments extends ActiveRecord
{
    public function getProjects()
        {
            return $this->hasOne(Projects::className(), ['id_project' => 'project']);
        }

    public function getBook_history_use()
        {
            return $this->hasMany(Book_history_use::className(), ['equipment' => 'id_equipment']);
        }
}