<?php get_header(); ?>

<header class="header aboutHeader">
 <div class="header__content">
  <h1 class="header__title"> <?php echo get_the_title(get_option('page_for_posts')); ?></h1>
  <p class="header_subtitle">
   <?php echo get_theme_mod('nnj_header_subtitle', 'Texto por defecto si no hay valor.'); ?>
  </p>
 </div>
</header>

<main class="blogMain">
 <section class="section">
  <div class="container-pcL">


   <h1 class="blogMain__title">Últimos Post</h1>

   <?php if (have_posts()) : ?>
    <ul class="blog__posts">
     <?php while (have_posts()) : the_post(); ?>
      <li class="blog__post">
       <?php the_post_thumbnail('medium'); ?>

       <h2 class="blog__post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
       <p class="blog__post__description"><?php echo get_the_excerpt(); ?></p>
      </li>
     <?php endwhile; ?>
    </ul>

    <?php the_posts_pagination(); ?>

   <?php else : ?>
    <p>No hay entradas aún</p>
   <?php endif; ?>
  </div>
 </section>

 <?php get_footer(); ?>