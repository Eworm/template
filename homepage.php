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

            <main class="main-content col col-6" role="main">
    
                <?php if (have_posts()) : ?>
    
                    <?php while (have_posts()) : the_post(); ?>
                
                        <h1 class="main-content-title">
                            <?php the_title(); ?>
                        </h1>
                        
                        <div class="main-content-body">
                            <?php the_content('Weiterlesen &raquo;'); ?>
                            
                            <table border="0" cellspacing="0" class="responsive-table">
                                <thead>
                                    <tr>
                                        <th>Header 1</th>
                                        <th>Header 2</th>
                                        <th>Header 3</th>
                                        <th>Header 4</th>
                                        <th>Header 5</th>
                                        <th>Header 6</th>
                                        <th>Header 7</th>
                                        <th>Header 8</th>
                                        <th>Header 9</th>
                                        <th>Header 10</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                        <td>Cell 5</td>
                                        <td>Cell 6</td>
                                        <td>Cell 7</td>
                                        <td>Cell 8</td>
                                        <td>Cell 9</td>
                                        <td>Cell 10</td>
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                        <td>Cell 5</td>
                                        <td>Cell 6</td>
                                        <td>Cell 7</td>
                                        <td>Cell 8</td>
                                        <td>Cell 9</td>
                                        <td>Cell 10</td>
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                        <td>Cell 5</td>
                                        <td>Cell 6</td>
                                        <td>Cell 7</td>
                                        <td>Cell 8</td>
                                        <td>Cell 9</td>
                                        <td>Cell 10</td>
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                        <td>Cell 5</td>
                                        <td>Cell 6</td>
                                        <td>Cell 7</td>
                                        <td>Cell 8</td>
                                        <td>Cell 9</td>
                                        <td>Cell 10</td>
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                        <td>Cell 5</td>
                                        <td>Cell 6</td>
                                        <td>Cell 7</td>
                                        <td>Cell 8</td>
                                        <td>Cell 9</td>
                                        <td>Cell 10</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-4 col-push-4">
                                <h3>col-4 col-push-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-8 col-8">
                                <h3>col-palm-8 col-8</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                
                                <div class="row">
                        
                                    <div class="col col-4">
                                        <h3>col-4</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                    
                                    <div class="col col-4">
                                        <h3>col-4</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                        
                                        <div class="row">
                                        
                                            <div class="col col-4">
                                                <h3>col-4</h3>
                                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                            </div>
                                            
                                            <div class="col col-4">
                                                <h3>col-4</h3>
                                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                            </div>
                                        
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-4">
                                <h3>col-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                
                                <div class="row">
                                
                                    <div class="col col-4">
                                        <h3>col-4</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                    
                                    <div class="col col-4">
                                        <h3>col-4</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                        
                                        <div class="row">
                                
                                            <div class="col col-4">
                                                <h3>col-4</h3>
                                                Lorem ipsum dolor sit amet, consectetur
                                            </div>
                                            
                                            <div class="col col-4">
                                                <h3>col-4</h3>
                                                Lorem ipsum dolor sit amet, consectetur
                                            </div>
                                        
                                        </div>
                                
                                    </div>
                                
                                </div>
                                
                            </div>
                            
                            <div class="col col-4">
                                <h3>col-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                
                                <div class="row">
                                
                                    <div class="col col-4">
                                        <h3>col-4</h3>
                                        Lorem ipsum dolor sit amet, consectetur
                                    </div>
                                    
                                    <div class="col col-4">
                                        <h3>col-4</h3>
                                        Lorem ipsum dolor sit amet, consectetur
                                        
                                        <div class="row">
                                
                                            <div class="col col-4">
                                                <h3>col-4</h3>
                                                Lorem ipsum dolor sit amet, consectetur
                                            </div>
                                            
                                            <div class="col col-4">
                                                <h3>col-4</h3>
                                                Lorem ipsum dolor sit amet, consectetur
                                            </div>
                                        
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                
                                <div class="row">
                                
                                    <div class="col col-6">
                                        <h3>col-6</h3>
                                        Lorem ipsum dolor sit amet, consectetur
                                    </div>
                                    
                                    <div class="col col-2">
                                        <h3>col-2</h3>
                                        Lorem ipsum dolor sit amet, consectetur
                                    </div>
                                
                                </div>
                                
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-2">
                                <h3>col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                
                                <div class="row">
                                
                                    <div class="col col-5">
                                        <h3>col-5</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                    
                                    <div class="col col-3">
                                        <h3>col-3</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                
                                </div>
                                
                            </div>
                            
                            <div class="col col-4">
                                <h3>col-4</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                
                                <div class="row">
                                
                                    <div class="col col-2">
                                        <h3>col-2</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                    
                                    <div class="col col-2">
                                        <h3>col-2</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                    
                                    <div class="col col-2">
                                        <h3>col-2</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                    
                                    <div class="col col-2">
                                        <h3>col-2</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                    </div>
                                
                                </div>
                                
                            </div>
                            
                            <div class="col col-2">
                                <h3>col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-2 col-2">
                                <h3>col-palm-4 col-lap-2 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-2 col-lap-1 col-1">
                                <h3>col-palm-2 col-lap-1 col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-4 col-lap-2 col-desk-6 col-2">
                                <h3>col-palm-4 col-lap-2 col-desk-6 col-2</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-4 col-lap-6 col-desk-2 col-6">
                                <h3>col-palm-4 col-lap-6 col-desk-2 col-6</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-1">
                                <h3>col-1</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-7">
                                <h3>col-7</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                                
                        </div>
                        
                        <div class="row">
                        
                            <div class="col col-palm-4 col-8">
                                <h3>col-palm-4 col-8</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                            
                            <div class="col col-palm-4 col-8">
                                <h3>col-palm-4 col-8</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                            </div>
                                
                        </div>
                        
                    <?php endwhile; ?>
    
                <?php endif; ?>
    
            </main> <!-- .main-content -->
            
            <aside class="sidebar col col-2" role="complementary">
            
                <div class="sidebar-section">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Plura mihi bona sunt, inclinet, amari petere vellent. Tityre, tu patulae recubans sub tegmine fagi  dolor. Ab illo tempore, ab est sed immemorabili. A communi observantia non est recedendum.</div>
                <div class="sidebar-section">Hi omnes lingua, institutis, legibus inter se differunt. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Tu quoque, Brute, fili mi, nihil timor populi, nihil! Morbi odio eros, volutpat ut pharetra vitae, lobortis sed nibh. Contra legem facit qui id facit quod lex prohibet.</div>
                <div class="sidebar-section">Ambitioni dedisse scripsisse iudicaretur. Donec sed odio operae, eu vulputate felis rhoncus. Cum sociis natoque penatibus et magnis dis parturient. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Excepteur sint obcaecat cupiditat non proident culpa.</div>
                
            </aside>
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>