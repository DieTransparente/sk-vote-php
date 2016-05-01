<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ballot".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $description_long
 * @property string $created_at
 * @property string $updated_at
 * @property integer $create_user_id
 * @property string $start_at
 * @property string $finish_at
 * @property integer $category_id
 * @property integer $status
 * @property string $visible_from
 *
 * @property BallotCategory $category
 * @property User $createUser
 * @property BallotHasUserGroup[] $ballotHasUserGroups
 * @property UserGroup[] $userGroups
 * @property BallotOption[] $ballotOptions
 * @property Comments[] $comments
 * @property UserHasBallot[] $userHasBallots
 * @property User[] $users
 */
class Ballot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ballot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'create_user_id', 'start_at', 'finish_at', 'category_id'], 'required'],
            [['description', 'description_long'], 'string'],
            [['created_at', 'updated_at', 'start_at', 'finish_at', 'visible_from'], 'safe'],
            [['create_user_id', 'category_id', 'status'], 'integer'],
            [['code'], 'string', 'max' => 80],
            [['name'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BallotCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['create_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['create_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'description_long' => Yii::t('app', 'Description Long'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'create_user_id' => Yii::t('app', 'Create User ID'),
            'start_at' => Yii::t('app', 'Start At'),
            'finish_at' => Yii::t('app', 'Finish At'),
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
            'visible_from' => Yii::t('app', 'Visible From'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BallotCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallotHasUserGroups()
    {
        return $this->hasMany(BallotHasUserGroup::className(), ['ballot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGroups()
    {
        return $this->hasMany(UserGroup::className(), ['id' => 'user_group_id'])->viaTable('ballot_has_user_group', ['ballot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallotOptions()
    {
        return $this->hasMany(BallotOption::className(), ['ballot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['ballot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasBallots()
    {
        return $this->hasMany(UserHasBallot::className(), ['ballot_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_ballot', ['ballot_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return BallotQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BallotQuery(get_called_class());
    }
}
