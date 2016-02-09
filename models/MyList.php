<?php

    namespace app\models;

    class MyList extends \yii\db\ActiveRecord {

        public static function tableName()
        {
            return 'list';
        }

        public static function getAll()
        {
//            $array = [
//                1 => 'первый',
//                2 => 'второй',
//                3 => 'третий'
//            ];
            $data = self::find() -> all();
            return $data;
        }

        public static function getOne($id)
        {
            $data = self::find()
                -> where(['id' => $id])
                -> one();

            return $data;
        }
    }

