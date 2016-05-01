<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ballot */

$this->title = Yii::t('backend', 'Create Ballot');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Ballots'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ballot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
