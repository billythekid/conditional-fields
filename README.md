# Conditional Fields plugin for Craft CMS 3.x

<img src="src/icon.svg" width="200px">

## Conditional Fields Overview

Show or hide fields based on the value of other fields. PRs gratefully received. 

Please post [any issues](billythekid/conditional-fields/issues) you're having and I'll check them out.

Conditional field layouts are coming to Craft CMS version 4 core. Craft CMS version 2 had the [Reasons plugin](https://github.com/mmikkel/Reasons-Craft) but there's nothing working for Craft 3 at the moment.

This is a very simple, very dumb, implementation of a way to get conditional field layouts in your entries etc.

If you need something complex it's almost certainly not possible with this plugin, but if you just need to show and hide some fields based on simple selections, like light switches, give it a whirl. 
 
## Requirements

This plugin requires Craft CMS 3.4.10 or later. It may work on earlier (^3.0) versions but I've not tested it. I haven't restricted installation to 3.4.10 so give it a go!

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

<img alt="Creating a conditional field" src="resources/img/create-conditional-field.png" width="400">

To check for an entry in an entry field, use 'contains' and put the entry ID as the value.

**NOTE:** Chances are that this won't work inside a matrix block or other complicated stuff. Keep it simple.

Once your conditional field is created you can drag it in to any field layouts you want it to work in.

<img alt="adding a conditional field to a field layout" src="resources/img/add-to-field-layout.png" width="400">

The field itself is invisible to your layout. There are no settings or values to be saved in the layout view, we're just adding functionality so we hide it.

<img alt="Layout view showing a matching condition" src="resources/img/layout-view-with-field-matching.png" width="400">

<img alt="Layout view showing a non-matching condition" src="resources/img/layout-view-with-field-unmatching.png" width="400">

