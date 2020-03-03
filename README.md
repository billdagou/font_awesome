# TYPO3 Extension: Font Awesome
EXT:font_awesome allows you to use [Font Awesome](https://fontawesome.com/) in your extensions.

You can easily choose using CDN or local Font Awesome library.

**The extension version only matches Font Awesome library version, doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template with **LoadViewHelper**.

	<fa:load />

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
- `icon` (string) [Icon name](https://fontawesome.com/icons). **Required**
- `size` (string) Icon size, `xs`, `sm`, `lg`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.
- `fixedWidth` (boolean) Fixed width or not.
- `border` (boolean) Bordered or not.
- `pull` (string) Pulled icon, `left`, `right`.
- `animation` (string) Animated icon, `spin`, `pulse`.
- `rotate` (string) Rotated icon, `90`, `180`, `270` for CSS library, no limitation for JS library.
- `flip` (string) Flipped icon, `h`, `v`.
- `inverse` (boolean) Inversed color or not.
- `large` (boolean) Stack larger icon or not. **Stack ONLY**
- `grow` (float) Scale up. Default `0`. **JS library ONLY**
- `shrink` (float) Scale down. Default `0`. **JS library ONLY**
- `up` (float) Move up. Default `0`. **JS library ONLY**
- `right` (float) Move right. Default `0`. **JS library ONLY**
- `down` (float) Move down. Default `0`. **JS library ONLY**
- `left` (float) Move left. Default `0`. **JS library ONLY**
- `mask` (string) Mask icon name. **JS library ONLY**
- `maskStyle` (string) Mask style. Default `solid`. **Mask ONLY**

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

Rotated & Flipped Icons

    <fa:brand icon="font-awesome" />
    <fa:brand icon="font-awesome" rotate="90" />
    <fa:brand icon="font-awesome" flip="h" />

Scaling

    <fa:solid icon="magic" shrink="8" style="background:MistyRose" />

Positioning

    <fa:solid icon="magic" shrink="8" up="6" style="background:MistyRose" />

Rotating & Flipping

    <fa:solid icon="magic" rotate="90" style="background:MistyRose" />
    <fa:solid icon="magic" flip="v" style="background:MistyRose" />

Masking

    <fa:solid icon="pencil-alt" shrink="10" up=".5" mask="comment" maskStyle="solid" style="background:MistyRose" />

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
        <fa:solid icon="square" large="true" />
        <fa:solid icon="twitter" inverse="true" />
    </fa:stack>