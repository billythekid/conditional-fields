<?php
/**
 * Conditional Fields plugin for Craft CMS 3.x
 *
 * if (condition) { show(field) }
 *
 * @link      https://billyfagan.co.uk
 * @copyright Copyright (c) 2020 Billy Fagan
 */

namespace billythekid\conditionalfields;

use billythekid\conditionalfields\fields\Conditional as ConditionalField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class ConditionalFields
 *
 * @author    Billy Fagan
 * @package   ConditionalFields
 * @since     0.0.1
 *
 */
class ConditionalFields extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ConditionalFields
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '0.0.1';


    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = ConditionalField::class;
            }
        );
    }
}
