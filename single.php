<?php get_header(); ?>
 
<?php
/*
==========================================================
SINGLE.PHP - INDIVIDUAL BLOG POST TEMPLATE
==========================================================
 
This template displays a single blog post.
It loads when someone clicks on a post title to read the full article.
 
WHAT'S INCLUDED:
- Featured image (full width above content)
- Post meta — author, date, categories
- Post title
- Post content
- Previous / next post navigation
- Comments section (enabled by default)
 
TO DISABLE COMMENTS ON THIS PROJECT:
See partials/dashboard_fixes.php — uncomment the
remove_comment_support() function.
 
==========================================================
*/
?>
 
<main id="content" class="single-post">
    <div class="wrapper">
 
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
 
 
                <!-- ── Featured Image ────────────────────────── -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
 
 
                <!-- ── Post Header ───────────────────────────── -->
                <header class="post-header">
 
                    <!-- Post Meta — Date, Author, Categories -->
                    <div class="post-meta">
 
                        <span class="post-date">
                            <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                        </span>
 
                        <span class="post-author">
                            By <?php the_author(); ?>
                        </span>
 
                        <?php
                            $categories = get_the_category();
                            if ( $categories ) :
                        ?>
                            <span class="post-categories">
                                <?php foreach ( $categories as $category ) : ?>
                                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                                        <?php echo esc_html( $category->name ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </span>
                        <?php endif; ?>
 
                    </div>
 
                    <!-- Post Title -->
                    <h1 class="post-title"><?php the_title(); ?></h1>
 
                </header>
 
 
                <!-- ── Post Content ──────────────────────────── -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
 
 
                <!-- ── Post Tags ─────────────────────────────── -->
                <?php if ( has_tag() ) : ?>
                    <div class="post-tags">
                        <span class="post-tags-label">Tags:</span>
                        <?php the_tags( '', ', ', '' ); ?>
                    </div>
                <?php endif; ?>
 
 
            </article>
 
 
            <!-- ── Previous / Next Navigation ───────────────── -->
            <nav class="post-navigation" aria-label="Post Navigation">
                <div class="post-nav-prev">
                    <?php
                        $prev_post = get_previous_post();
                        if ( $prev_post ) :
                    ?>
                        <span class="post-nav-label">← Previous</span>
                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
                            <?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="post-nav-next">
                    <?php
                        $next_post = get_next_post();
                        if ( $next_post ) :
                    ?>
                        <span class="post-nav-label">Next →</span>
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                            <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
 
 
            <!-- ── Comments ──────────────────────────────────── -->
            <?php
            /*
            ================================================
            COMMENTS SECTION
            ================================================
            Comments are enabled by default.
 
            TO DISABLE on this project:
            Go to partials/dashboard_fixes.php and
            uncomment the remove_comment_support() function.
            ================================================
            */
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
 
 
        <?php endwhile; endif; ?>
 
    </div><!-- /.wrapper -->
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     SINGLE POST — PAGE-SPECIFIC STYLES
     These styles only apply to single blog posts.
     ============================================================ -->
<style>
 
/* Featured image */
.post-thumbnail {
    margin-bottom: var(--space-10);
    border-radius: var(--radius-md);
    overflow: hidden;
}
 
.post-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
}
 
/* Post header */
.post-header {
    margin-bottom: var(--space-8);
}
 
/* Post meta */
.post-meta {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    align-items: center;
    margin-bottom: var(--space-5);
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
 
.post-meta a {
    color: var(--color-accent);
    font-weight: var(--weight-semi);
}
 
.post-meta .post-categories a {
    background: var(--color-bg-alt);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    text-decoration: none;
}
 
.post-meta .post-categories a:hover {
    background: var(--color-accent);
    color: var(--color-white);
}
 
/* Post title */
.post-title {
    font-size: var(--text-4xl);
    line-height: var(--leading-tight);
    margin: 0;
}
 
/* Post content */
.post-content {
    max-width: 780px;
    margin: 0 auto var(--space-10) auto;
    line-height: var(--leading-relaxed);
}
 
.post-content p {
    margin-bottom: var(--space-5);
}
 
.post-content img {
    border-radius: var(--radius-md);
    margin: var(--space-6) 0;
}
 
/* Post tags */
.post-tags {
    margin-top: var(--space-8);
    padding-top: var(--space-6);
    border-top: 1px solid var(--color-border);
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
 
.post-tags-label {
    font-weight: var(--weight-semi);
    margin-right: var(--space-2);
}
 
.post-tags a {
    color: var(--color-accent);
    margin-right: var(--space-2);
}
 
/* Post navigation */
.post-navigation {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-6);
    margin: var(--space-12) 0;
    padding: var(--space-8);
    background: var(--color-bg-alt);
    border-radius: var(--radius-md);
}
 
.post-nav-prev {
    text-align: left;
}
 
.post-nav-next {
    text-align: right;
}
 
.post-nav-label {
    display: block;
    font-size: var(--text-xs);
    font-family: var(--font-accent);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-text-muted);
    margin-bottom: var(--space-2);
}
 
.post-navigation a {
    font-size: var(--text-base);
    font-weight: var(--weight-semi);
    color: var(--color-primary);
    text-decoration: none;
    line-height: var(--leading-snug);
}
 
.post-navigation a:hover {
    color: var(--color-accent);
}
 
/* Responsive */
@media (max-width: 768px) {
    .post-title {
        font-size: var(--text-3xl);
    }
 
    .post-navigation {
        grid-template-columns: 1fr;
    }
 
    .post-nav-next {
        text-align: left;
    }
}
 
@media (max-width: 480px) {
    .post-title {
        font-size: var(--text-2xl);
    }
}
</style>
