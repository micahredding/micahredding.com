<?php /* Smarty version 2.6.26, created on 2012-10-13 22:58:45
         compiled from _post.author_no_counts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'get_plugin_path', '_post.author_no_counts.tpl', 18, false),array('modifier', 'number_format', '_post.author_no_counts.tpl', 33, false),array('modifier', 'filter_xss', '_post.author_no_counts.tpl', 50, false),array('modifier', 'regex_replace', '_post.author_no_counts.tpl', 50, false),array('modifier', 'link_usernames_to_twitter', '_post.author_no_counts.tpl', 50, false),array('modifier', 'relative_datetime', '_post.author_no_counts.tpl', 84, false),array('modifier', 'truncate', '_post.author_no_counts.tpl', 97, false),)), $this); ?>
<div class="clearfix article">
<div class="individual-tweet post clearfix<?php if ($this->_tpl_vars['post']->is_protected): ?> private<?php endif; ?>">
    <div class="grid_2 alpha">
      <div class="avatar-container">
        <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?> <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
" title="<?php echo $this->_tpl_vars['post']->author_username; ?>
 on Twitter"><?php endif; ?>
        <img src="<?php echo $this->_tpl_vars['post']->author_avatar; ?>
" class="avatar2"/><img src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('get_plugin_path', true, $_tmp) : smarty_modifier_get_plugin_path($_tmp)); ?>
/assets/img/favicon.png" class="service-icon"/>
        <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?></a><?php endif; ?>
      </div>
    </div>
    <div class="grid_3 small">
      <?php if ($this->_tpl_vars['post']->network == 'twitter' && $this->_tpl_vars['username_link'] != 'internal'): ?>
        <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
" title="<?php echo $this->_tpl_vars['post']->author_username; ?>
 on Twitter"><?php echo $this->_tpl_vars['post']->author_username; ?>
</a>
      <?php elseif ($this->_tpl_vars['post']->network == 'foursquare'): ?>
                <?php echo $this->_tpl_vars['post']->author_fullname; ?>

      <?php else: ?>
        <?php echo $this->_tpl_vars['post']->author_username; ?>

      <?php endif; ?>

      <?php if (( $this->_tpl_vars['post']->author && $this->_tpl_vars['post']->author->follower_count > 0 )): ?>
        <div class="gray"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->author->follower_count)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 followers</div>
      <?php else: ?>
      <br>
      <?php endif; ?>
        <?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
            <?php if ($this->_tpl_vars['post']->is_reply_by_friend || $this->_tpl_vars['post']->is_retweet_by_friend): ?>
                <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
" title="Friend"><span class="sprite ui-icon-contact"></span></a>
            <?php else: ?>
                <a href="https://twitter.com/intent/user?user_id=<?php echo $this->_tpl_vars['post']->author_user_id; ?>
" title="<?php echo $this->_tpl_vars['post']->author_username; ?>
 on Twitter"><span class="sprite ui-icon-person"></span></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="grid_12 omega">
      <div class="post">
        <?php if ($this->_tpl_vars['post']->post_text): ?>
          <?php if ($this->_tpl_vars['scrub_reply_username']): ?>
            <div class="reply_text" id="reply_text-<?php echo $this->_foreach['foo']['iteration']; ?>
">
            <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/^@[a-zA-Z0-9_]+/", "") : smarty_modifier_regex_replace($_tmp, "/^@[a-zA-Z0-9_]+/", "")))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

            </div>
          <?php else: ?>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('filter_xss', true, $_tmp) : smarty_modifier_filter_xss($_tmp)))) ? $this->_run_mod_handler('link_usernames_to_twitter', true, $_tmp) : smarty_modifier_link_usernames_to_twitter($_tmp)); ?>

          <?php endif; ?>
        <?php else: ?>
          <span class="no-post-text">No post text</span>
        <?php endif; ?>
        <?php if (! $this->_tpl_vars['post'] && $this->_tpl_vars['post']->in_reply_to_post_id): ?>
          <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->in_reply_to_post_id; ?>
">&larr;</a>
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




      <div class="small gray">
      <?php if ($this->_tpl_vars['post']->is_protected): ?>
        <span class="sprite icon-locked"></span>
      <?php endif; ?>
      
       <span class="metaroll">
        <a href="<?php echo $this->_tpl_vars['site_root_path']; ?>
post/?t=<?php echo $this->_tpl_vars['post']->post_id; ?>
&n=<?php echo $this->_tpl_vars['post']->network; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->adj_pub_date)) ? $this->_run_mod_handler('relative_datetime', true, $_tmp) : smarty_modifier_relative_datetime($_tmp)); ?>
 ago</a>
        <!--<?php if ($this->_tpl_vars['post']->network == 'twitter'): ?>
         - <a href="http://twitter.com/?status=@<?php echo $this->_tpl_vars['post']->author_username; ?>
%20&in_reply_to_status_id=<?php echo $this->_tpl_vars['post']->post_id; ?>
&in_reply_to=<?php echo $this->_tpl_vars['post']->author_username; ?>
" target="_blank">Reply on Twitter</a><span class="ui-icon ui-icon-newwin"></span>
        <?php endif; ?>-->
        <?php if ($this->_tpl_vars['post']->is_geo_encoded < 2): ?>
        from 
        <?php if ($this->_tpl_vars['show_distance']): ?>
            <?php if ($this->_tpl_vars['unit'] == 'km'): ?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->reply_retweet_distance)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 kms away in
              <?php else: ?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->reply_retweet_distance)) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 miles away in 
            <?php endif; ?>
        <?php endif; ?>
        <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->location)) ? $this->_run_mod_handler('truncate', true, $_tmp, 60, ' ...') : smarty_modifier_truncate($_tmp, 60, ' ...')); ?>

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
      </div>
    </div>
  </div>
</div>