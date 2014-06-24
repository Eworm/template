<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">

        <!-- <img src="<?php header_image(); ?>"> -->
        
        <div class="row">

            <article class="main-content col col-6">
    
                <?php if (have_posts()) : ?>
    
                    <?php while (have_posts()) : the_post(); ?>
                    
                        <header class="main-content-header">
                            
                            <h1 class="main-content-title">
                                <?php the_title(); ?>
                            </h1>
                            
                        </header>
                        
                        <div class="main-content-body">
                            <?php the_content('Weiterlesen &raquo;'); ?>
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-8 col-8">
                                <h3>col-palm-8 col-8</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-4 col-push-4">
                                <h3>col-4 col-push-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-4">
                                <h3>col-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-4">
                                <h3>col-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-4 col-lap-2 col-desk-6 col-2">
                                <h3>col-palm-4 col-lap-2 col-desk-6 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-6 col-desk-2 col-6">
                                <h3>col-palm-4 col-lap-6 col-desk-2 col-6</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-4 col-8">
                                <h3>col-palm-4 col-8</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-4 col-8">
                                <h3>col-palm-4 col-8</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.
                            </div>
                            
                        </div>
                        
                    <?php endwhile; ?>
    
                <?php endif; ?>
    
            </article> <!-- .main-content -->
            
            <aside class="sidebar col col-2">
            
                <div class="sidebar-section">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Plura mihi bona sunt, inclinet, amari petere vellent. Tityre, tu patulae recubans sub tegmine fagi  dolor. Ab illo tempore, ab est sed immemorabili. A communi observantia non est recedendum.</div>
                <div class="sidebar-section">Hi omnes lingua, institutis, legibus inter se differunt. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Tu quoque, Brute, fili mi, nihil timor populi, nihil! Morbi odio eros, volutpat ut pharetra vitae, lobortis sed nibh. Contra legem facit qui id facit quod lex prohibet.</div>
                <div class="sidebar-section">Ambitioni dedisse scripsisse iudicaretur. Donec sed odio operae, eu vulputate felis rhoncus. Cum sociis natoque penatibus et magnis dis parturient. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Excepteur sint obcaecat cupiditat non proident culpa.</div>
                
            </aside>
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>