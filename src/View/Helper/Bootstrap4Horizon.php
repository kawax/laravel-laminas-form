<?php

declare(strict_types=1);

namespace Revolution\LaminasForm\View\Helper;

use Laminas\Form\View\Helper\Form;
use Revolution\LaminasForm\View\Concerns\Help;
use Revolution\LaminasForm\View\Concerns\Label;
use Revolution\LaminasForm\View\Concerns\Render;
use Revolution\LaminasForm\View\Concerns\Row;
use Revolution\LaminasForm\View\Concerns\Submit;

class Bootstrap4Horizon extends Form
{
    use Help;
    use Label;
    use Render;
    use Row;
    use Submit;

    protected const DEFAULTS = [
        'wrapper' => 'form-group row',
        'element' => 'col-sm-10',
        'submit' => 'btn btn-primary',
        'help_open' => '<small class="form-text text-muted">',
        'help_close' => '</small>',
    ];
}
