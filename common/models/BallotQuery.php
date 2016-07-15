<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Ballot]].
 *
 * @see Ballot
 */
class BallotQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Ballot[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ballot|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
