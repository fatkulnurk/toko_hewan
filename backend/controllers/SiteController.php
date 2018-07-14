<?php
namespace backend\controllers;

use backend\models\BackendUser;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
//use common\models\LoginForm;
use backend\models\LoginForm2;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles'=>['@'],
                    ],

//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

//        $session = Yii::$app->session;
//        $session->open();

            $model = new LoginForm2();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                //return $this->goBack();
//                $userdata = BackendUser::find()->where(['id'=>Yii::$app->user->getId()])->asArray()->all();
//                $session['user'] = array(
//                    "login" => true,
//                    "id" => $userdata[0]['id'],
//                    "username" => $userdata[0]['username'],
//                    "fullname" => $userdata[0]['fullname'],
//                );

                return $this->redirect(["site/index"]);
            } else {
                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
