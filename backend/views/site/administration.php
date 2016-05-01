<?php
$this->context->layout = 'column2';

/* @var $this yii\web\View */

$this->title = 'Administration';
$this->params['breadcrumbs'][] = $this->title;

// sidebar
use kartik\widgets\SideNav;
use yii\helpers\Url;
$type = SideNav::TYPE_DEFAULT;
$currentItem = $this->title;
$this->params['sidenav']['items'] =  [
		// Important: you need to specify url as 'controller/action',
		// not just as 'controller' even if default action is used.
		['label' => 'CRUD-Controller', 'icon' => 'list-alt', 'items' => [
				['label' => 'User', 'url' => Url::to(['/user/index', 'type'=>$type]), 'active' => ($currentItem == 'Users')],
				['label' => 'UserGroup', 'url' => Url::to(['/usergroup/index', 'type'=>$type]), 'active' => ($currentItem == 'User Groups')],
				['label' => 'Ballot', 'url' => Url::to(['/ballot/index', 'type'=>$type]), 'active' => ($currentItem == 'Ballots')],
				['label' => 'BallotOption', 'url' => Url::to(['/ballotoption/index', 'type'=>$type]), 'active' => ($currentItem == 'Ballot Options')],
				['label' => 'BallotCategories', 'url' => Url::to(['/ballotcategory/index', 'type'=>$type]), 'active' => ($currentItem == 'Ballot Categories')],
				['label' => 'Comments', 'url' => Url::to(['/comments/index', 'type'=>$type]), 'active' => ($currentItem == 'Comments')],
		]],
];


?>
<div class="site-index">

    <div class="body-content">
		<h1>Administration</h1>
		<p>Für jede Tabelle gibts erstmal einen CRUD-Controller.</br>
		Damit kann man schonmal Daten anlegen und verknüpfen.</p>
    </div>
    
</div>
