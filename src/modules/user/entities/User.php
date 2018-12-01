<?php

namespace app\modules\user\entities;

use app\modules\rbac\entities\AuthAssignment;
use nullref\fulladmin\modules\user\models\User as BaseUser;
use nullref\useful\traits\Mappable;
use Yii;
use yii\db\Query;

/**
 * User model
 *
 * @property string roles
 *
 */
class User extends BaseUser
{
    use Mappable;

    /**
     * @return bool Whether the user is an admin or not.
     */
    public function getIsAdmin()
    {
        return parent::getIsAdmin() || $this->getAttribute('is_admin');
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        $roles = AuthAssignment::find()->select(['item_name'])->where(['user_id' => $this->id])->asArray()->column();

        $result = array_reduce($roles, function ($list, $role) {
            $list = array_merge(User::getItems($role), $list, [$role]);

            return $list;
        }, []);

        return $result;
    }

    /**
     * @param $item
     *
     * @return array|mixed
     * @throws \Throwable
     */
    public static function getItems($item)
    {
        $children = Yii::$app->db->cache(function () use ($item) {
            $query = new Query();

            return $query->select(['child'])->from(Yii::$app->authManager->itemChildTable)->where(['parent' => $item])->column();
        });

        foreach ($children as $parent) {
            $children = array_merge(self::getItems($parent), $children);
        }

        return $children;
    }
}