<?php

namespace Revolution\LaminasForm\View\Helper;

use Laminas\Form\View\Helper\Form;
use Revolution\LaminasForm\View\Concerns\Help;
use Revolution\LaminasForm\View\Concerns\Label;
use Revolution\LaminasForm\View\Concerns\Render;
use Revolution\LaminasForm\View\Concerns\Row;
use Revolution\LaminasForm\View\Concerns\Submit;
use Revolution\LaminasForm\View\Concerns\View;

class Uikit3Horizon extends Form
{
    use Row;
    use Help;
    use Label;
    use Submit;
    use Render;
    use View;

    protected const DEFAULTS = [
        'wrapper'    => 'uk-margin',
        'element'    => 'uk-form-controls',
        'submit'     => 'uk-button uk-button-primary',
        'help_open'  => '<div class="uk-text-meta">',
        'help_close' => '</div>',
    ];
}
