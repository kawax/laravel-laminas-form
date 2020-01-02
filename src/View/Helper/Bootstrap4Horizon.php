<?php

namespace Revolution\LaminasForm\View\Helper;

use Laminas\Form\View\Helper\Form;

use Revolution\LaminasForm\View\Concerns\Render;
use Revolution\LaminasForm\View\Concerns\Row;
use Revolution\LaminasForm\View\Concerns\Label;
use Revolution\LaminasForm\View\Concerns\Submit;
use Revolution\LaminasForm\View\Concerns\Help;

class Bootstrap4Horizon extends Form
{
    use Row;
    use Help;
    use Label;
    use Submit;
    use Render;

    protected const DEFAULTS = [
        'wrapper'    => 'form-group row',
        'element'    => 'col-sm-10',
        'submit'     => 'btn btn-primary',
        'help_open'  => '<small class="form-text text-muted">',
        'help_close' => '</small>',
    ];
}
