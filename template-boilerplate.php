<?php
/*
==========================================================
TEMPLATE NAME: Boilerplate Style Guide
==========================================================

WHAT THIS IS:
A kitchen sink style guide page that previews every
element in the boilerplate design system in one place.

HOW TO USE:
1. Go to WordPress Admin → Pages
2. Open the "Master Boilerplate" page
3. In the right panel under "Page Attributes" → Template
4. Select "Boilerplate Style Guide"
5. Save and view the page

WHEN STARTING A NEW PROJECT:
- Update tokens in style.css Section 2
- Refresh this page to see everything update at once
- Use it to QA your design system before building out pages

==========================================================
*/

get_header(); ?>

<main id="main" class="boilerplate-guide">
    <div class="wrapper">

        <!-- ============================================================
             GUIDE HEADER
             ============================================================ -->
        <div class="bp-section bp-header-block">
            <h1>Boilerplate Style Guide</h1>
            <p class="bp-intro">This page previews every element in the design system. Update your tokens in <code>style.css</code> and refresh to see the whole system update at once. This page is for internal use only — not for clients.</p>
            <hr class="bp-divider">
        </div>


        <!-- ============================================================
             SECTION 1 — COLOR TOKENS
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">01 — Color Tokens</h2>
            <p class="bp-section-note">These swatches pull directly from your <code>:root</code> CSS variables. Update the tokens and the swatches update automatically.</p>

            <div class="bp-swatches">

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-primary);"></div>
                    <code>--color-primary</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-secondary);"></div>
                    <code>--color-secondary</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-accent);"></div>
                    <code>--color-accent</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-accent-hover);"></div>
                    <code>--color-accent-hover</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-bg); border: 1px solid var(--color-border);"></div>
                    <code>--color-bg</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-bg-alt); border: 1px solid var(--color-border);"></div>
                    <code>--color-bg-alt</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-bg-dark);"></div>
                    <code>--color-bg-dark</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-text);"></div>
                    <code>--color-text</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-text-muted);"></div>
                    <code>--color-text-muted</code>
                </div>

                <div class="bp-swatch">
                    <div class="bp-swatch-color" style="background: var(--color-border); border: 1px solid var(--color-border);"></div>
                    <code>--color-border</code>
                </div>

            </div>
        </div>


        <!-- ============================================================
             SECTION 2 — TYPOGRAPHY
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">02 — Typography</h2>
            <p class="bp-section-note">Headings use <code>--font-heading</code>. Body text uses <code>--font-body</code>. Code uses <code>--font-accent</code>.</p>

            <!-- Headings -->
            <div class="bp-subsection">
                <p class="bp-label">Headings — H1 through H6</p>
                <h1>H1 — The quick brown fox</h1>
                <h2>H2 — The quick brown fox</h2>
                <h3>H3 — The quick brown fox</h3>
                <h4>H4 — The quick brown fox</h4>
                <h5>H5 — The quick brown fox</h5>
                <h6>H6 — The quick brown fox</h6>
            </div>

            <!-- Type Scale -->
            <div class="bp-subsection">
                <p class="bp-label">Type Scale</p>
                <p style="font-size: var(--text-4xl); line-height: 1.2; margin-bottom: 8px;">text-4xl — 48px</p>
                <p style="font-size: var(--text-3xl); line-height: 1.2; margin-bottom: 8px;">text-3xl — 36px</p>
                <p style="font-size: var(--text-2xl); line-height: 1.2; margin-bottom: 8px;">text-2xl — 28px</p>
                <p style="font-size: var(--text-xl); line-height: 1.2; margin-bottom: 8px;">text-xl — 24px</p>
                <p style="font-size: var(--text-lg); line-height: 1.2; margin-bottom: 8px;">text-lg — 20px</p>
                <p style="font-size: var(--text-md); line-height: 1.2; margin-bottom: 8px;">text-md — 18px</p>
                <p style="font-size: var(--text-base); line-height: 1.2; margin-bottom: 8px;">text-base — 16px</p>
                <p style="font-size: var(--text-sm); line-height: 1.2; margin-bottom: 8px;">text-sm — 14px</p>
                <p style="font-size: var(--text-xs); line-height: 1.2; margin-bottom: 8px;">text-xs — 12px</p>
            </div>

            <!-- Paragraph -->
            <div class="bp-subsection">
                <p class="bp-label">Paragraph</p>
                <p>This is a standard paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                <p>This paragraph has <strong>bold text</strong>, <em>italic text</em>, and a <a href="#">text link</a> to show how inline elements look alongside regular copy.</p>
            </div>

            <!-- Blockquote -->
            <div class="bp-subsection">
                <p class="bp-label">Blockquote</p>
                <blockquote>
                    "Good design is obvious. Great design is transparent." — Joe Sparano
                </blockquote>
            </div>

        </div>


        <!-- ============================================================
             SECTION 3 — LINKS
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">03 — Links</h2>

            <p>
                <a href="#">Standard text link</a> — uses <code>--color-accent</code> with hover transition.<br><br>
                <a href="#" style="text-decoration: underline;">Underlined link</a> — same color, explicit underline.<br><br>
                <a href="#" class="btn" style="display: inline-block; margin-top: 8px;">Link styled as button</a>
            </p>
        </div>


        <!-- ============================================================
             SECTION 4 — BUTTONS
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">04 — Buttons</h2>

            <div class="bp-button-row">
                <a href="#" class="btn">Primary Button</a>
                <a href="#" class="btn btn-outline">Outline Button</a>
                <button type="button" class="btn">Button Element</button>
                <input type="submit" class="btn" value="Submit Input">
            </div>
        </div>


        <!-- ============================================================
             SECTION 5 — LISTS
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">05 — Lists</h2>

            <div class="bp-two-col">

                <div>
                    <p class="bp-label">Unordered List</p>
                    <ul>
                        <li>First list item</li>
                        <li>Second list item with <a href="#">a link inside</a></li>
                        <li>Third list item
                            <ul>
                                <li>Nested item one</li>
                                <li>Nested item two</li>
                            </ul>
                        </li>
                        <li>Fourth list item</li>
                    </ul>
                </div>

                <div>
                    <p class="bp-label">Ordered List</p>
                    <ol>
                        <li>First list item</li>
                        <li>Second list item with <strong>bold text</strong></li>
                        <li>Third list item
                            <ol>
                                <li>Nested item one</li>
                                <li>Nested item two</li>
                            </ol>
                        </li>
                        <li>Fourth list item</li>
                    </ol>
                </div>

            </div>
        </div>


        <!-- ============================================================
             SECTION 6 — CODE
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">06 — Code</h2>

            <p class="bp-label">Inline Code</p>
            <p>Use <code>get_template_part()</code> to include partials. Font is <code>--font-accent</code> (JetBrains Mono by default).</p>

            <p class="bp-label" style="margin-top: var(--space-6);">Code Block</p>
            <pre><code>function boilerplate_setup() {
    register_nav_menus([
        'main-menu'   => __('Main Menu'),
        'footer-menu' => __('Footer Menu'),
    ]);
}
add_action('after_setup_theme', 'boilerplate_setup');</code></pre>
        </div>


        <!-- ============================================================
             SECTION 7 — FORMS
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">07 — Forms</h2>

            <div class="bp-form-demo">

                <div class="bp-two-col">
                    <div>
                        <label for="demo-name">Full Name</label>
                        <input type="text" id="demo-name" placeholder="John Smith">
                    </div>
                    <div>
                        <label for="demo-email">Email Address</label>
                        <input type="email" id="demo-email" placeholder="john@example.com">
                    </div>
                </div>

                <label for="demo-select">Select Option</label>
                <select id="demo-select">
                    <option value="">— Choose an option —</option>
                    <option value="1">Option One</option>
                    <option value="2">Option Two</option>
                    <option value="3">Option Three</option>
                </select>

                <label for="demo-message">Message</label>
                <textarea id="demo-message" placeholder="Your message here..."></textarea>

                <div class="bp-button-row">
                    <button type="submit" class="btn">Submit Form</button>
                    <button type="reset" class="btn btn-outline">Reset</button>
                </div>

            </div>
        </div>


        <!-- ============================================================
             SECTION 8 — TABLE
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">08 — Table</h2>

            <table>
                <thead>
                    <tr>
                        <th>Token</th>
                        <th>Value</th>
                        <th>Usage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>--color-accent</code></td>
                        <td>Project color</td>
                        <td>Links, buttons, highlights</td>
                    </tr>
                    <tr>
                        <td><code>--font-heading</code></td>
                        <td>Project heading font</td>
                        <td>All H1–H6 elements</td>
                    </tr>
                    <tr>
                        <td><code>--font-body</code></td>
                        <td>Project body font</td>
                        <td>Paragraphs, UI, forms</td>
                    </tr>
                    <tr>
                        <td><code>--max-width</code></td>
                        <td>1200px default</td>
                        <td>Wrapper / container width</td>
                    </tr>
                    <tr>
                        <td><code>--space-8</code></td>
                        <td>32px</td>
                        <td>Standard section spacing</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- ============================================================
             SECTION 9 — SPACING SCALE
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">09 — Spacing Scale</h2>
            <p class="bp-section-note">All spacing tokens visualized as horizontal bars.</p>

            <div class="bp-spacing-scale">
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-1);"></div><code>--space-1 &nbsp;— 4px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-2);"></div><code>--space-2 &nbsp;— 8px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-3);"></div><code>--space-3 &nbsp;— 12px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-4);"></div><code>--space-4 &nbsp;— 16px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-5);"></div><code>--space-5 &nbsp;— 20px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-6);"></div><code>--space-6 &nbsp;— 24px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-8);"></div><code>--space-8 &nbsp;— 32px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-10);"></div><code>--space-10 — 40px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-12);"></div><code>--space-12 — 48px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-16);"></div><code>--space-16 — 64px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-20);"></div><code>--space-20 — 80px</code></div>
                <div class="bp-spacing-row"><div class="bp-spacing-bar" style="width: var(--space-24);"></div><code>--space-24 — 96px</code></div>
            </div>
        </div>


        <!-- ============================================================
             SECTION 10 — BORDER RADIUS & SHADOWS
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">10 — Radius &amp; Shadows</h2>

            <div class="bp-cards-row">

                <div class="bp-card" style="border-radius: var(--radius-sm); box-shadow: var(--shadow-sm);">
                    <code>radius-sm</code><br>
                    <code>shadow-sm</code>
                </div>

                <div class="bp-card" style="border-radius: var(--radius-md); box-shadow: var(--shadow-md);">
                    <code>radius-md</code><br>
                    <code>shadow-md</code>
                </div>

                <div class="bp-card" style="border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
                    <code>radius-lg</code><br>
                    <code>shadow-lg</code>
                </div>

                <div class="bp-card" style="border-radius: var(--radius-xl); box-shadow: var(--shadow-lg);">
                    <code>radius-xl</code><br>
                    <code>shadow-lg</code>
                </div>

                <div class="bp-card" style="border-radius: var(--radius-full); box-shadow: var(--shadow-md);">
                    <code>radius-full</code><br>
                    <code>shadow-md</code>
                </div>

            </div>
        </div>


        <!-- ============================================================
             SECTION 11 — UTILITY CLASSES
             ============================================================ -->
        <div class="bp-section">
            <h2 class="bp-section-title">11 — Utility Classes</h2>

            <div class="bp-subsection">
                <p class="bp-label">Text Alignment</p>
                <p class="text-left" style="background: var(--color-bg-alt); padding: var(--space-3); margin-bottom: var(--space-2); border-radius: var(--radius-sm);">.text-left — Left aligned text</p>
                <p class="text-center" style="background: var(--color-bg-alt); padding: var(--space-3); margin-bottom: var(--space-2); border-radius: var(--radius-sm);">.text-center — Center aligned text</p>
                <p class="text-right" style="background: var(--color-bg-alt); padding: var(--space-3); margin-bottom: var(--space-2); border-radius: var(--radius-sm);">.text-right — Right aligned text</p>
            </div>

            <div class="bp-subsection">
                <p class="bp-label">WordPress Block Alignment</p>
                <p><code>.alignleft</code> — Float left with right margin</p>
                <p><code>.alignright</code> — Float right with left margin</p>
                <p><code>.aligncenter</code> — Block centered</p>
                <p><code>.alignwide</code> — Full container width</p>
                <p><code>.alignfull</code> — Full viewport width</p>
            </div>

        </div>


        <!-- ============================================================
             SECTION 12 — QUICK START CHECKLIST
             ============================================================ -->
        <div class="bp-section bp-checklist-block">
            <h2 class="bp-section-title">12 — New Project Checklist</h2>
            <p class="bp-section-note">Run through this at the start of every new project.</p>

            <ol class="bp-checklist">
                <li>Swap the three font <code>@import</code> URLs at the top of <code>style.css</code> (Sections 1a, 1b, 1c)</li>
                <li>Update <code>--font-body</code>, <code>--font-heading</code>, <code>--font-accent</code> in <code>:root</code> to match</li>
                <li>Update color tokens — at minimum <code>--color-primary</code>, <code>--color-accent</code>, <code>--color-bg</code>, <code>--color-bg-dark</code></li>
                <li>Update <code>--max-width</code> and <code>--wrapper-padding</code> if the layout calls for it</li>
                <li>Refresh this page — confirm everything looks right</li>
                <li>Add project-specific brand styles to Section 10 of <code>style.css</code></li>
                <li>Update the theme header in <code>style.css</code> with the client project name</li>
                <li>Remove test font imports (Section 1d) and font test classes (Section 8c) once fonts are chosen</li>
                <li>Delete or unpublish the Font Test page once fonts are locked in</li>
                <li>Create the GitHub repo and push the boilerplate — <a href="https://github.com/MattDee87/boilerplate-master" target="_blank">github.com/MattDee87/boilerplate-master</a></li>
            </ol>
        </div>


    </div><!-- /.wrapper -->
</main>

<?php get_footer(); ?>


<!-- ============================================================
     BOILERPLATE STYLE GUIDE — PAGE-SPECIFIC STYLES
     These styles only apply to this template page.
     They do not affect the rest of the site.
     ============================================================ -->
<style>
.boilerplate-guide {
    padding: var(--space-12) 0;
}

/* Section blocks */
.bp-section {
    margin-bottom: var(--space-16);
    padding-bottom: var(--space-16);
    border-bottom: 1px solid var(--color-border);
}

.bp-section:last-child {
    border-bottom: none;
}

.bp-section-title {
    font-size: var(--text-xl);
    color: var(--color-text-muted);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: var(--weight-semi);
    margin-bottom: var(--space-6);
    margin-top: 0;
}

.bp-section-note {
    color: var(--color-text-muted);
    font-size: var(--text-sm);
    margin-bottom: var(--space-8);
    font-style: italic;
}

.bp-label {
    font-size: var(--text-xs);
    font-family: var(--font-accent);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-text-muted);
    margin-bottom: var(--space-3);
    margin-top: var(--space-8);
}

.bp-subsection {
    margin-bottom: var(--space-10);
}

.bp-divider {
    border: none;
    border-top: 2px solid var(--color-border);
    margin: var(--space-8) 0 0 0;
}

.bp-intro {
    font-size: var(--text-md);
    color: var(--color-text-muted);
    max-width: 680px;
}

/* Header block */
.bp-header-block h1 {
    font-size: var(--text-4xl);
    margin-top: 0;
}

/* Color swatches */
.bp-swatches {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-5);
}

.bp-swatch {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--text-xs);
}

.bp-swatch-color {
    width: 80px;
    height: 80px;
    border-radius: var(--radius-md);
}

/* Button row */
.bp-button-row {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    align-items: center;
    margin-top: var(--space-4);
}

/* Two column layout */
.bp-two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-10);
    margin-top: var(--space-4);
}

/* Cards row — radius/shadow demo */
.bp-cards-row {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-6);
    margin-top: var(--space-4);
}

.bp-card {
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    padding: var(--space-6) var(--space-8);
    font-size: var(--text-sm);
    line-height: 2;
    min-width: 140px;
    text-align: center;
}

/* Spacing scale */
.bp-spacing-scale {
    display: flex;
    flex-direction: column;
    gap: var(--space-3);
    margin-top: var(--space-4);
}

.bp-spacing-row {
    display: flex;
    align-items: center;
    gap: var(--space-4);
}

.bp-spacing-bar {
    height: 24px;
    background-color: var(--color-accent);
    border-radius: var(--radius-sm);
    opacity: 0.7;
    min-width: 4px;
}

/* Checklist */
.bp-checklist {
    margin-left: var(--space-6);
    padding-left: var(--space-4);
}

.bp-checklist li {
    padding: var(--space-2) 0;
    font-size: var(--text-base);
    line-height: var(--leading-relaxed);
    border-bottom: 1px solid var(--color-border);
}

.bp-checklist li:last-child {
    border-bottom: none;
}

/* Checklist block */
.bp-checklist-block {
    background: var(--color-bg-alt);
    padding: var(--space-10);
    border-radius: var(--radius-lg);
    border-bottom: none;
}

/* Responsive */
@media (max-width: 768px) {
    .bp-two-col {
        grid-template-columns: 1fr;
    }

    .bp-swatches {
        gap: var(--space-4);
    }

    .bp-swatch-color {
        width: 60px;
        height: 60px;
    }

    .bp-cards-row {
        flex-direction: column;
    }
}
</style>