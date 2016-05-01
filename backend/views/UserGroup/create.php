<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserGroup */

$this->title = Yii::t('backend', 'Create User Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
