<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="content" class="content wrapper wrapper-content">

    <div class="holder holder-content">

        <!-- <img src="<?php header_image(); ?>"> -->
        
        <div class="row">

            <article class="maincontent col col-6">
    
                <?php if (have_posts()) : ?>
    
                    <?php while (have_posts()) : the_post(); ?>
                    
                        <header class="maincontent-header">
                            
                            <h1 class="maincontent-title">
                                <?php the_title(); ?>
                            </h1>
                            
                        </header>
                        
                        <div class="maincontent-body">
                            <?php the_content('Weiterlesen &raquo;'); ?>
                        </div>
                        
                        <div class="row">
                        
                            <p class="col col-palm-8 col-8">
                                <strong>col-palm-8 col-8</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                        </div>
                        
                        <div class="row">
                        
                            <p class="col col-4">
                                <strong>col-4</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-4">
                                <strong>col-4</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                                
                        </div>
                        
                        <div class="row">
                        
                            <p class="col col-palm-4 col-8">
                                <strong>col-palm-4 col-8</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-4 col-8">
                                <strong>col-palm-4 col-8</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                                
                        </div>
                        
                        <div class="row">
                        
                            <p class="col col-palm-4 col-lap-2 col-2">
                                <strong>col-palm-4 col-lap-2 col-2</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-4 col-lap-2 col-2">
                                <strong>col-palm-4 col-lap-2 col-2</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-4 col-lap-2 col-2">
                                <strong>col-palm-4 col-lap-2 col-2</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-4 col-lap-2 col-2">
                                <strong>col-palm-4 col-lap-2 col-2</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                        </div>
                        
                        <div class="row">
                        
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                            <p class="col col-palm-2 col-lap-1 col-1">
                                <strong>col-palm-2 col-lap-1 col-1</strong>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </p>
                            
                        </div>
                        
                    <?php endwhile; ?>
    
                <?php endif; ?>
    
            </article> <!-- .maincontent -->
            
            <aside class="sidebar col col-2">
            
                <p class="sidebar-section">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Plura mihi bona sunt, inclinet, amari petere vellent. Tityre, tu patulae recubans sub tegmine fagi  dolor. Ab illo tempore, ab est sed immemorabili. A communi observantia non est recedendum.</p>
                <p class="sidebar-section">Hi omnes lingua, institutis, legibus inter se differunt. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Tu quoque, Brute, fili mi, nihil timor populi, nihil! Morbi odio eros, volutpat ut pharetra vitae, lobortis sed nibh. Contra legem facit qui id facit quod lex prohibet.</p>
                <p class="sidebar-section">Ambitioni dedisse scripsisse iudicaretur. Donec sed odio operae, eu vulputate felis rhoncus. Cum sociis natoque penatibus et magnis dis parturient. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Excepteur sint obcaecat cupiditat non proident culpa.</p>
                
            </aside>
            
        </div> <!-- .row -->

    </div> <!-- .holder -->

</div> <!-- #content -->

<?php get_footer(); ?>