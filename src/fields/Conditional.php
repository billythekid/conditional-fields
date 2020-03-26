<?php
/**
 * Conditional Fields plugin for Craft CMS 3.x
 * if (condition) { show(field) }
 *
 * @link      https://billyfagan.co.uk
 * @copyright Copyright (c) 2020 Billy Fagan
 */

namespace billythekid\conditionalfields\fields;

use billythekid\conditionalfields\ConditionalFields;
use billythekid\conditionalfields\assetbundles\conditionalfield\ConditionalFieldAsset;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\Db;
use yii\db\Schema;
use craft\helpers\Json;

/**
 * @author    Billy Fagan
 * @package   ConditionalFields
 * @since     0.0.1
 */
class Conditional extends Field
{
  // Public Properties
  // =========================================================================

  /**
   * @var string
   */
  public $conditionalOnField = '';
  public $conditionalValue = '';
  public $exactlyValue = '';
  public $conditionalShow = true;
  public $conditionalShowOrHideFields = '';

  // Static Methods
  // =========================================================================

  /**
   * @inheritdoc
   */
  public static function displayName(): string
  {
    return Craft::t('conditional-fields', 'Conditional');
  }

  // Public Methods
  // =========================================================================

  /**
   * @inheritdoc
   */
  public function rules()
  {
    $rules = parent::rules();
    $rules = array_merge($rules, [
        [['conditionalOnField', 'conditionalValue', 'exactlyValue'], 'string'],
        [['conditionalShowOrHideFields'], function ($attribute) {
          if (!is_array($this->$attribute))
          {
            $this->addError($this->$attribute, $this->$attribute . " is not an array" );
          }
        }],
        ['conditionalShow', 'boolean'],
        ['conditionalShow', 'default', 'value' => true],
        [['conditionalOnField', 'conditionalShowOrHideFields', 'conditionalValue', 'conditionalShow'], 'required'],
    ]);

    return $rules;
  }

  /**
   * @inheritdoc
   */
  public function getContentColumnType(): string
  {
    return Schema::TYPE_STRING;
  }

  /**
   * @inheritdoc
   */
  public function normalizeValue($value, ElementInterface $element = null)
  {
    return $value;
  }

  /**
   * @inheritdoc
   */
  public function serializeValue($value, ElementInterface $element = null)
  {
    return parent::serializeValue($value, $element);
  }

  /**
   * @inheritdoc
   */
  public function getSettingsHtml()
  {
    // Render the settings template
    return Craft::$app->getView()->renderTemplate(
        'conditional-fields/_components/fields/Conditional_settings',
        [
            'field' => $this,
        ]
    );
  }

  /**
   * @inheritdoc
   */
  public function getInputHtml($value, ElementInterface $element = null): string
  {
    // Register our asset bundle
    Craft::$app->getView()->registerAssetBundle(ConditionalFieldAsset::class);

    // Get our id and namespace
    $id           = Craft::$app->getView()->formatInputId($this->handle);
    $namespacedId = Craft::$app->getView()->namespaceInputId($id);

    // Variables to pass down to our field JavaScript to let it namespace properly
    $jsonVars = [
        'id'             => $id,
        'name'           => $this->handle,
        'namespace'      => $namespacedId,
        'prefix'         => Craft::$app->getView()->namespaceInputId(''),
        'fieldToWatch'   => $this->conditionalOnField,
        'valueToWatch'   => $this->conditionalValue !== 'conditional-exactly' ? $this->conditionalValue : $this->exactlyValue,
        'showOrHide'     => $this->conditionalShow ? 'show' : 'hide',
        'fieldsToToggle' => $this->conditionalShowOrHideFields,
    ];
    $jsonVars = Json::encode($jsonVars);
    Craft::$app->getView()->registerJs("$('#{$namespacedId}-field').ConditionalFieldsConditional(" . $jsonVars . ");");

    // Render the input template
    return Craft::$app->getView()->renderTemplate(
        'conditional-fields/_components/fields/Conditional_input',
        [
            'name'         => $this->handle,
            'value'        => $value,
            'field'        => $this,
            'id'           => $id,
            'namespacedId' => $namespacedId,
        ]
    );
  }
}
