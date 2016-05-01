<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[BallotCategory]].
 *
 * @see BallotCategory
 */
class BallotCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BallotCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BallotCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
