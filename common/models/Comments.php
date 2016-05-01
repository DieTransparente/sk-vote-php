<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $rating
 * @property integer $ballot_id
 * @property integer $ballot_option_id
 * @property integer $status
 *
 * @property Ballot $ballot
 * @property BallotOption $ballotOption
 * @property User $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'ballot_id', 'ballot_option_id'], 'required'],
            [['description', 'content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'rating', 'ballot_id', 'ballot_option_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['ballot_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ballot::className(), 'targetAttribute' => ['ballot_id' => 'id']],
            [['ballot_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => BallotOption::className(), 'targetAttribute' => ['ballot_option_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
            'rating' => Yii::t('app', 'Rating'),
            'ballot_id' => Yii::t('app', 'Ballot ID'),
            'ballot_option_id' => Yii::t('app', 'Ballot Option ID'),
            'status' => Yii::t('app', 'Status'),
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
    public function getBallotOption()
    {
        return $this->hasOne(BallotOption::className(), ['id' => 'ballot_option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }
}
