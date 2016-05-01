<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BallotCategory */

$this->title = Yii::t('backend', 'Create Ballot Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Ballot Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ballot-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
