<?php


namespace frontend\controllers;

use common\models\User;
use frontend\base\Controller as BaseController;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Console;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

/**
 * @author Cholid AW
 * @package frontend\controllers
 */

class ProfileController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'update-address', 'update-account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /** @var \common\models\User $user */
        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();
        return $this->render('index', [
            'user' => $user,
            'userAddress' => $userAddress

        ]);
    }

    public function actionUpdateAddress()
    {

        // if (!Yii::$app->request->isAjax) {
        //     throw new ForbiddenHttpException("You are only allowed to make ajax request");
        // }
        // $user = Yii::$app->user->identity;
        $user = User::findOne(Yii::$app->user->identity->getId());
        $userAddress = $user->getAddress();
        $success = false;
        if ($userAddress->load(Yii::$app->request->post()) && $userAddress->save()) {
            $success = true;
            Yii::$app->session->setFlash('success', 'Your account was successfully updated');
            return $this->redirect(['index']); // Redirect to index after successful update
        }
        return $this->renderAjax('user_address', [
            'userAddress' => $userAddress,
            'success' => $success
        ]);
    }

    public function actionUpdateAccount()
    {
        $user = User::findOne(Yii::$app->user->identity->getId());
        $success = false;
        Yii::$app->session->setFlash('success', 'Your aaaaa was successfully updated');
        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            $success = true;
            Yii::$app->session->setFlash('success', 'Your account was successfully updated');
            return $this->redirect(['index']); // Redirect to index after successful update

        } else {
            Yii::$app->session->setFlash('success', 'Your aaaaa was successfully updated');
        }

        // Yii::$app->session->setFlash('failed', 'Your account was successfully updated');


        return $this->renderAjax('user_account', [
            'user' => $user,
            'success' => $success
        ]);
    }
}
