BOILERPLATE MASTER v3: MASTER OVERVIEW
ByDeNero WordPress Boilerplate — production-ready custom theme with design tokens and ACF-powered reusable blocks.

Use this document when working with AI assistants or onboarding collaborators. It is the high-level map of how the V3 boilerplate is structured after the latest alignment pass.

QUICK FACTS
Theme Name: Boilerplate Master
Author: Matthew De Nero
Version: 3.0
Type: Custom WordPress classic PHP theme
Core Tech: ACF Pro + Design Tokens + WordPress Blocks + jQuery 3
Philosophy: Performance-first, reusable structure, project-specific branding layered on top

CORE PRINCIPLES
The Token Handshake: All styles derive from `:root` variables in `style.css`, mirrored in `theme.json` so editor and frontend stay aligned.
Late Escaping: Dynamic output is cleaned at the point of output with standard WordPress escaping functions.
Cleanliness: Organized folder structure with a self-registering block loop and reusable common features.

COMPLETE DOCUMENTATION GUIDES
Core: `README.md`, `SETUP_GUIDE.md`, `FINISHING_GUIDE.md`
Technical: `theme_json_guide.md`, `STYLESHEET_GUIDE.md`, `Block_Creating_Guide.md`
Components: `JS_Plugins_Guide.md`, `header_footer_guide.md`, `dashboard_fixes.md`, `landing_pages_guide.md`, `ada_responsive_nav_guide.md`

V3 FOLDER STRUCTURE
theme-root/
├── style.css                     [Master tokens + global styles]
├── theme.json                    [Editor settings + token mirror]
├── functions.php                 [Theme setup, enqueues, menus, blocks]
├── README.md                     [Project readme]
├── CLAUDE.md                     [AI context file for Claude Code]
├── .cursorrules                  [AI context file for ChatGPT/Codex]
├── .gitignore                    [Git ignore rules]
│
├── Core Templates
│   ├── front-page.php            [Homepage, block-driven]
│   ├── home.php                  [Blog listing]
│   ├── page.php                  [Default inner pages]
│   ├── single.php                [Blog posts]
│   ├── index.php                 [Fallback]
│   ├── 404.php                   [Not found]
│   ├── archive.php               [Category/tag/date archives]
│   └── search.php                [Search results]
│
├── Custom Templates
│   ├── template-boilerplate.php  [Kitchen sink style guide]
│   ├── template-font-test.php    [Client font selection]
│   ├── template-full-width.php   [Full width pages]
│   └── template-landing.php      [Conversion landing page template]
│
├── partials/
│   ├── header-html.php           [Visible header + responsive nav]
│   ├── footer-html.php           [Visible footer]
│   ├── seo_meta.php              [SEO, OpenGraph, schema]
│   ├── dashboard_fixes.php       [Admin hardening + utilities]
│   └── campaign-success.php      [Thank-you page with optional ?cid lookup]
│
├── ~wp_blocks/                   [12 ACF-powered custom blocks]
├── ~acf_imports/                 [14 JSON field groups]
├── ~common_features/
│   ├── ada_responsive_nav/       [Responsive nav system active by default]
│   └── landing_pages/            [Campaign CPT system]
├── ~js_plugins/                  [Owl active, others optional]
├── js/                           [jquery3.js + scripts.js]
└── Guides/                       [All markdown documentation]

AVAILABLE BLOCKS (12)
All blocks live in the "Boilerplate Blocks" category in the editor.

Hero — impact banner with dual CTAs and background image support
Accordion — collapsible content panels
CTA Banner — full-width conversion strip
Testimonials — quote grid using tokenized rating color
Video — popup video block
Gallery — slideshow powered by Owl Carousel
Page List — grid of internal page cards
Profiles — staff/team profiles
Program — info cards with optional PDF logic
Event — event card/listing block
Callout — highlighted content box
Contact Block — CTA with phone and optional form support

KEY FILES AT A GLANCE
`functions.php`: registers theme supports, menus, enqueues, common features, and auto-registers blocks.
`partials/seo_meta.php`: handles SEO meta output, OpenGraph, and schema.
`partials/dashboard_fixes.php`: removes WordPress admin clutter, adds utilities, and creates Theme Settings.
`partials/header-html.php`: active responsive header/nav structure with custom logo support and SVG hamburger button.
`partials/campaign-success.php`: generic thank-you page with optional campaign-aware messaging via `?cid=`.

QUICK REFERENCE: COMMON TASKS
"I need to add a new block" — create a folder in `~wp_blocks/` using the standard 4-file pattern.
"I need to add tracking scripts" — import `global-tracking-scripts.json`, then use Admin → Theme Settings.
"I need to update the brand" — update `:root` tokens in `style.css`, then mirror them in `theme.json`.
"I need to QA the build" — use `template-boilerplate.php` and the Master Boilerplate page.

SETUP CHECKLIST
1. Fresh WordPress install with ACF Pro active
2. Upload and activate the theme
3. Import all 14 ACF JSON files from `~acf_imports/`
4. Update fonts and tokens in `style.css`
5. Mirror token changes in `theme.json`
6. Create/assign a WordPress menu to "Main Menu"
7. Confirm Theme Settings tabs appear after importing `global-tracking-scripts.json`
8. Test the custom blocks and templates you plan to keep
9. Remove test fonts once final fonts are chosen
10. Remove unused blocks/templates before launch
11. Push to staging and verify nav, tracking, templates, and content flow

KNOWN ISSUES & V4 ROADMAP
- Post card CSS still duplicated across some blog templates
- Block slug naming is still inconsistent
- ADA nav submenu triggers should be upgraded from focusable divs to semantic buttons
- `seo_meta.php` and `seo_meta.md` still need a deeper cleanup pass
- Theme Settings would benefit from an admin-side help panel
- Font Awesome setup should be standardized around the free version

FOR AI ASSISTANTS
- Always use tokens instead of hardcoded design values
- Always use late escaping for dynamic output
- Do not suggest page builders for this boilerplate
- Blocks auto-register from `~wp_blocks/`
- ADA nav is already active by default in V3
- `campaign-success.php` supports generic fallback plus optional `?cid=` lookup

Last Updated: April 2026
