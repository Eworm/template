                <div class="doormat divider divider-doormat">
                
                    <div class="core core-doormat">
                    
                        <section class="vcard">
                        
                            <ul class="vcard-section adr">
                                <li class="org"><strong>Wout Mager</strong></li>
                                <li class="street-address">Folkingestraat 37B</li>
                                <li><span class="postal-code">9711 JT</span>, <span class="locality">Groningen</span></li>
                                <li class="country-name">Nederland</li>
                            </ul>
                            
                            <ul class="vcard-section">
                                <li class="url fn"><strong>Wout Mager</strong></li>
                                <li class="tel">06 - 46 41 27 70</li>
                                <li><a href="mailto:wout@woutmager.nl" class="email">wout@woutmager.nl</a></li>
                            </ul>
                            
                        </section>
                        
                    </div>
                    
                </div>
                
                <footer class="footer divider divider-footer">
                
                    <div class="core core-footer">
                        &copy; <?php echo date("Y") ?>
                    </div>
                    
                </footer>
                
            </div>    
        </div>
        
        <!-- So we can use the template url in  javascript -->
        <script>var templateUrl = "<?php bloginfo('template_url'); ?>";</script>
        
        <!-- This will load and inject all js & css -->
        <script src="<?php bloginfo('template_url'); ?>/js/yepnope.min.js" async></script>
        
        <?php if(is_page_template('contact.php')) { ?>
            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgU-OMTQXQwUwOyNRZB5jh1cFgY5z_L2A&sensor=false"></script>
        <?php } ?>
        
        <?php wp_footer(); ?>
  
    </body>
</html>