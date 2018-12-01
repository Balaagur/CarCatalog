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
            $newItems['car'] = $items['car'];
        }
        return $newItems;
    }
}

