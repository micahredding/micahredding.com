<?php /* Smarty version 2.6.26, created on 2012-10-13 22:58:41
         compiled from _footer.tpl */ ?>
  <div class="small center" id="footer">
  <?php if ($this->_tpl_vars['linkify'] != 'false'): ?>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/linkify.js"></script>
  <?php endif; ?>

    <div id="ft" role="contentinfo">
    <div id="">
      <p>
       <a href="http://thinkupapp.com">ThinkUp<?php if ($this->_tpl_vars['thinkup_version']): ?> <?php echo $this->_tpl_vars['thinkup_version']; ?>
<?php endif; ?></a> &#8226; 
       <a href="http://thinkupapp.com/docs/">Documentation</a> 
       &#8226; <a href="http://groups.google.com/group/thinkupapp">Mailing List</a> 
       &#8226; <a href="http://webchat.freenode.net/?channels=thinkup">IRC Channel</a><br>
        It is nice to be nice.
        <br /> <br /><a href="http://twitter.com/thinkup"><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/favicon_twitter.png"></a>
        <a href="http://facebook.com/thinkupapp"><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/favicon_facebook.png"></a>
        <a href="http://gplus.to/thinkup"><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/favicon_googleplus.png"></a>
      </p>
    </div>
    </div> <!-- #ft -->

  </div> <!-- .content -->

<div id="screen"></div>
</body>

</html>