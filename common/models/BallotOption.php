<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ballot_option".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property string $vote_count
 * @property integer $ballot_id
 *
 * @property Ballot $ballot
 * @property Comments[] $comments
 */
class BallotOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ballot_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'ballot_id'], 'required'],
            [['description'], 'string'],
            [['status', 'vote_count', 'ballot_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['ballot_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ballot::className(), 'targetAttribute' => ['ballot_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'vote_count' => Yii::t('app', 'Vote Count'),
            'ballot_id' => Yii::t('app', 'Ballot ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallot()
    {
        return $this->hasOne(Ballot::className(), ['id' => 'ballot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['ballot_option_id' => 'id']);
    }
}
