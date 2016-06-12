<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id, 'ballot_id' => $model->ballot_id, 'ballot_option_id' => $model->ballot_option_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id, 'ballot_id' => $model->ballot_id, 'ballot_option_id' => $model->ballot_option_id], [
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
            'title',
            'description:ntext',
            'content:ntext',
            'created_at',
            'updated_at',
            'rating',
            'status',
        	[
			    'attribute'=>'user',
			    'value'=>implode('</br>', ArrayHelper::map($model->getUser()->all(), 'id', 'username')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'ballot',
			    'value'=>implode('</br>', ArrayHelper::map($model->getBallot()->all(), 'id', 'name')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'ballotOption',
			    'value'=>implode('</br>', ArrayHelper::map($model->getBallotOption()->all(), 'id', 'name')),
        		'format'=>'raw'
		    ],
        ],
    ]) ?>

</div>
