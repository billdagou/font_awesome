# TYPO3 Extension: Font Awesome
EXT:font_awesome allows you to add [Font Awesome](http://fontawesome.io/) icons in your Fluid templates by using ViewHelpers.

You can easily choose using CDN or local Font Awesome library.

**The extension version only matches Font Awesome library version, doesn't mean anything else.**

## How to use it
First of all, you will need to load the library file.

	\Dagou\FontAwesome\Utility\FontAwesomeUtility::loadFontAwesome();

Or, use the ViewHelper in your Fluid template.

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en"
		xmlns:fa="http://typo3.org/ns/Dagou/FontAwesome/ViewHelpers">
		<fa:load />
	</html>

Then, use ViewHelpers to add the icons in your Fluid template. Suppose you are using `fa` as its namespace.

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en"
		xmlns:fa="http://typo3.org/ns/Dagou/FontAwesome/ViewHelpers">
		......
	</html>

#### LoadViewHelper
The ViewHelper you need to load Font Awesome library in your Fluid template.

	<fa:load />

#### IconViewHelper
The main ViewHelper you may need in this extension.

	<fa:icon icon="flag" />

Allowed attributes:

- `icon` (string)
Icon name, **required**. You can find all the icon names at the [icons page](http://fontawesome.io/icons/).

- `size` (string)
Icon size relative to its container. Allowed value: `lg`, `2x`, `3x`, `4x`, `5x`.

- `fixed-width` (boolean)
Set the icon at a fixed width.

- `border` (boolean)
Set a border on the icon, generally used with `pull`.

- `pull` (string)
Pull the icon, generally used with `border`. Allowed value: `left`, `right`.

- `animation` (string)
Set the icon animated. Allowed value: `spin`, `pulse`.

- `flip` (string)
Flip the icon, conflict with `rotate`. Allowed value: `horizontal`, `vertical`.

- `rotate` (string)
Rotate the icon, conflict with `flip`. Allowed value: `90`, `180`, `270`.

- `class` (string)
Other class(es) you need for the icon.

- `stack-size` (boolean)
Icon size in stack. **Only works for StackViewHelper.**

- `inverse` (boolean)
Inverse the icon color. **Only works for StackViewHelper.**

#### ListViewHelper
List icons wrapper.

	<fa:list>
		<li><fa:icon icon="check-square" />List icons</li>
	</fa:list>

Allowed attributes:

- `class` (string)
Other class(es) you need for the list.

#### StackViewHelper
Stacked icons wrapper.

	<fa:stack>
		<fa:icon icon="square-o" stack-size="2x" />
		<fa:icon icon="twitter" stack-size="1x" />
	</fa:stack>

Allowed attributes:

- `class` (string)
Other class(es) you need for the stack.

## How to maintain the CDN resources
To replace or add new CDN resources, please update $GLOBALS\['TYPO3\_CONF\_VARS'\]\['EXTCONF'\]\['font_awesome'\]\['CDN'\] in your own extension.

	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN']['New_CDN_Name'] = '...';