<?php
namespace app\modules\user\controllers;

use Yii;
use yii\web\Controller;
use app\components\ControllerTrait;
use app\modules\user\models\LoginForm;

class LoginController extends Controller
{
    use ControllerTrait;
    public function actionIndex()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('index', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }
}