# TYPO3 Extension: Font Awesome
EXT:font_awesome allows you to use [Font Awesome](https://fontawesome.com/) in your extensions.

You can easily choose using CDN or local Font Awesome library.

**The extension version only matches Font Awesome library version, doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template with **LoadViewHelper**.

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en"
		xmlns:fa="http://typo3.org/ns/Dagou/FontAwesome/ViewHelpers"
		data-namespace-typo3-fluid="true">
		<fa:load />
	</html>

Or only some specific style packages, like `solid`, `regular`, or `brands`. Default `all`.

    <fa:load all="false" solid="true" regular="true" brands="true" />

And decide which library you want to load, `js` or `css`. Default `js`.

    <fa:load library="css" /> 

You can also load your own library or packages.

    <fa:load packages="{...}" />
    
Or, load the JS before the &lt;BODY&gt; tag.

    <fa:load footer="false" />
    
To add new CDN source, please refer to `\Dagou\FontAwesome\Cdn\FontAwesome` and update `$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN']` accordingly.  

([SVG with JavaScript](https://fontawesome.com/how-to-use/svg-with-js)) 
([Web Fonts with CSS](https://fontawesome.com/how-to-use/web-fonts-with-css))

## ViewHelper

#### Icon (Solid, Regular, Light, Brands)

- `icon` (string) Icon name. **Required**
- `size` (string) Icon size, `xs`, `sm`, `lg`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.
- `fixedWidth` (boolean) Fixed width or not.
- `border` (boolean) Bordered or not.
- `pull` (string) Pulled icon, `left`, `right`.
- `animation` (string) Animated icon, `spin`, `pulse`.
- `rotate` (string) Rotated icon, `90`, `180`, `270`.
- `flip` (string) Flipped icon, `horizontal`, `vertical`.
- `inverse` (boolean) Inversed color or not.
- `largerIcon` (boolean) Stack larger icon or not. **Stack ONLY**

Basic Use

    <fa:solid icon="camera-retro" />
    
Icon Sizes

    <fa:solid icon="camera-retro" size="xs" />
    
Fixed Width Icons

    <div><fa:solid icon="home" fixedWidth="true" style="background:MistyRose" /> Home</div>
    
Bordered & Pulled Icons

    <fa:solid icon="quote-left" size="2x" pull="left" border="true" />Gatsby believed in the green light, the orgastic future that year by year recedes before us. It eluded us then, but that’s no matter — tomorrow we will run faster, stretch our arms further... And one fine morning — So we beat on, boats against the current, borne back ceaselessly into the past.

Animated Icons

    <fa:solid icon="spinner" animation="spin" />

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