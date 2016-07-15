<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ballot_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $create_user_id
 * @property integer $status
 *
 * @property Ballot[] $ballots
 */
class BallotCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ballot_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_user_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['create_user_id', 'status'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
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
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'create_user_id' => Yii::t('app', 'Create User ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallots()
    {
        return $this->hasMany(Ballot::className(), ['category_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UserGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserGroupQuery(get_called_class());
    }
}
