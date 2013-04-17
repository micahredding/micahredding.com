<?php /* Smarty version 2.6.26, created on 2012-10-13 22:58:45
         compiled from _post.counts_no_author.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'filter_xss', '_post.counts_no_author.tpl', 34, false),array('modifier', 'regex_replace', '_post.counts_no_author.tpl', 34, false),array('modifier', 'link_usernames_to_twitter', '_post.counts_no_author.tpl', 34, false),array('modifier', 'strip_tags', '_post.counts_no_author.tpl', 37, false),array('modifier', 'truncate', '_post.counts_no_author.tpl', 37, false),array('modifier', 'urlencode', '_post.counts_no_author.tpl', 57, false),array('modifier', 'relative_datetime', '_post.counts_no_author.tpl', 62, false),array('modifier', 'number_format', '_post.counts_no_author.tpl', 80, false),)), $this); ?>

<?php if (($this->_foreach['foo']['iteration'] <= 1)): ?>
  <div class="header clearfix">
    <div class="grid_13 alpha">&#160;</div>
    <div class="grid_2 center">
      <?php if ($this->_tpl_vars['post']->network == 'twitter' || $this->_tpl_vars['post']->network == 'google+'): ?>
        <?php if ($this->_tpl_vars['show_favorites_instead_of_retweets']): ?><?php if ($this->_tpl_vars['post']->network == 'google+'): ?>+1s<?php else: ?>favorites<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['post']->network == 'google+'): ?>reshares<?php else: ?>retweets<?php endif; ?><?php endif; ?>
     <?php else: ?>
        <?php if ($this->_tpl_vars['show_favorites_instead_of_retweets']): ?><?php if ($this->_tpl_vars['post']->network == 'google+'): ?>+1s<?php else: ?>likes<?php endif; ?><?php endif; ?>
     <?php endif; ?>
    </div>
    <div class="grid_2 center omega">
      replies
    </div>
  </div>
<?php endif; ?>

<div class="clearfix article">
  <div class="individual-tweet post clearfix<?php if ($this->_tpl_vars['post']->is_protected): ?> private<?php endif; ?>">
    <div class="grid_13 alpha">
      <div class="post">
        <?php if ($this->_tpl_vars['post']->post_text): ?>
          <?php if ($this->_tpl_vars['scrub_reply_username']): ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^@[a-zA-Z0-9_]+/", "") : smarty_modifier_regex_replace($_tmp, "/^@[a-zA-Z0-9_]+/", "")))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

          <?php else: ?>
          <?php if ($this->_tpl_vars['post']->network == 'google+'): ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, '150') : smarty_modifier_truncate($_tmp, '150')); ?>

           <?php else: ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

            <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>

      <?php $_from = $this->_tpl_vars['post']->links; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['linkloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['linkloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lkey'] => $this->_tpl_vars['link']):
        $this->_foreach['linkloop']['iteration']++;
?>
          <?php if ($this->_tpl_vars['link']->expanded_url): ?>
            <?php if ($this->_tpl_vars['post']->post_text != ''): ?><br><?php endif; ?>
            <?php if ($this->_tpl_vars['link']->image_src): ?>
             <div class="pic" style="float:left;margin-right:5px;margin-top:5px;"><a href="<?php echo $this->_tpl_vars['link']->url; ?>
"><img src="<?php echo $this->_tpl_vars['link']->image_src; ?>
" style="margin-bottom:5px;"/></a></div>
            <?php endif; ?>
             <span class="small"><a href="<?php echo $this->_tpl_vars['link']->expanded_url; ?>
" title="<?php echo $this->_tpl_vars['link']->url; ?>
"><?php if ($this->_tpl_vars['link']->title): ?><?php echo $this->_tpl_vars['link']->title; ?>
<?php else: ?><?php echo $this->_tpl_vars['link']->expanded_url; ?>
<?php endif; ?></a>
            <?php if ($this->_tpl_vars['link']->description): ?><br><small><?php echo $this->_tpl_vars['link']->description; ?>
</small><?php endif; ?></span>
          <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      <br clear="all">

        <?php if (! $this->_tpl_vars['post'] && $this->_tpl_vars['post']->in_reply_to_post_id): ?>
          <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->in_reply_to_post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><span class="ui-icon ui-icon-arrowthick-1-w" title="reply to..."></span></a>
        <?php endif; ?>

      <div class="small gray">
        <span class="metaroll">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->adj_pub_date)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
 ago</a>
        <?php if ($this->_tpl_vars['post']->is_geo_encoded < 2): ?>
        from <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->location)) ? $this->_run_mod_handler('truncate', true, $_tmp, 60, ' ...') : smarty_modifier_truncate($_tmp, 60, ' ...')); ?>

       <?php endif; ?>
        <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
        <a href="http://twitter.com/intent/tweet?in_reply_to=<?php echo $this->_tpl_vars['post']->post_id; ?>
"><span class="ui-icon ui-icon-arrowreturnthick-1-w" title="reply"></span></a>
        <a href="http://twitter.com/intent/retweet?tweet_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
"><span class="ui-icon ui-icon-arrowreturnthick-1-e" title="retweet"></span></a>
        <a href="http://twitter.com/intent/favorite?tweet_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
"><span class="ui-icon ui-icon-star" title="favorite"></span></a>
        <?php endif; ?>
      </span>&nbsp;</div>
      </div><!--end post-->
      
    </div>
    <div class="grid_2 center">
    <?php if ($this->_tpl_vars['post']->network == 'twitter' || $this->_tpl_vars['post']->network == 'google+'): ?>
     <?php if ($this->_tpl_vars['show_favorites_instead_of_retweets'] && $this->_tpl_vars['show_favorites_instead_of_retweets'] != false): ?>
       <?php if ($this->_tpl_vars['post']->favlike_count_cache): ?>
       <span class="reply-count">
          <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&v=<?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>favs<?php else: ?>plus1s<?php endif; ?>"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->favlike_count_cache)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</a>
       </span>
      <?php else: ?>
        &#160;
      <?php endif; ?>
    <?php else: ?>
      <?php if ($this->_tpl_vars['post']->all_retweets > 0): ?>
        <span class="reply-count">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&v=fwds"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->all_retweets)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<?php if ($this->_tpl_vars['post']->rt_threshold): ?>+<?php endif; ?><!-- retweet<?php if ($this->_tpl_vars['post']->retweet_count_cache == 1): ?><?php else: ?>s<?php endif; ?>--></a>
        </span>
      <?php else: ?>
        &#160;
      <?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['post']->network == 'facebook' || $this->_tpl_vars['post']->network == 'facebook page'): ?>
        <?php if ($this->_tpl_vars['post']->favlike_count_cache > 0): ?>
        <span class="reply-count">
            <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&v=likes"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->favlike_count_cache)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</a>
        </span>
        <?php else: ?>
        &#160;
        <?php endif; ?>
    <?php endif; ?>
    </div>
    <div class="grid_2 center omega">
      <?php if ($this->_tpl_vars['post']->reply_count_cache > 0): ?>
        <span class="reply-count">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->reply_count_cache)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
<!-- repl<?php if ($this->_tpl_vars['post']->reply_count_cache == 1): ?>y<?php else: ?>ies<?php endif; ?>--></a>
        </span>
      <?php else: ?>
        &#160;
      <?php endif; ?>
    </div>
  </div>
</div>