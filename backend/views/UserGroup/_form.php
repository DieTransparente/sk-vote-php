<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Ballot;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\UserGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
<!-- 
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
 -->
    <?= $form->field($model, 'status')->textInput() ?>

	<?= $form->field($model, 'ballots_ids')->listBox( ArrayHelper::map(Ballot::find()->all(), 'id', 'name'), ['multiple' => true, 'size' => 5] ) ?>

	<?= $form->field($model, 'users_ids')->listBox( ArrayHelper::map(User::find()->all(), 'id', 'username'), ['multiple' => true, 'size' => 5] ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
