<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Ballot;

/* @var $this yii\web\View */
/* @var $model common\models\BallotOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ballot-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'vote_count')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'ballot_id')->listBox( ArrayHelper::map(Ballot::find()->all(), 'id', 'name'), ['multiple' => true, 'size' => 5] ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
