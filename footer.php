                <div id="doormat" class="wrapper">
                    <div class="holder">
                        <section class="vcard">
                            <ul class="adr">
                                <li class="org"><strong>Wout Mager</strong></li>
                                <li class="street-address">Folkingestraat 37B</li>
                                <li><span class="postal-code">9711 JT</span>, <span class="locality">Groningen</span></li>
                                <li class="country-name">Nederland</li>
                            </ul>
                            <ul>
                                <li class="url fn"><strong>Wout Mager</strong></li>
                                <li class="tel">06 - 46 41 27 70</li>
                                <li><a href="mailto:wout@woutmager.nl" class="email">wout@woutmager.nl</a></li>
                            </ul>
                        </section>
                    </div>
                </div>
                
                <footer class="wrapper">
                    <div class="holder">
                        &copy; <?php echo date("Y") ?>
                    </div>
                </footer>
            </div>    
        </div>
        
        <script>
            // jQuery vs Zepto
            document.write('<script src=' +
            ('__proto__' in {} ? '<?php bloginfo('template_url'); ?>/js/zepto-ck' : 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min') +
            '.js><\/script>')
        </script>
        
        <?php if(is_page_template('contact.php')) { ?>
            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgU-OMTQXQwUwOyNRZB5jh1cFgY5z_L2A&sensor=false"></script>
        <?php } ?>
        
        <script src="<?php bloginfo('template_url'); ?>/js/functions-ck.js"></script>
        
        <?php wp_footer(); ?>
  
    </body>
</html>