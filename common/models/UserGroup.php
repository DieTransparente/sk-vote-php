<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property BallotHasUserGroup[] $ballotHasUserGroups
 * @property Ballot[] $ballots
 * @property UserHasUserGroup[] $userHasUserGroups
 * @property User[] $users
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
	        [
	            'class' => \voskobovich\behaviors\ManyToManyBehavior::className(),
	            'relations' => [
	                'ballots_ids' => 'ballots',
	                'users_ids' => 'users',
	            ],
	        ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        	[['ballots_ids', 'users_ids'], 'each', 'rule' => ['integer']],
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
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallotHasUserGroups()
    {
        return $this->hasMany(BallotHasUserGroup::className(), ['user_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallots()
    {
        return $this->hasMany(Ballot::className(), ['id' => 'ballot_id'])->viaTable('ballot_has_user_group', ['user_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasUserGroups()
    {
        return $this->hasMany(UserHasUserGroup::className(), ['user_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_user_group', ['user_group_id' => 'id']);
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
