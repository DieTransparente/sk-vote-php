<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\LoginForm;


/**
 * Login form
 */
class BackendLoginForm extends LoginForm
{
    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
        	$user = User::findByUsername($this->username);
        	if ($user !== null && Yii::$app->authManager->checkAccess($user->getId(), 'admin'))
            	$this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }	
}
