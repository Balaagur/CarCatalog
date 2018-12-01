<?php
namespace app\modules\admin\components;

use nullref\fulladmin\components\MenuBuilder as BaseBuilder;
use Yii;


class AdminMenuBuilder extends BaseBuilder
{
    /**
     * @param array $items
     * @return array
     */
    public function build($items)
    {
        $newItems = [];
        if (isset($items['admin'])) {
            $newItems['admin'] = $items['admin'];
        }
        if (isset($items['user'])) {
            $newItems['user'] = $items['user'];
        }
        if (isset($items['car'])) {
            $newItems['car'] = $items['catalog'];
        }
        return $newItems;

        $roles = [];

        if (!Yii::$app->user->isGuest) {
            $roles = Yii::$app->user->identity->roles;
        }

        return $this->filterByRoleArray($newItems, $roles);
    }

    public function filterByRoleArray($menu, $roles = [], $paramName = 'roles')
    {
        $result = [];
        foreach ($menu as $key => $item) {
            if (isset($item['items'])) {
                $result[$key] = $item;
                $result[$key]['items'] = $this->filterByRoleArray($result[$key]['items'], $roles, $paramName);
            } else {
                if (isset($item[$paramName])) {
                    if (array_diff($roles, $item[$paramName]) !== $roles) {
                        $result[$key] = $item;
                    }
                }
            }
        }
        return $result;
    }
}

