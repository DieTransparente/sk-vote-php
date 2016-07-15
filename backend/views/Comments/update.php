<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Comments',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'ballot_id' => $model->ballot_id, 'ballot_option_id' => $model->ballot_option_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
