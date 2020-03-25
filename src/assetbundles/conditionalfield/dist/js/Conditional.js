/**
 * Conditional Fields plugin for Craft CMS
 *
 * Conditional Field JS
 *
 * @author    Billy Fagan
 * @copyright Copyright (c) 2020 Billy Fagan
 * @link      https://billyfagan.co.uk
 * @package   ConditionalFields
 * @since     0.0.1ConditionalFieldsConditional
 */

;(function ($, window, document, undefined) {

  var pluginName = "ConditionalFieldsConditional",
    defaults = {};

  // Plugin constructor
  function Plugin(element, options) {
    this.element = element;

    this.options = $.extend({}, defaults, options);

    this._defaults = defaults;
    this._name = pluginName;

    this.init();
  }

  Plugin.prototype = {

    init: function (id) {
      var _this = this;

      $(function () {
        /* -- _this.options gives us access to the $jsonVars that our FieldType passed down to us */
console.log(_this);
      })();
    }
  };

  // A really lightweight plugin wrapper around the constructor,
  // preventing against multiple instantiations
  $.fn[pluginName] = function (options) {
    return this.each(function () {
      if (!$.data(this, "plugin_" + pluginName)) {
        $.data(this, "plugin_" + pluginName,
          new Plugin(this, options));
      }
    });
  };

})(jQuery, window, document);
