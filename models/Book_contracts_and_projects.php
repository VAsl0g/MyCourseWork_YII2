<?php
namespace app\models;
use yii\db\ActiveRecord;
class Book_contracts_and_projects extends ActiveRecord
{
    
    public function getProjects()
    {
        return $this->hasOne(Projects::className(), ['id_project' => 'project']);
    }

    public function getContracts()
    {
        return $this->hasOne(Contracts::className(), ['id_contract' => 'contract']);
    }
    
}