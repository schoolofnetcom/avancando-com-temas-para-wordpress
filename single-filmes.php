<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<?php get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();
                                 
							get_template_part('content', get_post_format());
                            the_post_thumbnail('medium');
                              
                             echo "<br/>";
                                 $id = get_the_id();
                              $termos = wp_get_post_terms($id,'genero');
  
                              echo "Gêneros: ";
                              foreach ($termos as $termo) {
                              	
                              	  $link = get_term_link($termo);

                                  echo "<a href='$link'>".$termo->name."</a> || ";

                              }
                                   
                                    echo "<br/>";

                                    
                                    
                                    

                                    echo '<h4> Lançamento: ';
                                     the_field('ano_de_lancamento');
                                    echo '</h4>'; 

                                    echo '<h4> Crítica: ';
                                     the_field('critica');
                                    echo '</h4>'; 

                                    echo '<h4> Estúdio: ';
                                     the_field('estudio');
                                    echo '</h4>';                            


							echo "\n\n";
							
							bootstrapBasicPagination();

							echo "\n\n";
							
						} //endwhile;
						?> 
					</main>
				</div>
<?php get_footer(); ?> 
