# Conditional Fields plugin for Craft CMS 3.x

<img src="src/icon.svg" width="200px">

## Conditional Fields Overview

Show or hide fields based on the value of other fields. PRs gratefully received.

```
  if (someFieldValue is a match) { 
    showOrHide(someOtherFields) 
  }
```

Conditional field layouts are coming to Craft CMS version 4 core. Craft CMS version 2 had the [Reasons plugin](https://github.com/mmikkel/Reasons-Craft) but there's nothing working for Craft 3 at the moment.

This is a very simple, very dumb, implementation of a way to get conditional field layouts in your entries etc.
 
## Requirements

This plugin requires Craft CMS 3.4.10 or later. It may work on earlier (^3.0) versions but I've not tested it.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require billythekid/conditional-fields

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Conditional Fields.


## Using Conditional Fields

This plugin adds a new available field type called "Conditional".

- Choose a field to watch the value
- Choose what that value should be for this to match and un-match
- Choose whether you want to show or hide the fields based on this value
- Choose the field(s) that should be shown or hidden when matched/unmatched

![Creating a conditional field](resources/img/create-conditional-field.png =400px)

**NOTE:** Chances are that this won't work inside a matrix block or other complicated stuff. Keep it simple.

Once your conditional field is created you can drag it in to any field layouts you want it to work in.

<img alt="adding a conditional field to a field layout" src="resources/img/add-to-field-layout.png" style="max-width: 400px">

The field itself is invisible to your layout. There are no settings or values to be saved in the layout view, we're just adding functionality so we hide it.

<img alt="Layout view showing a matching condition" src="resources/img/layout-view-with-field-matching.png" style="max-width: 400px">

<img alt="Layout view showing a non-matching condition" src="resources/img/layout-view-with-field-unmatching.png" style="max-width: 400px">

