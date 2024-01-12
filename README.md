# TYPO3 Extension: Font Awesome

EXT:font_awesome allows you to use [Font Awesome](https://fontawesome.com/) in your extensions.

**The extension version only matches Font Awesome library version, doesn't mean anything else.**

## How to use it
You can load the `JS` or `CSS` library in your Fluid template.

    <f:asset.script identifier="font_awesome" src="{fa:uri.js()}" />

    <f:asset.css identifier="font_awesome" href="{fa:uri.css()}" />

You can load some specific style package, like `brands`, `solid`, `regular`, `light`, `thin`, or `duotone`, or even `svg|v4-font|v4-shims|v5-font` for `CSS` and `conflict|v4-shims` for `JS`.

    {fa:uri.js(package: "...")}

    {fa:uri.css(package: "...")}

To use other FontAwesome source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\FontAwesome\Utility\ExtensionUtility::registerSource(\Vendor\Extension\Source::class);

You may want to disable the source and use the local one instead in some cases, for example saving page as PDF by [WKHtmlToPdf](https://wkhtmltopdf.org/).

    {fa:uri.js(forceLocal: "true")}

    {fa:uri.css(forceLocal: "true")}

## ViewHelper
#### Icon (Solid, Regular, Light, Brand)
- `icon` (string) [Icon name](https://fontawesome.com/icons). **Required**
- `sharp` (boolean) Sharp icon or not.
- `size` (string) Icon size, `2xs`, `xs`, `sm`, `lg`, `xl`, `2xl`, `1x`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.
- `fixedWidth` (boolean) Fixed width or not.
- `rotate` (string) Rotated icon, `90`, `180`, `270`.
- `flip` (string) Flipped icon, `both`, `horizontal`, `vertical`.
- `animation` (string) Animated icon, `beat`, `fade`, `beat-fade`, `bounce`, `flip`, `shake`, `spin`, `spin-pulse`, `spin-reverse`.
- `border` (boolean) Bordered or not.
- `pull` (string) Pulled icon, `left`, `right`.
- `inverse` (boolean) Inversed color or not.
- `grow` (float) Scale up. Default `0`.
- `shrink` (float) Scale down. Default `0`.
- `up` (float) Move up. Default `0`.
- `right` (float) Move right. Default `0`.
- `down` (float) Move down. Default `0`.
- `left` (float) Move left. Default `0`.
- `list` (boolean) List icon or not. Default `TRUE`. **List ONLY**
- `large` (boolean) Stack larger icon or not. **Stack ONLY**

Styling Basics

    <fa:solid icon="camera" />

Sizing Icons

    <fa:solid icon="coffee" size="xs" />

Fixed Width Icons

    <div><fa:solid icon="skating" fixedWidth="true" style="background:DodgerBlue" /> Skating</div>

Rotate Icons

    <fa:brand icon="font-awesome" />
    <fa:brand icon="font-awesome" rotate="90" />
    <fa:brand icon="font-awesome" flip="horizontal" />

Animating Icons

    <fa:solid icon="heart" animation="beat" />

Bordered &amp; Pulled Icons

    <fa:solid icon="quote-left" size="2x" pull="left" />Gatsby believed in the green light, the orgastic future that year by year recedes before us. It eluded us then, but that’s no matter — tomorrow we will run faster, stretch our arms further... And one fine morning — So we beat on, boats against the current, borne back ceaselessly into the past.

Scaling

    <fa:solid icon="seedling" shrink="8" style="background:MistyRose" />

Positioning

    <fa:solid icon="seedling" shrink="8" up="6" style="background:MistyRose" />

Rotating & Flipping

    <fa:solid icon="seedling" rotate="30" style="background:MistyRose" />
    <fa:solid icon="seedling" flip="v" style="background:MistyRose" />

#### List

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

#### Masking
- `icon` (string) [Icon name](https://fontawesome.com/icons). **Required**
- `sharp` (boolean) Sharp icon or not.
- `id` (string) Mask ID.


    <fa:mask.solid icon="comment">
        <fa:solid icon="pencil-alt" shrink="10" up="0.5" />
    </fa:mask.solid>