<?php

namespace FluentForm\App\Modules\Widgets;

use FluentForm\App\Modules\Widgets\FluentFormWidget;

class ElementorWidget
{
    private $app = null;

    public function __construct($app)
    {
        $this->app = $app;
        add_action('elementor/widgets/register', [$this, 'init_widgets']);
    }

    public function init_widgets($widgets_manager)
    {
        $this->enqueueAssets();

        if (file_exists(FLUENTFORM_DIR_PATH . 'app/Modules/Widgets/FluentFormWidget.php')) {
            require_once FLUENTFORM_DIR_PATH . 'app/Modules/Widgets/FluentFormWidget.php';
            $widgets_manager->register(new FluentFormWidget());
        }
    }

    public function enqueueAssets()
    {
        wp_enqueue_style('fluentform-elementor-widget', fluentformMix('css/fluent-forms-elementor-widget.css'), [], FLUENTFORM_VERSION);
    }
}
