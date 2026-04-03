# Boilerplate Master
### Production-ready vanilla WordPress classic theme
**Built by Matthew De Nero / ByDeNero Digital Agency**
**GitHub: https://github.com/MattDee87/boilerplate-master**

---

## What this is

Boilerplate Master is a reusable WordPress classic PHP theme built as the foundation for all ByDeNero client projects. It is intentionally neutral — no brand colors, no agency personality, no project-specific decisions baked in.

The core idea is simple:

> **Sizes, spacing, weights, and structure are reusable.**
> **Font choices, colors, and visual personality are project decisions.**

Every new project starts by updating tokens and layering brand styles on top. The base system never changes.

---

## Why not a page builder?

Page builders like Elementor add hundreds of kilobytes of bloat, lock content into proprietary formats, and make performance optimization nearly impossible. This boilerplate uses a custom ACF-powered block system instead:

- Clients manage content through clean ACF fields
- Developers control presentation through PHP templates
- No bloat. No lock-in. Fast by default.

---

## Requirements

| Requirement | Notes |
|---|---|
| WordPress | 6.x or higher |
| PHP | 8.4+ compatible |
| ACF Pro | Required — powers all custom blocks |
| W3 Total Cache | Recommended — caching and performance |
| Font Awesome | Optional — included via kit in functions.php for general icon use |

---

## Quick start — new project setup

Follow these steps in order every time you start a new client project.

### 1. Duplicate and rename
Copy the boilerplate folder and rename it to the client project name.

### 2. Update the theme header in style.css
```css
/*
Theme Name:  Client Name Here
Description: Custom WordPress theme for Client Name
Text Domain: clientslug
*/
```

### 3. Swap fonts
In `style.css` update the three font import sections:
- **Section 1a** — Body font `@import` URL
- **Section 1b** — Heading font `@import` URL
- Then update `--font-body` and `--font-heading` in `:root`

### 4. Update color tokens
In `style.css` `:root` update these five at minimum:
```css
--color-primary:        #YOUR_COLOR;
--color-accent:         #YOUR_COLOR;
--color-accent-hover:   #YOUR_COLOR;
--color-bg:             #YOUR_COLOR;
--color-bg-dark:        #YOUR_COLOR;
```

### 5. Mirror changes in theme.json
Update the matching entries in `theme.json`:
- `settings.color.palette` — update hex values
- `settings.typography.fontFamilies` — update font names and Google Fonts URLs
- `styles.elements` — heading, link, and button colors

### 6. Import ACF field groups
Go to **ACF → Tools → Import** and import all JSON files from `~acf_imports/`. All 14 field groups will be set up instantly.

### 7. Add brand overrides
Scroll to **Section 10** at the bottom of `style.css` and add project-specific styles — nav branding, special button treatments, glow effects, custom header styling.

### 8. Remove test fonts when fonts are chosen
Delete Section 1d imports and Section 8c font testing classes from `style.css`. Delete or unpublish the Font Test page.

### 9. Remove unused blocks and templates
Delete any block folders from `~wp_blocks/` that the project doesn't need. Remove unused template files and their entries from `theme.json` customTemplates.

### 10. Push to staging and verify
Open the **Master Boilerplate** page — if the color swatches and spacing bars reflect your new tokens, the entire system is configured correctly.

---

## Design token system

All design values live as CSS custom properties in `style.css` `:root`. The same values are mirrored in `theme.json` for the block editor. **When you update tokens for a new project — update both files.**

### Colors
```css
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
--color-rating         /* Star rating gold */
```

### Typography
```css
--font-body            /* Paragraph text, UI elements */
--font-heading         /* H1 through H6 */
--font-accent          /* Code blocks, labels, mono */
```

### Type scale
```css
--text-xs     /* 12px */
--text-sm     /* 14px */
--text-base   /* 16px */
--text-md     /* 18px */
--text-lg     /* 20px */
--text-xl     /* 24px */
--text-2xl    /* 28px */
--text-3xl    /* 36px */
--text-4xl    /* 48px */
```

### Spacing scale
```css
--space-1   /* 4px */
--space-2   /* 8px */
--space-3   /* 12px */
--space-4   /* 16px */
--space-5   /* 20px */
--space-6   /* 24px */
--space-8   /* 32px */
--space-10  /* 40px */
--space-12  /* 48px */
--space-16  /* 64px */
--space-20  /* 80px */
--space-24  /* 96px */
```

### Layout
```css
--max-width          /* 1200px — content width */
--wrapper-padding    /* 40px — side padding */
```

---

## Directory structure

```
theme-root/
├── style.css                     ← Master stylesheet + design tokens
├── theme.json                    ← Block editor bridge + token mirror
├── functions.php                 ← Theme setup, enqueues, menus, blocks
├── screenshot.png                ← Theme preview (1200x900)
├── CLAUDE.md                     ← AI context file for Claude Code
├── .cursorrules                  ← AI context file for ChatGPT/Codex
├── .gitignore                    ← Git ignore rules
│
├── Core Templates
│   ├── front-page.php            ← Homepage (block-driven, minimal)
│   ├── home.php                  ← Blog listing page
│   ├── page.php                  ← Default inner pages
│   ├── single.php                ← Individual blog posts
│   ├── index.php                 ← Fallback template
│   ├── 404.php                   ← Page not found
│   ├── archive.php               ← Category/tag/date archives
│   └── search.php                ← Search results
│
├── Custom Templates
│   ├── template-boilerplate.php  ← Kitchen sink style guide (internal)
│   ├── template-font-test.php    ← Client font selection page
│   ├── template-full-width.php   ← Full width page template
│   └── template-landing.php      ← Conversion landing page (no nav)
│
├── partials/
│   ├── header-html.php           ← Visible header HTML + nav
│   ├── footer-html.php           ← Visible footer HTML
│   ├── seo_meta.php              ← SEO, OpenGraph, JSON-LD schema
│   ├── dashboard_fixes.php       ← WP admin hardening + utilities
│   └── campaign-success.php      ← Landing page thank you page with optional ?cid lookup
│
├── ~wp_blocks/                   ← 12 ACF-powered custom blocks
│   ├── Hero/
│   ├── accordion/
│   ├── callout/
│   ├── contact_block/
│   ├── cta_banner/
│   ├── event/
│   ├── gallery/
│   ├── page_list/
│   ├── profiles_block/
│   ├── program/
│   ├── testimonials/
│   └── video/
│
├── ~common_features/
│   ├── ada_responsive_nav/       ← Responsive nav system active by default
│   └── landing_pages/            ← Landing page CPT system
│
├── ~js_plugins/                  ← Third party JS (commented out by default)
│   ├── owl-carousel/             ← Required by gallery block
│   ├── lightbox/
│   ├── lity/
│   └── fitVids/
│
├── ~acf_imports/                 ← ACF field group JSON exports (14 files)
│
├── js/
│   ├── jquery3.js                ← Custom jQuery
│   └── scripts.js                ← Scroll to top + global JS
│
├── css/
│   └── wufoo.css                 ← Wufoo form embed styles
│
└── Guides/                       ← Developer documentation
```

---

## The 12 custom blocks

All blocks live in `~wp_blocks/` and auto-register via a glob loop in `functions.php`. Every block follows the same 4-file pattern: `block.json`, `.php`, `.css`, and optionally `.js`.

All blocks appear under the **Boilerplate Blocks** category in the WordPress block editor.

| Block | Title | Description |
|---|---|---|
| Hero | Hero | Full width banner with background image, heading, subheading, paragraph, and dual CTAs |
| accordion | Accordion | Collapsible content panels powered by jQuery |
| callout | Highlighted Content | Bordered highlight box for important content |
| contact_block | Contact Us CTA | Contact box with phone number and optional form embed |
| cta_banner | CTA Banner | Full width conversion strip between page sections |
| event | Event | Event card with title, location, date, and time |
| gallery | Custom Gallery | Image slideshow powered by Owl Carousel |
| page_list | Page Blocks | Grid of linked page cards |
| profiles_block | Profiles | Team member or staff profiles with bio and photo |
| program | Program | Program info card with optional PDF download |
| testimonials | Testimonials | Client testimonial grid with star ratings |
| video | Video | Lightbox popup video player supporting YouTube, Vimeo, and Loom |

---

## ACF field groups

All 14 ACF field group configurations are exported as JSON in `~acf_imports/`. On a new project import all files via **ACF → Tools → Import** for instant setup.

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
| `acf-gallery-block.json` | Gallery block fields |
| `acf-page-list-block.json` | Page List block fields |
| `acf-profiles-block.json` | Profiles block fields |
| `acf-program-block.json` | Program block fields |
| `acf-testimonials-block.json` | Testimonials block fields |
| `acf-video-block.json` | Video block fields |

---

## Special templates

### Master Boilerplate (template-boilerplate.php)
The kitchen sink style guide. Assign this template to any page to see every design element — color swatches, typography scale, spacing bars, buttons, forms, tables, and a new project checklist. This is your QA tool. If it looks right here the whole site is right.

### Font Test Page (template-font-test.php)
Shows all 8 test fonts side by side with full type specimens for client review. Share the URL with the client — it's a draft page, not public. Once fonts are chosen delete the test font imports from `style.css` and remove or unpublish this page.

**The 8 test fonts:**
Inter, Sora, Outfit, Manrope, Poppins, Space Grotesk, Barlow, Rajdhani

### Full Width (template-full-width.php)
A full width page template with no content width constraint. Use for pages where blocks handle their own widths via `alignwide` and `alignfull`.

### Landing Page (template-landing.php)
A conversion-focused template with no header navigation and a minimal footer. Clicking away is removed intentionally — visitors stay focused on the single goal of the page. Includes a trust bar and legal nav — both commented out and ready to activate per project.

---

## Common features

### ADA Responsive Navigation
Located in `~common_features/ada_responsive_nav/`. Active by default on all projects. Provides desktop navigation, dropdown menus, and an animated SVG hamburger menu for mobile. The `theme_Menu_Walker` class powers the nav output in `partials/header-html.php`. The submenu arrow now uses a pure CSS chevron, so Font Awesome is not required for the nav itself. Supports WordPress custom logo via `has_custom_logo()` with a text fallback when no logo is set.

### Landing Pages CPT
Located in `~common_features/landing_pages/`. Registers a `campaign` custom post type for marketing landing pages that live outside the normal WordPress sitemap. The active success page is `partials/campaign-success.php` at `/campaign-success` and is generic by default, but becomes campaign-aware when a `?cid=` parameter matches a campaign CPT via the `tracking_id` field.

---

## JS plugins — commented out by default

Third party plugins live in `~js_plugins/`. Most are commented out in `functions.php` and can be enabled per project as needed.

| Plugin | Use case | Uncomment in functions.php |
|---|---|---|
| Owl Carousel | Gallery block slideshow | Already active in V3 |
| Lightbox | Image lightboxes | `lightbox-core-css` + `lightbox-core-js` |
| Lity | Inline lightboxes | `lity-core-css` + `lity-core-js` |
| FitVids | Responsive video embeds | `fitVids-core-js` |

**Note: Owl Carousel is already active in the current V3 boilerplate because the Gallery block depends on it.**

---

## SEO and schema

The `partials/seo_meta.php` file handles all SEO output:
- Custom meta title and description via ACF fields per page
- Canonical URL generation
- OpenGraph tags for social sharing
- Twitter Card tags
- JSON-LD schema markup for Article post type
- JSON-LD LocalBusiness schema (fill in once per project)

---

## Tracking scripts

The `partials/dashboard_fixes.php` file sets up a Theme Settings options page. After importing `global-tracking-scripts.json`, three tracking script tabs appear in WordPress admin so analytics code can be managed without editing theme files.

- **Head Scripts** — loads in `<head>`
- **Body Scripts Top** — loads at top of `<body>`
- **Body Scripts Bottom** — loads before `</body>`

---

## How to add a new block

1. Create a new folder in `~wp_blocks/` — e.g. `~wp_blocks/my_block/`
2. Create `block.json` — set `"category": "boilerplate-blocks"`
3. Create `my_block.php` — pull ACF fields with `get_field()`, output escaped HTML
4. Create `my_block.css` — use tokens only, no hardcoded values
5. Create `my_block.js` — only if interactivity is needed
6. Create an ACF field group in WordPress admin — set location rule to your block
7. Export the field group as JSON and add to `~acf_imports/`

The block auto-registers immediately — no code changes to `functions.php` needed.

**Golden rules for block CSS:**
- Always use `var(--token-name)` — never hardcode hex values
- Never use `!important` unless there is absolutely no alternative
- Block CSS lives inside the block folder only

**Golden rules for block PHP:**
- Always escape output — `esc_html()`, `esc_url()`, `esc_attr()`, `wp_kses_post()`
- Use `wp_kses_post()` for WYSIWYG content
- Use `is_array()` safety check when ACF returns image or file arrays

---

## How to remove bloat per project

This boilerplate ships with everything. Strip it down per project before launch.

| Item | How to remove |
|---|---|
| Unused blocks | Delete entire block folder from `~wp_blocks/` |
| Test fonts | Delete Section 1d imports + Section 8c classes in `style.css` |
| Font test template | Delete `template-font-test.php` + remove from `theme.json` customTemplates |
| Boilerplate style guide | Delete `template-boilerplate.php` + remove from `theme.json` customTemplates |
| Full width template | Delete `template-full-width.php` + remove from `theme.json` customTemplates |
| Landing page template | Delete `template-landing.php` + remove from `theme.json` customTemplates |
| Blog templates | Delete `home.php`, `single.php`, `archive.php` if no blog needed |

---

## Frequently asked questions

**Why are all values CSS variables instead of hardcoded?**
So you change one value and the entire site updates. On a new project you update the tokens once — colors, fonts, spacing — and every block, template, and component inherits the change automatically. No hunting through files.

**Why do both style.css and theme.json need updating?**
`style.css` controls the front end. `theme.json` controls the block editor. They are separate systems. If you only update `style.css` the front end looks right but the editor still shows old colors. Update both and everything stays in sync.

**Why background images instead of img tags for some blocks?**
Background images give precise control over aspect ratio and cropping — critical for the Gallery and Hero blocks. Blog post thumbnails use standard `<img>` tags because they need to be readable by search engines and screen readers.

**Why are tracking scripts in the CMS instead of the code?**
Every client project has different analytics tools. Putting the script slots in ACF Theme Settings means you never need to edit PHP files to add or change tracking codes. The client or account manager can update them directly in WordPress admin.

**Why is the homepage (front-page.php) nearly empty?**
Every client homepage is different. Rather than hardcoding sections that you'll fight against on every project, the homepage is 100% block-driven. You compose it in the WordPress editor using the custom blocks. The template gets out of the way and lets the blocks do the work.

**What does "escaping" mean and why does it matter?**
Escaping cleans user input before printing it on screen so it can never be used as an attack. If someone pastes malicious code into a WordPress field — without escaping it executes. With escaping it gets converted to harmless text. All dynamic output in this boilerplate uses `esc_html()`, `esc_url()`, `esc_attr()`, or `wp_kses_post()` as appropriate.

---

## Guides

Detailed guides live in the `Guides/` folder:

| Guide | Purpose |
|---|---|
| `SETUP_GUIDE.md` | Step by step deployment and configuration |
| `theme_json_guide.md` | How to configure theme.json per client |
| `STYLESHEET_GUIDE.md` | How to use style.css and the token system |
| `Block_Creating_Guide.md` | How to build a new custom block |
| `JS_Plugins_Guide.md` | How to activate and use JS plugins |
| `landing_pages_guide.md` | How the campaign CPT and success-page tracking flow work |
| `ada_responsive_nav_guide.md` | How the active responsive navigation system works |

---

## AI context files

This boilerplate includes context files for AI coding assistants:

- **`CLAUDE.md`** — Read by Claude Code in VS Code. Contains full project structure, CSS rules, PHP conventions, block names, and workflow instructions.
- **`.cursorrules`** — Read by ChatGPT/Codex in VS Code. Same information formatted for Codex.

These files mean any AI assistant can onboard to this project instantly without manual explanation.

---

## Known issues and V4 roadmap

- Post card CSS duplicated across `home.php`, `archive.php`, `search.php`, `index.php` — consolidate into `style.css` Section 6
- Block naming inconsistency — mix of snake_case, camelCase, PascalCase — standardize to kebab-case
- ADA nav submenu trigger markup still uses focusable divs — upgrade to semantic buttons + stronger ARIA in V4
- Event block date field — replace text input with ACF Date Picker field type
- Event block — add optional Google Maps embed
- Profiles block — remove medical-specific resident fields, make generic
- Fluid typography in `theme.json` — add mobile-specific size overrides
- Color picker in block editor not applying to all text elements — theme.json configuration
- Verify Font Awesome setup around the free version and standardize kit usage

---

## License

MIT — free to use, modify, and distribute.

---

*Boilerplate Master v3*
*Built by Matthew De Nero / ByDeNero Digital Agency*
*https://github.com/MattDee87/boilerplate-master*
v3.0.0.1