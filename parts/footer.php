<?php
function make_footer($routes) {
?>
<div id="footer">
    <?php make_nav("","",$routes,"footer-nav",false); ?>
    <div class="footer-contact">
        <a href="mailto:techfair-exec@mit.edu">techfair-exec@mit.edu</a><br />
        <span id="copyright">&copy; MIT Techfair 2013</span>
        <a href="http://facebook.com/techfair"><img src="/img/homepage/facebook.png" alt="fb" /></a>
    </div>
  <?php /*
        <div id="sponsors">
            <h1>Past Companies</h1>
            <ul id="sponsorlinks">
                <li id="facebook"><a href="http://www.facebook.com"></a></li>
                <li id="apple"><a href="http://www.apple.com"></a></li>
                <li id="dropbox"><a href="http://www.dropbox.com"></a></li>
                <li id="microsoft"><a href="http://microsoft.com"></a></li>
                <li id="oracle"><a href="http://oracle.com"></a></li>
                <li id="palantir"><a href="http://www.palantir.com"></a></li>
                <li id="slb"><a href="http://www.slb.com"></a></li>
                <li id="sequoia"><a href="http://www.sequoiacap.com"></a></li>
                <li id="andmore"><a href="/companies/exhibitorlist/">and more...</a></li>
            </ul>
            
        </div>
  */ ?>
</div>
<?php	
}
?>
