<?php

namespace Revolution\LaminasForm\View\Helper;

use Laminas\Form\View\Helper\Form;
use Revolution\LaminasForm\View\Concerns\Help;
use Revolution\LaminasForm\View\Concerns\Label;
use Revolution\LaminasForm\View\Concerns\Render;
use Revolution\LaminasForm\View\Concerns\Row;
use Revolution\LaminasForm\View\Concerns\Submit;
use Revolution\LaminasForm\View\Concerns\View;

class Bootstrap5Horizon extends Form
{
    use Row;
    use Help;
    use Label;
    use Submit;
    use Render;
    use View;

    protected const DEFAULTS = [
        'wrapper'    => 'mb-3',
        'element'    => 'col-sm-10',
        'submit'     => 'btn btn-primary',
        'help_open'  => '<div class="form-text">',
        'help_close' => '</div>',
    ];
}
