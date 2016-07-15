<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserGroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'status',
            'created_at:datetime',
            'updated_at:datetime',
        	[
			    'attribute'=>'users',
			    'value'=>implode('</br>', ArrayHelper::map($model->getUsers()->all(), 'id', 'username')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'ballots',
			    'value'=>implode('</br>', ArrayHelper::map($model->getBallots()->all(), 'id', 'name')),
        		'format'=>'raw'
		    ]
        ],
    ]) ?>

</div>
