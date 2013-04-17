<?php /* Smarty version 2.6.26, created on 2012-10-14 00:09:22
         compiled from post.index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'dashboard_link', 'post.index.tpl', 13, false),array('modifier', 'urlencode', 'post.index.tpl', 15, false),array('modifier', 'number_format', 'post.index.tpl', 67, false),array('modifier', 'relative_datetime', 'post.index.tpl', 70, false),array('modifier', 'strip_tags', 'post.index.tpl', 77, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_statusbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container_24">
  <div class="clearfix">
    
    <div class="grid_4 alpha omega" style=""> <!-- begin left nav -->
      <div id="nav">
        <ul id="top-level-sidenav">
        
        <?php if ($this->_tpl_vars['post']): ?>

          <li><a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'dashboard_link')), $this); ?>
">Dashboard</a></li>
          <li<?php if ($_GET['v'] == ''): ?> class="selected"<?php endif; ?>>
          <a href="?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
">Replies&nbsp;&nbsp;&nbsp;</a>
          </li>
          <?php if ($this->_tpl_vars['post']->reply_count_cache && $this->_tpl_vars['post']->reply_count_cache > 1): ?>
            <li id="grid_search_input" style="padding:10px;">
          <form id="grid_search_form" action="<?php echo $this->_tpl_vars['site_root_path']; ?>
post">
          <input type="hidden" name="t" value="<?php echo $this->_tpl_vars['post']->post_id; ?>
" />
          <input type="hidden" name="n" value="<?php echo $this->_tpl_vars['post']->network; ?>
" />
            <input type="text" name="search" id="grid_search_sidebar_input" onclick="clickclear(this, 'Search')" onblur="clickrecall(this,'Search')" value="Search" style="margin-top: 3px;" size="5"/>&nbsp;<input type="submit" href="#" class="grid_search" onclick="$('#grid_search_form').submit(); return false;" value="Go">
          </form>
            </li>
<script type="text/javascript"><?php echo '
function clickclear(thisfield, defaulttext) {
if (thisfield.value == defaulttext) {
thisfield.value = "";
}
}

function clickrecall(thisfield, defaulttext) {
if (thisfield.value == "") {
thisfield.value = defaulttext;
}
}'; ?>

</script>
            
          <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['sidebar_menu']): ?>
          <?php $_from = $this->_tpl_vars['sidebar_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['smenuloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['smenuloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['smkey'] => $this->_tpl_vars['sidebar_menu_item']):
        $this->_foreach['smenuloop']['iteration']++;
?>
              <li<?php if ($_GET['v'] == $this->_tpl_vars['smkey']): ?> class="selected"<?php endif; ?>><a href="?v=<?php echo $this->_tpl_vars['smkey']; ?>
&t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo $this->_tpl_vars['sidebar_menu_item']->name; ?>
&nbsp;&nbsp;&nbsp;</a></li>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        </ul>

      </div>
    </div> <!-- end left nav -->

    <div class="thinkup-canvas round-all grid_20 alpha omega prepend_20 append_20" style="min-height:340px">
      <div class="prefix_1">

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_usermessage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if ($this->_tpl_vars['data_template']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['data_template'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>

          <?php if ($this->_tpl_vars['post']): ?>
            <div class="clearfix alert stats">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "post.index._top-post.tpl", 'smarty_include_vars' => array('show_embed' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

              <div class="grid_6 omega center keystats">
                <div class="big-number">
                    <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->reply_count_cache)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</h1>
                    <h3><?php if ($this->_tpl_vars['post']->reply_count_cache == 1): ?>reply<?php else: ?>replies<?php endif; ?>
                    
                     in <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->adj_pub_date)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
</h3>

<?php if (! $this->_tpl_vars['post']->is_protected): ?>
<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>

   <a href="https://twitter.com/share" class="twitter-share-button"
      data-via="thinkupapp"
      data-text="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
"
      data-related="thinkupapp,expertlabs,ginatrapani"
      data-count="none">Tweet</a>
<?php echo '

<script type="text/javascript">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<g:plusone size="medium" annotation="none"></g:plusone>
'; ?>

<?php endif; ?>
                </div>
              </div>
            </div> <!-- /.clearfix -->
          <?php endif; ?> <!-- end if post -->
            <?php if ($this->_tpl_vars['disable_embed_code'] != true): ?>
                <div class="alert stats" style="display:none;" id="embed-this-thread">
                <div style="float: right; margin: 0px 10px 0px 0px;">
                <a href="javascript:;" title="Embed this thread"
                onclick="$('#embed-this-thread').hide(); return false;">
                <span class="ui-icon ui-icon-circle-close"></span></a>
                </div>

                <h6>Embed this thread:</h6>
                <textarea cols="55" rows="2" id="txtarea" onClick="SelectAll('txtarea');">&lt;script src=&quot;http<?php if ($_SERVER['HTTPS']): ?>s<?php endif; ?>://<?php echo $_SERVER['SERVER_NAME']; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
api/embed/v1/thinkup_embed.php?p=<?php echo $_GET['t']; ?>
&n=<?php echo ((is_array($_tmp=$_GET['n'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&quot;>&lt;/script></textarea>
                </div>
                <?php echo '
                <script type="text/javascript">
                function SelectAll(id) {
                document.getElementById(id).focus();
                document.getElementById(id).select();
                }
                </script>
                '; ?>

            <?php endif; ?>
          
          <?php if ($this->_tpl_vars['replies']): ?>
            <div class="prepend">
              <div class="append_20 clearfix">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_post.word-frequency.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php if ($this->_tpl_vars['replies']): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_grid.search.tpl", 'smarty_include_vars' => array('version2' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
                <div id="post-replies-div" class="section"<?php if ($this->_tpl_vars['search_on']): ?> style="display: none;"<?php endif; ?>>
                    <h2>Replies</h2>
                  <div id="post_replies clearfix alert stats">
                  <?php $_from = $this->_tpl_vars['replies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['t']):
        $this->_foreach['foo']['iteration']++;
?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_post.author_no_counts.tpl", 'smarty_include_vars' => array('post' => $this->_tpl_vars['t'],'scrub_reply_username' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php endforeach; endif; unset($_from); ?>
                
                  </div>
                </div>
                <script src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/extlib/Snowball.stemmer.min.js" type="text/javascript"></script>
                <?php if ($this->_tpl_vars['search_on']): ?><script type="text/javascript">grid_search_on = true</script><?php endif; ?>
                <script src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/word_frequency.js" type="text/javascript"></script>
                <?php if (! $this->_tpl_vars['logged_in_user'] && $this->_tpl_vars['private_reply_count'] > 0): ?>
                <div class="stream-pagination">
                  <span style="font-size:12px">Not showing <?php echo $this->_tpl_vars['private_reply_count']; ?>
 private repl<?php if ($this->_tpl_vars['private_reply_count'] == 1): ?>y<?php else: ?>ies<?php endif; ?>.</span>
                </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>
          
      </div> <!-- /.prefix_1 -->
    </div> <!-- /.thinkup-canvas -->
  </div> <!-- /.clearfix -->
</div> <!-- /.container_24 -->

  <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/linkify.js"></script>
  <?php if ($this->_tpl_vars['replies']): ?>
    <script type="text/javascript">post_username = '<?php echo $this->_tpl_vars['post']->author_username; ?>
';</script>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/grid_search.js"></script>
  <?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>