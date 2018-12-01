<?php

namespace app\modules\user\migrations;

use yii\db\Migration;

class M180828000000Update_user_table extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('{{%user}}', 'registration_ip', $this->string());
    }

    public function safeDown()
    {
        $this->alterColumn('{{%user}}', 'registration_ip', $this->bigInteger());

        return true;
    }
}
