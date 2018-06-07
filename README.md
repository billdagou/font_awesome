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

## ViewHelper
#### Icon (Solid, Regular, Light, Brand)
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

List Icons see below
    
Bordered & Pulled Icons

    <fa:solid icon="quote-left" size="2x" pull="left" border="true" />Gatsby believed in the green light, the orgastic future that year by year recedes before us. It eluded us then, but that’s no matter — tomorrow we will run faster, stretch our arms further... And one fine morning — So we beat on, boats against the current, borne back ceaselessly into the past.

Animated Icons

    <fa:solid icon="spinner" animation="spin" />

Rotated & Flipped Icons

    <fa:brand icon="font-awesome" />
    <fa:brand icon="font-awesome" rotate="90" />
    <fa:brand icon="font-awesome" flip="horizontal" />

Stacked Icons see below.

#### List
- `size` (string) Icon size, `xs`, `sm`, `lg`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.


    <fa:list>
        <li><fa:solid icon="check-square" />List icons can</li>
    </fa:list>

#### Stack
- `size` (string) Icon size, `xs`, `sm`, `lg`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.
- `pull` (string) Pulled icon, `left`, `right`.
- `animation` (string) Animated icon, `spin`, `pulse`.
- `rotate` (string) Rotated icon, `90`, `180`, `270`.
- `flip` (string) Flipped icon, `horizontal`, `vertical`.


    <fa:stack>
        <fa:solid icon="square" largerIcon="true" />
        <fa:solid icon="twitter" inverse="true" />
    </fa:stack>