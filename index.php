<?php get_header(); ?>
 
<?php
/*
==========================================================
INDEX.PHP - FALLBACK TEMPLATE / BLOG LISTING
==========================================================
 
This is WordPress's last resort fallback template.
It loads when no other template matches the request.
 
It also doubles as a basic blog post listing page
in case home.php is not present.
 
WORDPRESS TEMPLATE HIERARCHY:
front-page.php  → Homepage
home.php        → Blog listing page (if exists)
index.php       → Fallback for everything else
page.php        → Standard inner pages
single.php      → Individual blog posts
archive.php     → Category / tag / date archives
404.php         → Page not found
search.php      → Search results
 
==========================================================
*/
?>
 
<main id="content" class="blog-index">
    <div class="wrapper">
 
        <!-- Page Title -->
        <div class="blog-header">
            <?php if ( is_home() && ! is_front_page() ) : ?>
                <h1 class="blog-title"><?php single_post_title(); ?></h1>
            <?php elseif ( is_archive() ) : ?>
                <h1 class="blog-title"><?php the_archive_title(); ?></h1>
                <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
            <?php else : ?>
                <h1 class="blog-title">Latest Posts</h1>
            <?php endif; ?>
        </div>
 
 
        <!-- Post Loop -->
        <?php if ( have_posts() ) : ?>
 
            <div class="post-grid">
 
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
 
                        <!-- Featured Image -->
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-card-image" tabindex="-1" aria-hidden="true">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
 
                        <!-- Post Card Body -->
                        <div class="post-card-body">
 
                            <!-- Meta -->
                            <div class="post-card-meta">
                                <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                                <?php
                                    $categories = get_the_category();
                                    if ( $categories ) :
                                ?>
                                    <span class="post-card-category">
                                        <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                                            <?php echo esc_html( $categories[0]->name ); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </div>
 
                            <!-- Title -->
                            <h2 class="post-card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
 
                            <!-- Excerpt -->
                            <div class="post-card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
 
                            <!-- Read More -->
                            <a href="<?php the_permalink(); ?>" class="post-card-link">
                                Read More →
                            </a>
 
                        </div><!-- /.post-card-body -->
 
                    </article>
 
                <?php endwhile; ?>
 
            </div><!-- /.post-grid -->
 
 
            <!-- Pagination -->
            <nav class="blog-pagination" aria-label="Blog Pagination">
                <?php
                    echo paginate_links([
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                        'mid_size'  => 2,
                    ]);
                ?>
            </nav>
 
 
        <?php else : ?>
 
            <!-- No Posts Found -->
            <div class="no-posts">
                <h2>No posts found.</h2>
                <p>It looks like there are no posts here yet. Check back soon!</p>
                <a href="<?php echo esc_url( home_url() ); ?>" class="btn">← Back to Home</a>
            </div>
 
        <?php endif; ?>
 
    </div><!-- /.wrapper -->
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     INDEX / BLOG LISTING — PAGE-SPECIFIC STYLES
     These styles only apply to the blog listing page.
     ============================================================ -->
<style>
 
/* Blog header */
.blog-header {
    margin-bottom: var(--space-12);
    padding-bottom: var(--space-8);
    border-bottom: 2px solid var(--color-border);
}
 
.blog-title {
    font-size: var(--text-4xl);
    margin: 0 0 var(--space-4) 0;
}
 
.archive-description {
    color: var(--color-text-muted);
    font-size: var(--text-md);
    max-width: 680px;
}
 
/* Post grid */
.post-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-8);
    margin-bottom: var(--space-12);
}
 
/* Post card */
.post-card {
    background: var(--color-bg);
    border: 1px solid var(--color-border);
    border-radius: var(--radius-md);
    overflow: hidden;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
}
 
.post-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}
 
/* Card image */
.post-card-image {
    display: block;
    overflow: hidden;
}
 
.post-card-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}
 
.post-card:hover .post-card-image img {
    transform: scale(1.03);
}
 
/* Card body */
.post-card-body {
    padding: var(--space-6);
}
 
/* Card meta */
.post-card-meta {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    font-size: var(--text-xs);
    color: var(--color-text-muted);
    margin-bottom: var(--space-3);
    font-family: var(--font-accent);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
 
.post-card-category a {
    color: var(--color-accent);
    font-weight: var(--weight-semi);
    text-decoration: none;
}
 
.post-card-category a:hover {
    text-decoration: underline;
}
 
/* Card title */
.post-card-title {
    font-size: var(--text-xl);
    line-height: var(--leading-snug);
    margin: 0 0 var(--space-4) 0;
}
 
.post-card-title a {
    color: var(--color-primary);
    text-decoration: none;
    font-weight: var(--weight-bold);
}
 
.post-card-title a:hover {
    color: var(--color-accent);
}
 
/* Card excerpt */
.post-card-excerpt {
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    line-height: var(--leading-relaxed);
    margin-bottom: var(--space-5);
}
 
.post-card-excerpt p {
    margin: 0;
    font-size: var(--text-sm);
    color: var(--color-text-muted);
}
 
/* Read more link */
.post-card-link {
    font-size: var(--text-sm);
    font-weight: var(--weight-semi);
    color: var(--color-accent);
    text-decoration: none;
    transition: color 0.2s ease;
}
 
.post-card-link:hover {
    color: var(--color-accent-hover);
    text-decoration: underline;
}
 
/* Pagination */
.blog-pagination {
    display: flex;
    justify-content: center;
    gap: var(--space-2);
    margin: var(--space-12) 0;
    flex-wrap: wrap;
}
 
.blog-pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    border: 1px solid var(--color-border);
    color: var(--color-text);
    font-size: var(--text-sm);
    font-weight: var(--weight-semi);
    text-decoration: none;
    transition: all 0.2s ease;
}
 
.blog-pagination .page-numbers:hover,
.blog-pagination .page-numbers.current {
    background: var(--color-accent);
    border-color: var(--color-accent);
    color: var(--color-white);
}
 
.blog-pagination .prev,
.blog-pagination .next {
    width: auto;
    padding: 0 var(--space-4);
}
 
/* No posts */
.no-posts {
    text-align: center;
    padding: var(--space-20) 0;
}
 
.no-posts h2 {
    margin-bottom: var(--space-4);
}
 
.no-posts p {
    color: var(--color-text-muted);
    margin-bottom: var(--space-8);
}
 
/* Responsive */
@media (max-width: 1024px) {
    .post-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
 
@media (max-width: 768px) {
    .blog-title {
        font-size: var(--text-3xl);
    }
 
    .post-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: var(--space-6);
    }
}
 
@media (max-width: 480px) {
    .post-grid {
        grid-template-columns: 1fr;
    }
 
    .blog-title {
        font-size: var(--text-2xl);
    }
}
</style>