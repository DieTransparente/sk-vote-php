<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // *** user permissions ***
        // add "viewBallot" permission
        $viewBallot = $auth->createPermission('viewBallot');
        $viewBallot->description = 'View ballot';
        $auth->add($viewBallot);

        // add "viewResult" permission
        $viewResult = $auth->createPermission('viewResult');
        $viewResult->description = 'View result';
        $auth->add($viewResult);

        // add "voteBallot" permission
        $voteBallot = $auth->createPermission('voteBallot');
        $voteBallot->description = 'Vote ballot';
        $auth->add($voteBallot);

        
        // *** administion permissions ***
        // add "inviteUser" permission
        $inviteUser = $auth->createPermission('inviteUser');
        $inviteUser->description = 'Invite user';
        $auth->add($inviteUser);
        
        // add "assignUsergroup" permission
        $assignUsergroup = $auth->createPermission('assignUsergroup');
        $assignUsergroup->description = 'Assign usergroup to user (user role)';
        $auth->add($assignUsergroup);
        
        // add "createBallot" permission
        $createBallot = $auth->createPermission('createBallot');
        $createBallot->description = 'Create a ballot';
        $auth->add($createBallot);
        
        
        // *** user role ***
        // add "user" role and give permissions
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $viewBallot);
        $auth->addChild($user, $viewResult);
        $auth->addChild($user, $voteBallot);
        
        // *** admin role ***
        // add "admin" role and give permissions
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $inviteUser);
        $auth->addChild($admin, $assignUsergroup);
        $auth->addChild($admin, $createBallot);
        // $auth->addChild($admin, $user);
    }
    
    /**
     * creates a user with the given role (admin/user)
     * 
     * @param string Username
     * @param string Password
     * @param string Email Address
     * @param string Role (user/admin)
     */
    public function actionCreateuser($username, $password, $email, $role) {
    	$auth = Yii::$app->authManager;
    	
     	// check unique username
    	if (!empty(User::findByUsername($username))) {
    		$this->stderr("User already exists\n");
    		return self::EXIT_CODE_ERROR;
    	}
    
    	// get role
    	$role = $auth->getRole($role);
    	if (empty($role)) {
    		$this->stderr("Invalid role '" . $role . "'. Valid roles are 'admin' or 'user'\n");
    		return self::EXIT_CODE_ERROR;
    	}
    	
    	// create user
    	$user = new User;
    	$user->username = $username;
    	$user->email = $email;
    	$user->setPassword($password);
    	$user->generateAuthKey();
    	if (!$user->save()) {
    		$this->stderr("Error saving user\n");
    		return self::EXIT_CODE_ERROR;
    	}
    	
    	// assign role
    	$auth->assign($role, $user->id);
    }
}