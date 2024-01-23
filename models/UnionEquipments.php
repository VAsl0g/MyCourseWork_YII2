<?php
namespace app\models;
use yii\db\ActiveRecord;
class UnionEquipments extends ActiveRecord
{
    public static function getDb()
    {
        // using connection "db2"
        return \Yii::$app->db;  
    }

    public static function tableName()
    {
       return 'union_equipments';
    }
}