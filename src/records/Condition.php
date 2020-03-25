<?php
/**
 * Conditional Fields plugin for Craft CMS 3.x
 *
 * if (condition) { show(field) }
 *
 * @link      https://billyfagan.co.uk
 * @copyright Copyright (c) 2020 Billy Fagan
 */

namespace billythekid\conditionalfields\records;

use billythekid\conditionalfields\ConditionalFields;

use Craft;
use craft\db\ActiveRecord;

/**
 * @author    Billy Fagan
 * @package   ConditionalFields
 * @since     0.0.1
 */
class Condition extends ActiveRecord
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conditionalfields_condition}}';
    }
}
