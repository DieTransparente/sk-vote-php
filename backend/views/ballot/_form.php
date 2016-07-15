<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\UserGroup;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Ballot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ballot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_long')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_user_id')->textInput() ?>

    <?= $form->field($model, 'start_at')->textInput() ?>

    <?= $form->field($model, 'finish_at')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'visible_from')->textInput() ?>

	<?= $form->field($model, 'userGroups_ids')->listBox( ArrayHelper::map(UserGroup::find()->all(), 'id', 'name'), ['multiple' => true, 'size' => 5] ) ?>

	<?= $form->field($model, 'users_ids')->listBox( ArrayHelper::map(User::find()->all(), 'id', 'username'), ['multiple' => true, 'size' => 5] ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
