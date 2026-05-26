<?php
/**
 * Template part for displaying Latest Posts block.
 * Rule: Sorted by date, supports tag filtering, falls back to latest 3 posts.
 *
 * @package burhan-ozalp
 */

$title = get_sub_field('title');
if ( empty( $title ) ) {
    $title = esc_html__( 'Güncel Yazılar', 'burhan-ozalp' );
}

$post_count = get_sub_field('post_count');
if ( empty( $post_count ) ) {
    $post_count = 3;
}

$tag_filter = get_sub_field('tag_filter');

// Prepare Query Args
$args = array(
    'post_type'           => 'post',
    'posts_per_page'      => intval( $post_count ),
    'orderby'             => 'date',
    'order'               => 'DESC',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
);

// Filter by selected tag if set
if ( ! empty( $tag_filter ) ) {
    $args['tag_id'] = intval( $tag_filter );
}

$query = new WP_Query( $args );
?>

<!-- Latest Posts -->
<section class="py-24 bg-[#fcfaf7]">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-gray-800 text-5xl font-['Cormorant_Garamond'] tracking-[0.2em] mb-20 uppercase"><?php echo esc_html( $title ); ?></h2>
        
        <?php if ( $query->have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="group cursor-pointer text-left" onclick="window.location='<?php the_permalink(); ?>'">
                        <div class="overflow-hidden mb-8 rounded-sm aspect-[4/5]">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110' ) ); ?>
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&q=80&w=600" alt="Post" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <?php endif; ?>
                        </div>
                        <h3 class="text-2xl font-['Cormorant_Garamond'] text-[#333] mb-4 group-hover:text-[#8b6e4e] transition-colors leading-tight"><?php the_title(); ?></h3>
                        <p class="text-base text-[#7b5f43] mb-6 leading-relaxed">
                            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 25, '...' ) ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="text-base font-bold tracking-[0.2em] text-[#8b6e4e] border-b border-[#8b6e4e] pb-1 uppercase hover:opacity-70 transition-all"><?php echo esc_html__( 'Devamını Oku', 'burhan-ozalp' ); ?></a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="text-[#7b5f43] italic text-lg"><?php echo esc_html__( 'Yazı bulunamadı.', 'burhan-ozalp' ); ?></p>
        <?php endif; ?>
    </div>
</section>
