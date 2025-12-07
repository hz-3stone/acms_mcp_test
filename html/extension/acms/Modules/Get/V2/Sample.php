<?php

namespace Acms\Custom\Modules\Get\V2;

use Acms\Modules\Get\V2\Base;

class Sample extends Base
{
    public function get(): array
    {
        return [
            'moduleTest' => 'Sample',
        ];
    }
}
