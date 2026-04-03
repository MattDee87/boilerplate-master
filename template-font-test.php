<?php
/*
==========================================================
TEMPLATE NAME: Font Test Page
==========================================================
 
WHAT THIS IS:
A client-facing font selection page that previews all 8
test fonts side by side with full type specimens.
 
HOW TO USE:
1. Go to WordPress Admin → Pages
2. Open the "Font Test" page
3. In the right panel under "Page Attributes" → Template
4. Select "Font Test Page"
5. Save and share the URL with your client for review
 
WHEN FONTS ARE CHOSEN:
1. Remove the test font @import block (Section 1d in style.css)
2. Remove the font testing classes (Section 8c in style.css)
3. Update --font-body, --font-heading, --font-accent tokens
4. Delete or unpublish this page
 
FONTS INCLUDED:
1. Inter          — .font-inter
2. Sora           — .font-sora
3. Outfit         — .font-outfit
4. Manrope        — .font-manrope
5. Poppins        — .font-poppins
6. Space Grotesk  — .font-space-grotesk
7. Barlow         — .font-barlow
8. Rajdhani       — .font-rajdhani
 
==========================================================
*/
 
get_header(); ?>
 
<main id="main" class="font-test-page">
    <div class="wrapper">
 
        <!-- Page Header -->
        <div class="ft-page-header">
            <h1 class="ft-page-title">Fonts Testing Page</h1>
            <p class="ft-page-intro">Review each font below and share your favorites. Each section shows the full type scale, character set, and sample paragraph so you can see exactly how the font will look on your site.</p>
        </div>
 
        <!-- Font Navigation -->
        <nav class="ft-font-nav">
            <a href="#font-inter">Inter</a>
            <a href="#font-sora">Sora</a>
            <a href="#font-outfit">Outfit</a>
            <a href="#font-manrope">Manrope</a>
            <a href="#font-poppins">Poppins</a>
            <a href="#font-space-grotesk">Space Grotesk</a>
            <a href="#font-barlow">Barlow</a>
            <a href="#font-rajdhani">Rajdhani</a>
        </nav>
 
 
        <!-- ============================================================
             FONT 1 — INTER
             ============================================================ -->
        <div class="ft-font-block" id="font-inter">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-inter">H1 — Font 1: INTER</h2>
                <span class="ft-font-tag">Clean &amp; Universal</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-inter ft-h2">H2: Inter</h2>
                    <h3 class="font-inter ft-h3">H3: Inter — Clean &amp; Universal</h3>
                    <h4 class="font-inter">H4: Inter</h4>
                    <h5 class="font-inter">H5: Inter</h5>
                    <h6 class="font-inter">H6: INTER</h6>
 
                    <p class="ft-class-label">class: font-inter</p>
 
                    <p><strong class="font-inter">Paragraph:</strong> <span class="font-inter">"Inter is the workhorse font. Very clean, modern, extremely readable. Works everywhere and on every device. This is your safe, high-quality choice for body text. Could also work for headings if you want consistency."</span></p>
 
                    <p><strong class="font-inter">"Hamburgefonstiv":</strong> <span class="font-inter">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-inter">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-inter">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-inter">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-inter">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-inter ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-inter"><strong class="font-inter">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 2 — SORA
             ============================================================ -->
        <div class="ft-font-block" id="font-sora">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-sora">H1 — Font 2: SORA</h2>
                <span class="ft-font-tag">Slightly Futuristic</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-sora ft-h2">H2: Sora</h2>
                    <h3 class="font-sora ft-h3">H3: Sora — Slightly Futuristic</h3>
                    <h4 class="font-sora">H4: Sora</h4>
                    <h5 class="font-sora">H5: Sora</h5>
                    <h6 class="font-sora">H6: SORA</h6>
 
                    <p class="ft-class-label">class: font-sora</p>
 
                    <p><strong class="font-sora">Paragraph:</strong> <span class="font-sora">"Sora feels slightly futuristic but stays clean and professional. It has a refined quality that works well with modern, tech-forward brands. Great for headings with a neon aesthetic. Pairs beautifully with Inter for body text."</span></p>
 
                    <p><strong class="font-sora">"Hamburgefonstiv":</strong> <span class="font-sora">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-sora">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-sora">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-sora">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-sora">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-sora ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-sora"><strong class="font-sora">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 3 — OUTFIT
             ============================================================ -->
        <div class="ft-font-block" id="font-outfit">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-outfit">H1 — Font 3: OUTFIT</h2>
                <span class="ft-font-tag">Modern &amp; Geometric</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-outfit ft-h2">H2: Outfit</h2>
                    <h3 class="font-outfit ft-h3">H3: Outfit — Modern &amp; Geometric</h3>
                    <h4 class="font-outfit">H4: Outfit</h4>
                    <h5 class="font-outfit">H5: Outfit</h5>
                    <h6 class="font-outfit">H6: OUTFIT</h6>
 
                    <p class="ft-class-label">class: font-outfit</p>
 
                    <p><strong class="font-outfit">Paragraph:</strong> <span class="font-outfit">"Outfit is a modern, geometric sans-serif that feels fresh and approachable. It has a clean personality that works well for both headings and body text. Great for startups, SaaS, and consumer brands."</span></p>
 
                    <p><strong class="font-outfit">"Hamburgefonstiv":</strong> <span class="font-outfit">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-outfit">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-outfit">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-outfit">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-outfit">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-outfit ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-outfit"><strong class="font-outfit">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 4 — MANROPE
             ============================================================ -->
        <div class="ft-font-block" id="font-manrope">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-manrope">H1 — Font 4: MANROPE</h2>
                <span class="ft-font-tag">Elegant &amp; Modern</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-manrope ft-h2">H2: Manrope</h2>
                    <h3 class="font-manrope ft-h3">H3: Manrope — Elegant &amp; Modern</h3>
                    <h4 class="font-manrope">H4: Manrope</h4>
                    <h5 class="font-manrope">H5: Manrope</h5>
                    <h6 class="font-manrope">H6: MANROPE</h6>
 
                    <p class="ft-class-label">class: font-manrope</p>
 
                    <p><strong class="font-manrope">Paragraph:</strong> <span class="font-manrope">"Manrope is an elegant, modern sans-serif with a slightly humanist quality. It's refined without feeling cold, making it an excellent choice for brands that want to feel premium but approachable. Pairs well with almost anything."</span></p>
 
                    <p><strong class="font-manrope">"Hamburgefonstiv":</strong> <span class="font-manrope">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-manrope">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-manrope">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-manrope">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-manrope">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-manrope ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-manrope"><strong class="font-manrope">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 5 — POPPINS
             ============================================================ -->
        <div class="ft-font-block" id="font-poppins">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-poppins">H1 — Font 5: POPPINS</h2>
                <span class="ft-font-tag">Friendly &amp; Versatile</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-poppins ft-h2">H2: Poppins</h2>
                    <h3 class="font-poppins ft-h3">H3: Poppins — Friendly &amp; Versatile</h3>
                    <h4 class="font-poppins">H4: Poppins</h4>
                    <h5 class="font-poppins">H5: Poppins</h5>
                    <h6 class="font-poppins">H6: POPPINS</h6>
 
                    <p class="ft-class-label">class: font-poppins</p>
 
                    <p><strong class="font-poppins">Paragraph:</strong> <span class="font-poppins">"Poppins is a friendly, rounded geometric sans-serif. It's one of the most popular web fonts for good reason — it's versatile, readable, and works across almost any brand. Great for brands that want to feel approachable and modern."</span></p>
 
                    <p><strong class="font-poppins">"Hamburgefonstiv":</strong> <span class="font-poppins">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-poppins">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-poppins">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-poppins">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-poppins">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-poppins ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-poppins"><strong class="font-poppins">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 6 — SPACE GROTESK
             ============================================================ -->
        <div class="ft-font-block" id="font-space-grotesk">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-space-grotesk">H1 — Font 6: SPACE GROTESK</h2>
                <span class="ft-font-tag">Techy &amp; Distinctive</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-space-grotesk ft-h2">H2: Space Grotesk</h2>
                    <h3 class="font-space-grotesk ft-h3">H3: Space Grotesk — Techy &amp; Distinctive</h3>
                    <h4 class="font-space-grotesk">H4: Space Grotesk</h4>
                    <h5 class="font-space-grotesk">H5: Space Grotesk</h5>
                    <h6 class="font-space-grotesk">H6: SPACE GROTESK</h6>
 
                    <p class="ft-class-label">class: font-space-grotesk</p>
 
                    <p><strong class="font-space-grotesk">Paragraph:</strong> <span class="font-space-grotesk">"Space Grotesk has a distinctive, slightly quirky personality that makes it stand out. It's techy and modern with just enough character to feel unique. Great for tech brands, agencies, and anything that needs to feel a little different."</span></p>
 
                    <p><strong class="font-space-grotesk">"Hamburgefonstiv":</strong> <span class="font-space-grotesk">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-space-grotesk">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-space-grotesk">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-space-grotesk">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-space-grotesk">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-space-grotesk ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-space-grotesk"><strong class="font-space-grotesk">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 7 — BARLOW
             ============================================================ -->
        <div class="ft-font-block" id="font-barlow">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-barlow">H1 — Font 7: BARLOW</h2>
                <span class="ft-font-tag">Clean &amp; Condensed</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-barlow ft-h2">H2: Barlow</h2>
                    <h3 class="font-barlow ft-h3">H3: Barlow — Clean &amp; Condensed</h3>
                    <h4 class="font-barlow">H4: Barlow</h4>
                    <h5 class="font-barlow">H5: Barlow</h5>
                    <h6 class="font-barlow">H6: BARLOW</h6>
 
                    <p class="ft-class-label">class: font-barlow</p>
 
                    <p><strong class="font-barlow">Paragraph:</strong> <span class="font-barlow">"Barlow is a clean, slightly condensed sans-serif inspired by California highway signage. It reads extremely well at large sizes and works beautifully for display headings. Great for bold, confident brands."</span></p>
 
                    <p><strong class="font-barlow">"Hamburgefonstiv":</strong> <span class="font-barlow">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-barlow">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-barlow">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-barlow">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-barlow">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-barlow ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-barlow"><strong class="font-barlow">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- ============================================================
             FONT 8 — RAJDHANI
             ============================================================ -->
        <div class="ft-font-block" id="font-rajdhani">
 
            <div class="ft-font-header">
                <h2 class="ft-font-name font-rajdhani">H1 — Font 8: RAJDHANI</h2>
                <span class="ft-font-tag">Geometric &amp; Bold Character</span>
            </div>
 
            <div class="ft-specimen">
                <div class="ft-specimen-left">
 
                    <h2 class="font-rajdhani ft-h2">H2: Rajdhani</h2>
                    <h3 class="font-rajdhani ft-h3">H3: Rajdhani — Geometric &amp; Bold</h3>
                    <h4 class="font-rajdhani">H4: Rajdhani</h4>
                    <h5 class="font-rajdhani">H5: Rajdhani</h5>
                    <h6 class="font-rajdhani">H6: RAJDHANI</h6>
 
                    <p class="ft-class-label">class: font-rajdhani</p>
 
                    <p><strong class="font-rajdhani">Paragraph:</strong> <span class="font-rajdhani">"Rajdhani is a geometric sans-serif with real character and a slightly angular personality. It has a bold, assertive quality that makes it great for display headings and brands that want to feel strong and distinctive."</span></p>
 
                    <p><strong class="font-rajdhani">"Hamburgefonstiv":</strong> <span class="font-rajdhani">A classic string of characters used by designers to see how the most common character shapes (h, a, m, b, u, r, g, e, f, o, n, s, t, i, v) look together.</span></p>
 
                    <p class="font-rajdhani">1, 2, 3, 4, 5, 6, 7, 8, 9, 0</p>
                    <p class="font-rajdhani">11, 12, 13, 14, 15, 16, 17, 18, 19, 20</p>
                    <p class="font-rajdhani">~ ! @ # $ % ^ &amp; * ( ) — _ = + " " : ; ? /</p>
                    <p class="font-rajdhani">"The quick brown fox jumps over the lazy dog."</p>
 
                </div>
                <div class="ft-specimen-right">
                    <h4 class="font-rajdhani ft-lorem-title">What is Lorem Ipsum?</h4>
                    <p class="font-rajdhani"><strong class="font-rajdhani">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
 
 
        <!-- Bottom Note -->
        <div class="ft-footer-note">
            <p>Once you have chosen your fonts, let us know your top picks and we will lock them in as your final typography system.</p>
        </div>
 
    </div><!-- /.wrapper -->
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     FONT TEST PAGE — PAGE-SPECIFIC STYLES
     These styles only apply to this template.
     ============================================================ -->
<style>
.font-test-page {
    padding: var(--space-12) 0;
}
 
/* Page header */
.ft-page-header {
    margin-bottom: var(--space-12);
    padding-bottom: var(--space-10);
    border-bottom: 2px solid var(--color-border);
}
 
.ft-page-title {
    font-size: var(--text-4xl);
    margin-top: 0;
    margin-bottom: var(--space-4);
}
 
.ft-page-intro {
    color: var(--color-text-muted);
    font-size: var(--text-md);
    max-width: 680px;
    margin: 0;
}
 
/* Font nav */
.ft-font-nav {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3);
    margin-bottom: var(--space-12);
    padding: var(--space-5);
    background: var(--color-bg-alt);
    border-radius: var(--radius-md);
}
 
.ft-font-nav a {
    font-size: var(--text-sm);
    font-weight: var(--weight-semi);
    color: var(--color-text-muted);
    text-decoration: none;
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-sm);
    border: 1px solid var(--color-border);
    background: var(--color-bg);
    transition: all 0.2s ease;
}
 
.ft-font-nav a:hover {
    color: var(--color-accent);
    border-color: var(--color-accent);
    text-decoration: none;
}
 
/* Font block */
.ft-font-block {
    margin-bottom: var(--space-24);
    padding-bottom: var(--space-24);
    border-bottom: 3px solid var(--color-border);
    scroll-margin-top: var(--space-8);
}
 
.ft-font-block:last-of-type {
    border-bottom: none;
}
 
/* Font header */
.ft-font-header {
    display: flex;
    align-items: baseline;
    gap: var(--space-5);
    margin-bottom: var(--space-8);
}
 
.ft-font-name {
    font-size: var(--text-4xl);
    font-weight: var(--weight-bold);
    color: var(--color-accent);
    margin: 0;
    border: none;
    padding: 0;
}
 
.ft-font-tag {
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    font-style: italic;
}
 
/* Specimen layout */
.ft-specimen {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-12);
    align-items: start;
}
 
.ft-specimen-left h2,
.ft-specimen-left h3,
.ft-specimen-left h4,
.ft-specimen-left h5,
.ft-specimen-left h6 {
    color: var(--color-primary);
    margin-top: 0;
}
 
/* Heading overrides for specimen */
.ft-h2 {
    font-size: var(--text-2xl) !important;
    border-bottom: 1px solid var(--color-border);
    padding-bottom: var(--space-3);
    margin-bottom: var(--space-3) !important;
    display: block !important;
}
 
.ft-h3 {
    font-size: var(--text-xl) !important;
    color: var(--color-accent) !important;
}
 
/* Class label */
.ft-class-label {
    font-family: var(--font-accent);
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    margin: var(--space-5) 0 var(--space-4) 0;
}
 
/* Lorem ipsum column */
.ft-specimen-right {
    padding: var(--space-6);
    background: var(--color-bg-alt);
    border-radius: var(--radius-md);
    border-left: 3px solid var(--color-accent);
}
 
.ft-lorem-title {
    color: var(--color-accent) !important;
    margin-top: 0 !important;
    margin-bottom: var(--space-4) !important;
}
 
/* Footer note */
.ft-footer-note {
    text-align: center;
    padding: var(--space-10);
    background: var(--color-bg-alt);
    border-radius: var(--radius-lg);
    color: var(--color-text-muted);
    font-size: var(--text-md);
    margin-top: var(--space-10);
}
 
.ft-footer-note p {
    margin: 0;
    color: var(--color-text-muted);
}
 
/* Responsive */
@media (max-width: 768px) {
    .ft-specimen {
        grid-template-columns: 1fr;
    }
 
    .ft-font-header {
        flex-direction: column;
        gap: var(--space-2);
    }
 
    .ft-font-name {
        font-size: var(--text-3xl);
    }
 
    .ft-page-title {
        font-size: var(--text-3xl);
    }
 
    .ft-font-nav {
        gap: var(--space-2);
    }
}
 
@media (max-width: 480px) {
    .ft-font-name {
        font-size: var(--text-2xl);
    }
}
</style>