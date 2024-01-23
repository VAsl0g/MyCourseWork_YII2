<?php
namespace app\models;
use yii\db\ActiveRecord;
class Work_subcontractors extends ActiveRecord
{

    public function getProjects()
    {
        return $this->hasOne(Projects::className(), ['id_project' => 'project']);
    }
}