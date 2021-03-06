<?php

namespace luya\scheduler\models;

use luya\admin\ngrest\base\NgRestModel;

final class Job extends BaseJob
{
    protected static $loadAllClasses = true;

    public function run()
    {
        // TODO: Implement run() method.
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        $options = array_merge(['name', 'class', 'schedule'], $this->extraFields());

        return [
            ['list', $options],
            ['delete', false],
        ];
    }
}
