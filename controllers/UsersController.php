<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 08.02.2016
 * Time: 18:59
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\Users;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $users = Users::find()->all();

        return $this->render('index', ['users' => $users]);
    }

}