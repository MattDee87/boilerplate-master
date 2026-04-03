<?php get_header(); ?>
 
<?php
/*
==========================================================
ARCHIVE.PHP - CATEGORY / TAG / DATE ARCHIVE TEMPLATE
==========================================================
 
This template displays collections of posts grouped by:
- Category  (example: /category/news/)
- Tag       (example: /tag/wordpress/)
- Date      (example: /2026/03/)
- Author    (example: /author/matt/)
 
WHAT'S INCLUDED:
- Dynamic archive title and description
- Archive type badge (Category, Tag, Date, Author)
- 3 column post grid matching index.php
- Pagination
- No posts fallback
 
==========================================================
*/
?>
 
<main id="content" class="archive-page">
    <div class="wrapper">
 
        <!-- Archive Header -->
        <div class="archive-header">
 
            <!-- Archive Type Badge -->
            <span class="archive-badge">
                <?php
                    if ( is_category() )      echo 'Category';
                    elseif ( is_tag() )        echo 'Tag';
                    elseif ( is_author() )     echo 'Author';
                    elseif ( is_date() )       echo 'Archive';
                    else                       echo 'Archive';
                ?>
            </span>
 
            <!-- Archive Title -->
            <h1 class="archive-title">
                <?php the_archive_title(); ?>
            </h1>
 
            <!-- Archive Description -->
            <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
 
            <!-- Author Bio (only shows on author archives) -->
            <?php if ( is_author() ) : ?>
                <div class="archive-author-bio">
                    <div class="archive-author-avatar">
                        <?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
                    </div>
                    <div class="archive-author-info">
                        <p class="archive-author-name"><?php the_author(); ?></p>
                        <p class="archive-author-desc"><?php the_author_meta('description'); ?></p>
                    </div>
                </div>
            <?php endif; ?>
 
        </div><!-- /.archive-header -->
 
 
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
            <nav class="blog-pagination" aria-label="Archive Pagination">
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
                <p>There are no posts in this archive yet. Check back soon!</p>
                <a href="<?php echo esc_url( home_url() ); ?>" class="btn">← Back to Home</a>
            </div>
 
        <?php endif; ?>
 
    </div><!-- /.wrapper -->
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     ARCHIVE PAGE — PAGE-SPECIFIC STYLES
     ============================================================ -->
<style>
 
.archive-header {
    margin-bottom: var(--space-12);
    padding-bottom: var(--space-8);
    border-bottom: 2px solid var(--color-border);
}
 
.archive-badge {
    display: inline-block;
    font-family: var(--font-accent);
    font-size: var(--text-xs);
    font-weight: var(--weight-bold);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-accent);
    background: var(--color-bg-alt);
    border: 1px solid var(--color-accent);
    padding: var(--space-1) var(--space-4);
    border-radius: var(--radius-full);
    margin-bottom: var(--space-4);
}
 
.archive-title {
    font-size: var(--text-4xl);
    margin: 0 0 var(--space-4) 0;
}
 
.archive-description {
    color: var(--color-text-muted);
    font-size: var(--text-md);
    max-width: 680px;
    margin-top: var(--space-3);
}
 
.archive-description p {
    color: var(--color-text-muted);
    margin: 0;
}
 
.archive-author-bio {
    display: flex;
    align-items: center;
    gap: var(--space-6);
    margin-top: var(--space-6);
    padding: var(--space-6);
    background: var(--color-bg-alt);
    border-radius: var(--radius-md);
    max-width: 600px;
}
 
.archive-author-avatar img {
    border-radius: var(--radius-full);
    width: 80px;
    height: 80px;
    object-fit: cover;
}
 
.archive-author-name {
    font-weight: var(--weight-bold);
    font-size: var(--text-lg);
    margin: 0 0 var(--space-2) 0;
    color: var(--color-primary);
}
 
.archive-author-desc {
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    margin: 0;
    line-height: var(--leading-relaxed);
}
 
.post-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-8);
    margin-bottom: var(--space-12);
}
 
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
 
.post-card-body {
    padding: var(--space-6);
}
 
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
 
.no-posts {
    text-align: center;
    padding: var(--space-20) 0;
}
 
.no-posts h2 { margin-bottom: var(--space-4); }
 
.no-posts p {
    color: var(--color-text-muted);
    margin-bottom: var(--space-8);
}
 
@media (max-width: 1024px) {
    .post-grid { grid-template-columns: repeat(2, 1fr); }
}
 
@media (max-width: 768px) {
    .archive-title { font-size: var(--text-3xl); }
    .post-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-6); }
    .archive-author-bio { flex-direction: column; text-align: center; }
}
 
@media (max-width: 480px) {
    .post-grid { grid-template-columns: 1fr; }
    .archive-title { font-size: var(--text-2xl); }
}
</style>