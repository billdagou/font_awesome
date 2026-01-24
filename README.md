# TYPO3 Extension: Font Awesome

EXT:font_awesome allows you to use [Font Awesome](https://fontawesome.com/) in your extensions.

**The extension version only matches Font Awesome library version, doesn't mean anything else.**

## How to use it

You can load the `JS` or `CSS` library in your Fluid template.

    <f:asset.script identifier="font_awesome" src="{fa:uri.js()}" />

    <f:asset.css identifier="font_awesome" href="{fa:uri.css()}" />

Or, you can load the specific pack.

    {fa:uri.js(pack: "...", family: "...", style: "...")}

    {fa:uri.css(pack: "...", family: "...", style: "...")}

To use other FontAwesome source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\FontAwesome\Utility\ExtensionUtility::registerSource(\Vendor\Extension\Source::class);

You may want to disable the source and use the local one instead in some cases, for example saving page as PDF by [WKHtmlToPdf](https://wkhtmltopdf.org/).

    {fa:uri.js(forceLocal: "true")}

    {fa:uri.css(forceLocal: "true")}

## ViewHelper

#### Asset (Css, Js)
- `pack` (string) A group of one or more icon families that share a cohesive visual personality, `classic`, `sharp`, `brands`, `chisel`, `etch`, `jelly`, `notdog`, `slab`, `thumbprint`, `whiteboard`, or `all`, `fontawesome`|`core`, `svg`, `svg-with-js`|`svg-js`, `v4-font-face`|`v4-font`, `v4-shims`, `v5-font-face`|`v5-font` for `CSS` and `all`, `conflict-detection`|`conflict`, `fontawesome`|`core`, `v4-shims` for `JS`. Default `all`.
- `family` (string) A group of related icon styles that share the same basic design but vary in weight/style, `duotone` for `classic` and `sharp` packs, `fill` and `duo` for `jelly` pack, `duo` for `notdog` pack, and `press` for `slab` pack.
- `style` (string) A consistent and specific visual weight, `solid`, `regular`, `light`, `thin`. Default `solid`.
- `forceLocal` (boolean) Force to use local source.

#### Icon (Solid, Regular, Light, Thin, Brand, Chisel, Etch, Jelly, Notdog, Slab, Thumbprint, Whiteboard)
- `icon` (string) [Icon name](https://fontawesome.com/icons). **Required**
- `family` (string) Family name, `duotone`, `sharp` and `sharp-duotone` for `Solid`, `Regular`, `Light` and `Thin`, `fill` and `duo` for `Jelly`, `duo` for `Notdog`, `press` for `Slab`.
- `swap` (boolean) Swap the default opacity. **For `family="duotone|sharp-duotone"` ONLY**
- `size` (string) Icon size, `2xs`, `xs`, `sm`, `lg`, `xl`, `2xl`, `1x`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.
- `width` (string) Icon width, `fixed` or `automatic`|`auto`.
- `rotate` (string) Rotated icon, `90`, `180`, `270`, or other numbers.
- `flip` (string) Flipped icon, `both`|`b`, `horizontal`|`h`, `vertical`|`v`.
- `animation` (string) Animated icon, `beat`, `fade`, `beat-fade`, `bounce`, `flip`, `shake`, `spin`, `spin-pulse`.
- `spin-reverse` (boolean) Spin counter-clockwise. **For `animation="spin|spin-pulse"` ONLY**
- `border` (boolean) Icon border.
- `pull` (string) Pulled icon, `start`, `end`.
- `inverse` (boolean) Inverse color.
- `grow` (float) Scale up. Default `0`.
- `shrink` (float) Scale down. Default `0`.
- `up` (float) Move up. Default `0`.
- `right` (float) Move right. Default `0`.
- `down` (float) Move down. Default `0`.
- `left` (float) Move left. Default `0`.
- `list` (boolean) List icon. Default `TRUE`. **List ONLY**
- `large` (boolean) Stack larger icon. **Stack ONLY**

Styling Basics

    <fa:solid icon="camera" />

Sizing Icons

    <fa:solid icon="coffee" size="xs" />

The Icon Canvas

    <fa:solid icon="exclamation" width="auto" style="background:LightSalmon" />

Rotate Icons

    <fa:brand icon="snowboarding" rotate="90" />
    <fa:brand icon="snowboarding" flip="horizontal" />

Animating Icons

    <fa:solid icon="heart" animation="beat" />

Bordered &amp; Pulled Icons

    <fa:solid icon="arrow-right" size="2x" pull="left" border="true" />Gatsby believed in the green light, the orgastic future that year by year recedes before us. It eluded us then, but that’s no matter — tomorrow we will run faster, stretch our arms further... And one fine morning — So we beat on, boats against the current, borne back ceaselessly into the past.

Power Transforms

    <fa:solid icon="seedling" shrink="8" up="6" style="background:MistyRose" />
    <fa:solid icon="seedling" rotate="30" style="background:MistyRose" />
    <fa:solid icon="seedling" flip="v" style="background:MistyRose" />

#### List
- `tag` (string) Tag name, `ul` or `ol`. Default `ul`.

    <fa:list>
        <li><fa:solid icon="check-square" />List icons can</li>
    </fa:list>

#### Stack
- `size` (string) Icon size, `xs`, `sm`, `lg`, `2x`, `3x`, `4x`, `5x`, `6x`, `7x`, `8x`, `9x`, `10x`.

    <fa:stack>
        <fa:solid icon="square" large="true" />
        <fa:solid icon="twitter" inverse="true" />
    </fa:stack>

#### Mask
- `icon` (string) [Icon name](https://fontawesome.com/icons). **Required**
- `family` (string) Family name.
- `id` (string) Mask ID.

    <fa:mask.solid icon="comment">
        <fa:solid icon="pencil-alt" shrink="10" up="0.5" />
    </fa:mask.solid>

#### Layer
- `width` (boolean) Fixed width. Default `true`.
- `size` (string) Icon size.

    <fa:layer style="background:MistyRose">
        <fa:solid icon="circle" style="color:Tomato" />
        <fa:solid icon="times" inverse="true" style="color:Tomato" />
    </fa:layer>

Layering Text
- `inverse` (boolean) Inverse color. Default `true`.
- `grow` (float) Scale up. Default `0`.
- `shrink` (float) Scale down. Default `0`.
- `up` (float) Move up. Default `0`.
- `right` (float) Move right. Default `0`.
- `down` (float) Move down. Default `0`.
- `left` (float) Move left. Default `0`.

    <fa:layer style="background:MistyRose">
        <fa:solid icon="certificate" />
        <fa:layer.text shrink="11.5" rotate="-30">NEW</fa:layer.text>
    </fa:layer>

Layering Counter
- `position` (string) Counter position, `bottom-left`, `bottom-right`, `top-left`, `top-right`. Default `top-right`.

    <fa:layer style="background:MistyRose">
        <fa:solid icon="envelope" />
        <fa:layer.counter style="background:Tomato">1,419</fa:layer.text>
    </fa:layer>