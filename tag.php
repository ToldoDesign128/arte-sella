<?php
/*
  *
  * Template Name: Archivio Generale
  *
  */

function get_content_type_label($post_type)
{
    switch ($post_type) {
        case 'post':
            return 'News';
        case 'opere':
            return 'Opera';
        case 'eventi':
            return 'Evento';
        case 'sponsor':
            return 'Sponsor';
        default:
            return '';
    }
}

get_header(); ?>

<main>
    <!-- Sezione barra di ricerca -->
    <section class="search-bar">
        <h2>Cerca contenuti</h2>
        <?php get_search_form(); ?>
    </section>

    <!-- Sezione risultati della ricerca -->
    <section class="search-results">
        <?php if (is_search()) : ?>
            <h2>Risultati della ricerca</h2>
            <?php if (have_posts()) : ?>
                <ul>
                    <?php while (have_posts()) : the_post(); ?>
                        <li>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p>Nessun contenuto trovato.</p>
            <?php endif; ?>
        <?php endif; ?>
    </section>

    <!-- Sezione anteprime per tag -->
    <section class="tag-previews">
        <h2>Contenuti per tag</h2>
        <?php
        $tags = get_tags();
        foreach ($tags as $tag) :
            $tag_link = get_tag_link($tag->term_id);
            $args = array(
                'post_type' => array('post', 'opere', 'eventi', 'sponsor'),
                'tag_id' => $tag->term_id,
                'posts_per_page' => 5 // Limita i post mostrati
            );
            $tag_query = new WP_Query($args);
            if ($tag_query->have_posts()) : ?>
                <h3><a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a></h3>
                <ul>
                    <?php while ($tag_query->have_posts()) : $tag_query->the_post(); ?>
                        <li>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <span class="content-type">
                                <?php echo get_content_type_label(get_post_type()); ?>
                            </span>
                        </li>
                    <?php endwhile; ?>
                </ul>
        <?php endif;
            wp_reset_postdata();
        endforeach; ?>
    </section>

    <!-- Sezione contenuti in evidenza -->
    <section class="featured-content">
        <h2>Contenuti in evidenza</h2>

        <?php
        $args = array(
            'post_type' => array('post', 'opere', 'eventi', 'sponsor'),
            'meta_query' => array(
                array(
                    'key' => 'in_evidenza',
                    'value' => '1',
                    'compare' => '=='
                )
            ),
            'posts_per_page' => 5
        );
        $featured_query = new WP_Query($args);

        if ($featured_query->have_posts()) : ?>
            <ul>
                <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                    <li>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <span class="content-type">
                            <?php echo get_content_type_label(get_post_type()); ?>
                        </span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>Nessun contenuto in evidenza.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>