<?php
/**
 * Conditional Fields plugin for Craft CMS 3.x
 *
 * if (condition) { show(field) }
 *
 * @link      https://billyfagan.co.uk
 * @copyright Copyright (c) 2020 Billy Fagan
 */

namespace billythekid\conditionalfields\assetbundles\conditionalfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Billy Fagan
 * @package   ConditionalFields
 * @since     0.0.1
 */
class ConditionalFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@billythekid/conditionalfields/assetbundles/conditionalfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Conditional.js',
        ];

        $this->css = [
            'css/Conditional.css',
        ];

        parent::init();
    }
}
