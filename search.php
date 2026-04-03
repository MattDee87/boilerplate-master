<?php get_header(); ?>
 
<?php
/*
==========================================================
SEARCH.PHP - SEARCH RESULTS TEMPLATE
==========================================================
 
This template displays search results when a user
searches the site using the WordPress search form.
 
WHAT'S INCLUDED:
- Search query display
- Results count
- Post results grid
- No results state with search form to try again
- Pagination
 
==========================================================
*/
?>
 
<main id="content" class="search-page">
    <div class="wrapper">
 
        <!-- Search Header -->
        <div class="search-header">
 
            <span class="search-badge">Search Results</span>
 
            <h1 class="search-title">
                <?php if ( have_posts() ) : ?>
                    Results for: <em>"<?php echo esc_html( get_search_query() ); ?>"</em>
                <?php else : ?>
                    No results for: <em>"<?php echo esc_html( get_search_query() ); ?>"</em>
                <?php endif; ?>
            </h1>
 
            <?php if ( have_posts() ) : ?>
                <p class="search-count">
                    <?php
                        global $wp_query;
                        $total = $wp_query->found_posts;
                        echo $total . ' ' . _n( 'result found', 'results found', $total );
                    ?>
                </p>
            <?php endif; ?>
 
        </div><!-- /.search-header -->
 
 
        <!-- Results -->
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
 
                            <!-- Post Type Badge -->
                            <div class="post-card-meta">
                                <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </time>
                                <span class="search-result-type">
                                    <?php echo esc_html( ucfirst( get_post_type() ) ); ?>
                                </span>
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
                                View Result →
                            </a>
 
                        </div><!-- /.post-card-body -->
 
                    </article>
 
                <?php endwhile; ?>
 
            </div><!-- /.post-grid -->
 
 
            <!-- Pagination -->
            <nav class="blog-pagination" aria-label="Search Results Pagination">
                <?php
                    echo paginate_links([
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                        'mid_size'  => 2,
                    ]);
                ?>
            </nav>
 
 
        <?php else : ?>
 
            <!-- No Results -->
            <div class="search-no-results">
 
                <div class="search-no-results-icon" aria-hidden="true">?</div>
 
                <h2>No results found</h2>
                <p>Sorry, nothing matched your search for <strong>"<?php echo esc_html( get_search_query() ); ?>"</strong>. Try different keywords or check your spelling.</p>
 
                <!-- Try Again Search Form -->
                <div class="search-try-again">
                    <p class="search-try-label">Try a different search:</p>
                    <?php get_search_form(); ?>
                </div>
 
                <a href="<?php echo esc_url( home_url() ); ?>" class="btn">← Back to Home</a>
 
            </div>
 
        <?php endif; ?>
 
    </div><!-- /.wrapper -->
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     SEARCH PAGE — PAGE-SPECIFIC STYLES
     ============================================================ -->
<style>
 
.search-page {
    padding-top: var(--space-12);
}
 
/* Search header */
.search-header {
    margin-bottom: var(--space-12);
    padding-bottom: var(--space-8);
    border-bottom: 2px solid var(--color-border);
}
 
.search-badge {
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
 
.search-title {
    font-size: var(--text-3xl);
    margin: 0 0 var(--space-3) 0;
}
 
.search-title em {
    color: var(--color-accent);
    font-style: normal;
}
 
.search-count {
    color: var(--color-text-muted);
    font-size: var(--text-sm);
    font-family: var(--font-accent);
    margin: 0;
}
 
/* Post type badge */
.search-result-type {
    font-size: var(--text-xs);
    font-family: var(--font-accent);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-text-muted);
    background: var(--color-bg-alt);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
}
 
/* Post grid — matches index.php and archive.php */
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
 
/* No results */
.search-no-results {
    text-align: center;
    padding: var(--space-20) 0;
    max-width: 560px;
    margin: 0 auto;
}
 
.search-no-results-icon {
    font-family: var(--font-heading);
    font-size: 120px;
    font-weight: var(--weight-bold);
    color: var(--color-border);
    line-height: 1;
    margin-bottom: var(--space-6);
    user-select: none;
}
 
.search-no-results h2 {
    font-size: var(--text-2xl);
    margin-bottom: var(--space-4);
}
 
.search-no-results p {
    color: var(--color-text-muted);
    margin-bottom: var(--space-8);
}
 
.search-try-again {
    margin-bottom: var(--space-8);
}
 
.search-try-label {
    font-size: var(--text-sm);
    font-weight: var(--weight-semi);
    color: var(--color-text-muted);
    margin-bottom: var(--space-3);
}
 
.search-try-again .search-form {
    display: flex;
    gap: var(--space-3);
    justify-content: center;
}
 
.search-try-again .search-field {
    flex: 1;
    max-width: 360px;
    margin-bottom: 0;
}
 
/* Responsive */
@media (max-width: 1024px) {
    .post-grid { grid-template-columns: repeat(2, 1fr); }
}
 
@media (max-width: 768px) {
    .search-title { font-size: var(--text-2xl); }
    .post-grid { grid-template-columns: repeat(2, 1fr); gap: var(--space-6); }
    .search-try-again .search-form { flex-direction: column; align-items: center; }
    .search-try-again .search-field { max-width: 100%; }
}
 
@media (max-width: 480px) {
    .post-grid { grid-template-columns: 1fr; }
    .search-no-results-icon { font-size: 80px; }
}
</style>