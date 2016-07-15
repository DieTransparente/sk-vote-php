<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Ballot;
use common\models\BallotOption;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

	<?= $form->field($model, 'user_id')->dropdownList( ArrayHelper::map(User::find()->all(), 'id', 'username'), ['prompt'=>'Select User'] ) ?>

	<?= $form->field($model, 'ballot_id')->dropdownList( ArrayHelper::map(Ballot::find()->all(), 'id', 'name'), ['prompt'=>'Select Ballot'] ) ?>

	<?= $form->field($model, 'ballot_option_id')->dropdownList( ArrayHelper::map(BallotOption::find()->all(), 'id', 'name'), ['prompt'=>'Select Ballot Option'] ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
