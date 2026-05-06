# CLAUDE.md — Boilerplate Master
### AI Context File for Claude Code
### Last updated: March 2026

---

## What this file is

This file gives Claude Code full context about the Boilerplate Master WordPress theme.
Read this before making any changes to the codebase.

---

## Project overview

**Boilerplate Master** is a production-ready vanilla WordPress classic PHP theme built by Matthew De Nero / ByDeNero digital agency. It is a reusable starting point for all client projects — not a branded theme.

**Core philosophy:**
- Sizes, spacing, weights, and structure are reusable across every project
- Font choices, colors, and visual personality are project-level decisions
- Every value that could vary per project lives in a CSS token or theme.json entry
- No hardcoded hex values. No hardcoded font names. No `!important` unless absolutely unavoidable.

---

## Local file path

```
/Users/matthewdenero/Work/Boilerplates /Mine/WordPress-Boilerplate-master v3
```

---

## Theme info

| Property | Value |
|---|---|
| Theme Name | Boilerplate Master |
| Text Domain | `boilerplate` |
| Author | Matthew De Nero |
| GitHub | https://github.com/MattDee87/boilerplate-master |
| Type | Classic PHP theme (NOT a block/FSE theme) |
| WordPress | 6.x+ |
| PHP | 8.4+ compatible |
| ACF | ACF Pro required |

---

## Directory structure

```
theme-root/
├── style.css                     ← Master stylesheet + design tokens
├── theme.json                    ← Block editor bridge + token mirror
├── functions.php                 ← Theme setup, enqueues, menus, blocks
├── screenshot.png                ← Theme preview (1200x900)
├── header.php                    ← WordPress <head>, scripts, body open
├── footer.php                    ← wp_footer(), closing tags
├── front-page.php                ← Homepage (block-driven, minimal)
├── home.php                      ← Blog listing page
├── page.php                      ← Default inner pages
├── single.php                    ← Individual blog posts
├── index.php                     ← Fallback template
├── 404.php                       ← Page not found
├── archive.php                   ← Category/tag/date archives
├── search.php                    ← Search results
├── template-boilerplate.php      ← Kitchen sink style guide (internal)
├── template-font-test.php        ← Client font selection page
├── template-full-width.php       ← Full width page template
├── template-landing.php          ← Conversion landing page (no nav)
├── CLAUDE.md                     ← This file
├── README.md                     ← Project readme (needs rewrite)
│
├── partials/
│   ├── header-html.php           ← Visible header HTML + nav
│   ├── footer-html.php           ← Visible footer HTML
│   ├── seo_meta.php              ← SEO, OpenGraph, schema markup
│   ├── dashboard_fixes.php       ← WP admin hardening + utilities
│   └── campaign-success.php      ← Landing page thank you with optional ?cid lookup
│
├── ~wp_blocks/                   ← All 15 ACF-powered custom blocks
│   ├── Hero/
│   ├── accordion/
│   ├── callout/
│   ├── contact_block/
│   ├── cta_banner/
│   ├── event/
│   ├── flexible_content/
│   ├── gallery/
│   ├── image_grid/
│   ├── page_list/
│   ├── profiles_block/
│   ├── program/
│   ├── split_view/
│   ├── testimonials/
│   └── video/
│
├── ~common_features/
│   ├── ada_responsive_nav/       ← Responsive nav system active by default
│   └── landing_pages/            ← Landing page CPT system
│
├── ~js_plugins/                  ← Third party JS plugins (Owl Carousel active; rest commented out)
│   ├── fitVids/
│   ├── lightbox/
│   ├── lity/
│   └── owl-carousel/             ← Required by gallery block
│
├── ~acf_imports/                 ← ACF field group JSON exports
│   ├── seo-meta.json
│   ├── global-tracking-scripts.json
│   └── [12 block field group JSON files]
│
├── js/
│   ├── jquery3.js                ← Custom jQuery (replaces WP default)
│   └── scripts.js                ← Main theme JS (empty doc ready)
│
├── css/
│   └── wufoo.css                 ← Third party Wufoo form styles
│
└── Guides/                       ← Developer documentation
```

---

## Design token system

**All design values live as CSS custom properties in `style.css` `:root`.**
**All the same values are mirrored in `theme.json` for the block editor.**

When updating tokens for a new project — update BOTH files.

### Key tokens

```css
/* Colors */
--color-primary        /* Headings, main text */
--color-secondary      /* Supporting text */
--color-accent         /* Links, buttons, highlights */
--color-accent-hover   /* Hover state */
--color-bg             /* Page background */
--color-bg-alt         /* Cards, alternate sections */
--color-bg-dark        /* Header, footer, dark sections */
--color-text           /* Body text */
--color-text-muted     /* Secondary text */
--color-text-inverse   /* Text on dark backgrounds */
--color-border         /* Borders, dividers, inputs */

/* Typography */
--font-body            /* Paragraph text, UI */
--font-heading         /* H1-H6 */
--font-accent          /* Code, labels, mono */

/* Type scale */
--text-xs through --text-4xl

/* Spacing */
Spacing tokens are not continuous. Only use spacing tokens explicitly defined in `style.css` `:root`: `--space-1`, `--space-2`, `--space-3`, `--space-4`, `--space-5`, `--space-6`, `--space-8`, `--space-10`, `--space-12`, `--space-16`, `--space-20`, and `--space-24`. Do not invent intermediate tokens such as `--space-14`.

/* Borders */
--radius-sm, --radius-md, --radius-lg, --radius-xl, --radius-full

/* Shadows */
--shadow-sm, --shadow-md, --shadow-lg

/* Layout */
--max-width            /* 1200px default */
--wrapper-padding      /* 40px default */
```

---

## CSS rules — strictly enforced

```
✅ Always use CSS tokens (var(--token-name))
✅ Always use tokens for spacing, colors, radii, shadows, font sizes
✅ Block CSS lives inside the block folder only
✅ Site-wide styles live in style.css only
   Exception: ~common_features/ CSS files and css/ third-party files are exempt.
   Those locations exist specifically for common feature systems (ada_responsive_nav)
   and third-party plugin styles (wufoo.css). Do not add project styles there.
✅ Per-template styles live in a <style> block at the bottom of the template file
❌ Never hardcode hex color values in any CSS file
❌ Never hardcode pixel values when a token exists
❌ Never use !important unless there is no alternative
❌ Never create a new standalone CSS file outside of the block folder structure
   Exception: ~common_features/ and css/ are the only permitted locations for
   standalone CSS files outside block folders. These are exempt by design.
❌ Never add styles to an arbitrary location — everything has a designated home
❌ Never create page-specific variant names (e.g. about-feature, work-banner). Use body.page-{slug} selectors in CSS to scope per-page overrides. See STYLESHEET_GUIDE.md for the full pattern.
```

## Boilerplate-specific: intentional CSS duplication in block files

This is the boilerplate master — not a live project. Blocks are regularly copied individually to new client projects. When that happens, the block folder (`~wp_blocks/block-name/`) must work completely standalone. It cannot rely on shared patterns that only exist in `style.css §10` of this boilerplate.

**Rule: Every block CSS file in the boilerplate must be fully self-contained.** This means some CSS rules intentionally appear in BOTH a block CSS file AND in `style.css §10`. That duplication is required here and is NOT a violation of the shared pattern rule.

**How the two files relate:**
- `style.css §10` — shows the shared consolidated version as it would look on a live project. Serves as working documentation and a reference for developers.
- Block CSS file — ships the complete rule so the block works when dropped into any new project, with or without the §10 consolidation in place.

**What to do on a live project:** Once a pattern is consolidated into `style.css §10`, you can remove the duplicate from the block CSS file. In the boilerplate, never remove it.

Look for `BOILERPLATE NOTE:` comments in block CSS files — these mark exactly which rules are intentionally duplicated and explain what to trim on a live project.

---

## CSS Rule Order — Critical

Block style variant rules MUST come AFTER the base
block rule in CSS files. If style rules come before
the base rule the base rule will override them due
to CSS cascade order.

CORRECT order in any block CSS file:
1. Base rule: .block_name { width: 100%; ... }
2. Style variants AFTER: .hero_style_full-width { width: 100vw; }

WRONG order:
1. Style variants: .hero_style_full-width { width: 100vw; }
2. Base rule: .block_name { width: 100%; } ← overrides everything above

This caused a major bug with CTA Banner full width
not working — fixed by moving style rules after
the base .cta_banner rule.

---

## CSS organization architecture

### What belongs where

**`style.css`** is the project design system. It contains tokens, typography defaults, wrapper utilities, and all shared visual patterns: shared buttons, pill labels, eyebrows, title plate treatments, gradient/accent lines, card/glass panels, header, footer, global overlays, page-scoped overrides (`body.page-{slug}`), and small utilities.

**Block CSS files** contain only what is unique to that block: grid layout, variant behavior, block-specific responsive rules, and one-off positioning. Nothing shared.

**The shared pattern rule:** If the same visual treatment appears in more than one block, it belongs in `style.css` Section 10, not duplicated in each block's CSS file.

### Block wrapper pattern

Every block must use an outer `<section>` and an inner `.wrapper` div. Variant and style classes belong on the outer section:

```html
<section class="block_name block_name_variant_[variant] block_name_style_[style]">
    <div class="wrapper block_name_wrapper">
        ...
    </div>
</section>
```

**Responsibilities:**
- **Outer section** (`.block_name`) — background color, full-width behavior, vertical spacing. Variant and style classes belong here.
- **`.wrapper`** — max-width, `margin: auto`, horizontal padding (defined once in `style.css` §5a)
- **Block wrapper class** (`.block_name_wrapper`) — block-specific layout only

**Rules:**
- Do not redefine `max-width`, `margin: auto`, or horizontal padding in individual block CSS
- Always use both wrapper classes together: `class="wrapper block_name_wrapper"`
- Variant and style classes go on the outer section, never on the inner wrapper
- Variants change layout, styling, backgrounds, and behavior — they do not recreate the basic wrapper geometry unless there is a documented exception

### Global element selector rule

Global element selectors (`h1`–`h6`, `p`, `a`) in `style.css` §4 must stay foundational — `font-family`, `font-size`, `line-height`, `color`, `margin`. Decorative treatments (heading underlines, `display: inline-block` on headings, complex pseudo-elements on bare selectors) must be opt-in classes or shared patterns in §10, not bare global element rules. If a project intentionally applies stronger global styling, add a comment documenting the choice.

Full reference: `Guides/STYLESHEET_GUIDE.md` — CSS Organization Architecture section.

### main layout constraint — known legacy issue

`main` in `style.css` §5b is currently constrained with `max-width`, `margin: auto`, and horizontal padding. This is convenient for normal text-heavy page templates but forces full-width blocks to break out using:

```css
width: 100vw;
margin-left: calc(50% - 50vw);
margin-right: calc(50% - 50vw);
```

**Rules:**
- Do not add this breakout math to new blocks — it is a workaround for the constrained `main`, not the right pattern
- Do not change the `main` rule in isolation — it must be changed as part of a coordinated layout cleanup that simultaneously removes breakout math from all block CSS files and ensures every block uses the outer `<section>` + inner `.wrapper` pattern
- The `.wrapper` class already handles correct containment — once `main` is unconstrained, blocks using `.wrapper` will work correctly without breakout math

**Long-term direction:** `main` becomes unconstrained. Each block owns its containment via `.wrapper`. Normal text-heavy pages use a dedicated content wrapper instead of relying on the global `main` constraint.

---

## PHP conventions

Match the existing code style throughout the theme:

```php
// Short echo tags — preferred
<?= $variable; ?>

// ACF field pattern — always used for block data
$title = get_field('field_name');
if ( $title ) : ?>
    <h2><?= $title; ?></h2>
<?php endif; ?>

// WordPress functions — always use proper escaping
echo esc_html( $variable );
echo esc_url( $url );
echo esc_attr( $attribute );

// Subfields inside repeaters
while ( have_rows('repeater_field') ) : the_row();
    $item = get_sub_field('sub_field_name');
endwhile;
```

---

## Block architecture

Every block follows the same 4-file pattern:

```
~wp_blocks/block-name/
├── block.json      ← Registration, metadata, ACF config
├── block-name.php  ← Render template, pulls ACF fields
├── block-name.css  ← Block styles using tokens only
└── block-name.js   ← Interactivity (only if needed)
```

**Block auto-registration:** All blocks are registered automatically via a glob loop in `functions.php`. No manual registration needed when adding new blocks.

**Block JS files** are declared via `viewScript` in `block.json` and loaded automatically by WordPress on pages that use the block.

### Block JS — two loading patterns

Some blocks load their JS via scripts.js rather than viewScript:

- **Gallery** — carousel init lives in scripts.js. No viewScript in block.json.
- **Accordion** — click handler lives in scripts.js. No viewScript in block.json.
- **Video** — lightbox JS lives in video.js, loaded via viewScript in block.json.

Why: Gallery and Accordion depend on jQuery and Owl Carousel being loaded first.
Moving their init code to scripts.js guarantees correct dependency order.
scripts.js declares both jquery and owl-core-js as dependencies in functions.php.

**Block category:** All 15 blocks use `"category": "boilerplate-blocks"` and appear under the "Boilerplate Blocks" group in the editor. The category is registered via `add_filter( 'block_categories_all' )` in `functions.php`.

### All 15 blocks and their exact name values

⚠️ Note: Block naming is inconsistent — a mix of snake_case, camelCase, and PascalCase. This is a known issue to standardize in a future version. Use the exact values below when referencing blocks.

| Block Folder | block.json name | Title |
|---|---|---|
| `Hero/` | `custom_hero` | Hero |
| `accordion/` | `custom_accordion` | Accordion |
| `callout/` | `custom_calloutBlock` | Highlighted Content |
| `contact_block/` | `custom_contactBlock` | Contact Us Call-To-Action |
| `cta_banner/` | `custom_cta_banner` | CTA Banner |
| `event/` | `customEvent` | Event |
| `flexible_content/` | `custom_flexible_content` | Flexible Content Section |
| `gallery/` | `custom_gallery` | Custom Gallery |
| `image_grid/` | `custom_image_grid` | Image Grid |
| `page_list/` | `custom_Page_List` | Page Blocks |
| `profiles_block/` | `profilesBlock` | Profiles |
| `program/` | `customProgram` | Program |
| `split_view/` | `custom_split_view` | Split View |
| `testimonials/` | `custom_testimonials` | Testimonials |
| `video/` | `custom_video` | Video |

### Block CSS standard header

Every block CSS file must start with this comment header:

```css
/*
==========================================================
BLOCK NAME — block-name.css
==========================================================
WHAT IT IS:
Brief description of what this block is.

WHAT IT DOES:
Brief description of what it does.

HOW TO USE:
1. Step one
2. Step two

All values use boilerplate CSS tokens from style.css.
==========================================================
*/
```

---

## functions.php — important notes

**Do not modify these sections without asking Matt first:**
- `dashboard_fixes.php` include — sensitive admin hardening
- Block auto-registration loop — works automatically, don't break it
- jQuery replacement decision — intentional in this boilerplate

**Safe to modify:**
- Enqueue section — uncomment plugins as needed per project
- Menu registration — add new menu locations per project
- `boilerplate_theme_support()` — add new theme support as needed
- `boilerplate_create_starter_pages()` — add new auto-created pages

---

## Common features

### ADA Responsive Nav
Located in `~common_features/ada_responsive_nav/`

- `functions.php` — defines `theme_Menu_Walker` class
- `view.php` — reference header markup example
- `script.js` — jQuery hamburger toggle and dropdown handling
- `style.css` — nav styles using CSS tokens

The nav is active by default in V3:
- CSS and JS are enqueued from the main `functions.php`
- `partials/header-html.php` already contains the responsive nav structure
- submenu arrow uses a pure CSS chevron, so Font Awesome is not required for the nav itself
- supports `has_custom_logo()` / `the_custom_logo()` with a text fallback via `get_bloginfo('name')`

The walker class is used in `partials/header-html.php`. Do not remove the include in `functions.php`.

### Landing Pages CPT
Located in `~common_features/landing_pages/`

Registers a `campaign` custom post type for landing pages outside the normal sitemap. The active success page is `partials/campaign-success.php`, which is generic by default and becomes campaign-aware when a `?cid=` parameter matches a campaign `tracking_id`.

---

## JS plugins

All third-party JS plugins live in `~js_plugins/`. Most are commented out in `functions.php` and can be enabled per project as needed:

| Plugin | Use case | Enqueue handle | File path |
|---|---|---|---|
| Owl Carousel | Gallery block slider | `owl-core-js` + `owl-core-css` | `~js_plugins/owl-carousel/` |
| Lightbox | Image lightboxes | `lightbox-core-js` + `lightbox-core-css` | `~js_plugins/lightbox/` |
| Lity | Inline lightboxes | `lity-core-js` + `lity-core-css` | `~js_plugins/lity/` |
| FitVids | Responsive video embeds | `fitVids-core-js` | `~js_plugins/fitVids/` |

Owl Carousel is already active in the current V3 boilerplate because the Gallery block depends on it.

---

## ACF field groups

All ACF field group configurations are exported as JSON in `~acf_imports/`:

| File | Purpose |
|---|---|
| `seo-meta.json` | SEO meta fields on all pages and posts |
| `global-tracking-scripts.json` | Theme Settings tracking script slots |
| `acf-hero-block.json` | Hero block fields |
| `acf-accordion-block.json` | Accordion block fields |
| `acf-callout-block.json` | Callout block fields |
| `acf-contact-block.json` | Contact block fields |
| `acf-cta-banner-block.json` | CTA Banner block fields |
| `acf-event-block.json` | Event block fields |
| `acf-flexible-content-block.json` | Flexible Content Section block fields |
| `acf-gallery-block.json` | Gallery block fields |
| `acf-image-grid-block.json` | Image Grid block fields |
| `acf-page-list-block.json` | Page List block fields |
| `acf-profiles-block.json` | Profiles block fields |
| `acf-program-block.json` | Program block fields |
| `acf-split-view-block.json` | Split View block fields |
| `acf-testimonials-block.json` | Testimonials block fields |
| `acf-video-block.json` | Video block fields |

**To import on a new project:** ACF → Tools → Import → select all JSON files.

---

## New project setup checklist

When starting a new client project using this boilerplate:

1. Duplicate theme folder → rename to client project name
2. Update theme header in `style.css` — Theme Name, URI, description
3. Update `theme.json` — Text Domain if needed
4. Swap font `@import` URLs in `style.css` Section 1a and 1b
5. Update `--font-body` and `--font-heading` in `:root`
6. Update color tokens in `:root` — primary, accent, bg, bg-dark. The ACF color picker palette syncs automatically — no secondary update needed anywhere.
7. Mirror all token changes in `theme.json` — palette + fontFamilies + styles
8. Import ACF field groups via ACF → Tools → Import
9. Add brand overrides in Section 10 of `style.css`
10. Remove test font imports (Section 1d) and classes (Section 8c) when fonts chosen
11. Remove unused blocks from `~wp_blocks/` if not needed
12. Remove unused templates if not needed
13. Update `theme.json` customTemplates if templates were removed
14. Push to staging and verify

---

## Removing bloat for a specific project

This boilerplate ships with everything. Strip it down per project:

| Item | How to remove |
|---|---|
| Unused blocks | Delete entire block folder from `~wp_blocks/` |
| Test fonts | Delete Section 1d imports + Section 8c classes in `style.css` |
| Font test page | Delete `template-font-test.php` + remove from `theme.json` customTemplates |
| Boilerplate style guide | Delete `template-boilerplate.php` + remove from `theme.json` customTemplates |
| Blog templates | Delete `home.php`, `single.php`, `archive.php` if no blog needed |
| Landing page template | Delete `template-landing.php` + remove from `theme.json` customTemplates |
| Full width template | Delete `template-full-width.php` + remove from `theme.json` customTemplates |

---

## Known issues and future improvements

- **Block naming inconsistency** — block name values mix snake_case, camelCase and PascalCase. Standardize to kebab-case in V4.
- **Shared post card CSS** — `.post-card` and `.post-grid` styles duplicated across `index.php`, `archive.php`, `search.php`, `home.php`. Consolidate into `style.css` Section 6 in V4.
- **ACF JSON location rules** — verify each block field group location rule after importing. Slugs are lowercase hyphenated versions of block names.

## Completed in v3 hardening session

- ✅ All 7 legacy blocks security hardened — esc_html(), esc_url(), wp_kses_post(), is_array() checks
- ✅ seo_meta.php fully escaped
- ✅ dashboard_fixes.php — esc_url_raw() and is_object() null check added
- ✅ flush_rewrite_rules() moved to after_switch_theme hook
- ✅ campaign-success.php upgraded to support optional `?cid=` campaign lookup
- ✅ Scroll To Top JS active in js/scripts.js
- ✅ All 12 blocks now under boilerplate-blocks category
- ✅ theme.json hardcoded hex values replaced with token references
- ✅ --color-rating token added to style.css
- ✅ hero.php is_array() safety check added
- ✅ .gitignore added to theme root
- ✅ ADA responsive nav activated by default in the main boilerplate
- ✅ Theme Settings tracking import fixed to target `theme-general-settings`

---

## Matt's workflow

Matt (Matthew De Nero) is the sole developer. He works with:
- **Claude Code** (you) — debugging, fixes, new blocks, architecture decisions
- **Alex (ChatGPT)** — creative direction, UX design, client-facing content
- **FileZilla** — FTP uploads to staging server
- **VS Code** — primary code editor

When making changes:
- Always push updated files to staging via FTP after changes
- Always copy updated files to the local master boilerplate folder
- The local master folder is the source of truth for the boilerplate

---

*Boilerplate Master — CLAUDE.md*
*Built by Matthew De Nero / ByDeNero*
*https://github.com/MattDee87/boilerplate-master*
