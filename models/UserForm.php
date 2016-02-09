<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 08.02.2016
 * Time: 17:41
 */

namespace app\models;
use yii\base\Model;

class UserForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}