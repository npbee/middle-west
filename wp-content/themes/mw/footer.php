        <div class="footer-container">
            <footer class="wrapper">

                <div class="mailing-list">
                    <!--[if lte IE 8]><label for="email">Sign up for the newsletter:</label><![endif]-->
                    <div class="mailing-list-container">
                        <form>

                            <input type=hidden id="oid" name="oid" value="00Di0000000af6M">
                            <input type=hidden name="retURL" value="http://www.middlewestmgmt.com">
                            <input type=hidden name="List_Name__c" value="Middle West">

                            <label class="error error--empty" for="email">This field is required</label>
                            <label class="error error--invalid" for="email">Please enter a valid email address.</label>

                            <input id="email" name="email" maxlength="80" type="email" placeholder="mailing list signup..." />
                            <input id="submit" type="submit" value="Submit" />

                        </form>
                    </div>
                </div>

                <div class="social">
                    <a href="mailto:info@middlewestmgmt.com" class="rondo" data-icon="&#x25;" target="_blank"><span class="hide">email</span></a>
                    <a class="rondo" data-icon="&#x24;" href="http://facebook.com/middlewestmgmt" target="_blank"><span class="hide">facebook</span></a>
                    <a class="rondo" data-icon="&#x22;" href="https://twitter.com/middlewestmgmt" target="_blank"><span class="hide">twitter</span></a>
                    <a class="rondo" data-icon="&#x23;" href="http://instagram.com/middlewestmgmt" target="_blank"><span class="hide">instagram</span></a>
                </div>

                <div class="copyright">
                &copy; <?php echo date('Y'); ?> Middle West
                </div>

            </footer>
        </div>
        <script>
            mwmTumblr = {};
            mwmTumblr.tag = "<?php the_field('tumblr_tag'); ?>";
            </script>
        <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', 'UA-44113315-1', 'middlewestmgmt.com');
                ga('send', 'pageview');
        </script>
    </body>
</html>
