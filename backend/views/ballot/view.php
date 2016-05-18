<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Ballot */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Ballots'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ballot-view">

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
            'code',
            'name',
            'status',
            'description:ntext',
            'description_long:ntext',
            'start_at:datetime',
            'finish_at:datetime',
            'visible_from:datetime',
            'created_at:datetime',
            'updated_at:datetime',
        	[
			    'attribute'=>'category',
			    'value'=>implode('</br>', ArrayHelper::map($model->getCategory()->all(), 'id', 'name')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'userGroup',
			    'value'=>implode('</br>', ArrayHelper::map($model->getUserGroups()->all(), 'id', 'name')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'createUser',
			    'value'=>implode('</br>', ArrayHelper::map($model->getCreateUser()->all(), 'id', 'username')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'ballotOptions',
			    'value'=>implode('</br>', ArrayHelper::map($model->getBallotOptions()->all(), 'id', 'name')),
        		'format'=>'raw'
		    ],
        	[
			    'attribute'=>'comments',
			    'value'=>implode('</br>', ArrayHelper::map($model->getComments()->all(), 'id', 'title')),
        		'format'=>'raw'
		    ],
        ],
    ]) ?>

</div>
