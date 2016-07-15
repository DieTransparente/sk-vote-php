<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BallotOption */

$this->title = Yii::t('backend', 'Create Ballot Option');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Ballot Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ballot-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
