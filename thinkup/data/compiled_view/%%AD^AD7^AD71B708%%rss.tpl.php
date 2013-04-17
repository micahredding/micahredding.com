<?php /* Smarty version 2.6.26, created on 2012-10-14 01:49:24
         compiled from rss.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'rss.tpl', 7, false),array('modifier', 'date_format', 'rss.tpl', 10, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>ThinkUp Crawler for <?php echo $this->_tpl_vars['logged_in_user']; ?>
</title>
    <link>http<?php if ($_SERVER['HTTPS']): ?>s<?php endif; ?>://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo smarty_modifier_replace($_SERVER['REQUEST_URI'], '&', '&amp;'); ?>
</link>
    <atom:link href="http<?php if ($_SERVER['HTTPS']): ?>s<?php endif; ?>://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo smarty_modifier_replace($_SERVER['REQUEST_URI'], '&', '&amp;'); ?>
" rel="self" type="application/rss+xml" /> 
    <description>Calls to this feed will launch the ThinkUp crawler, if it hasn't run in the last <?php echo $this->_tpl_vars['rss_crawler_refresh_rate']; ?>
 minutes</description> 
    <pubDate><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %H:%M:%S %Z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %H:%M:%S %Z")); ?>
</pubDate>
    <lastBuildDate><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %H:%M:%S %Z") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %H:%M:%S %Z")); ?>
</lastBuildDate>
    <generator>ThinkUp v<?php echo $this->_tpl_vars['thinkup_version']; ?>
</generator>
    <?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['foo']['iteration']++;
?>
      <item>
        <title><?php echo $this->_tpl_vars['item']['title']; ?>
</title>
        <link><?php echo $this->_tpl_vars['item']['link']; ?>
</link>
        <description><?php echo $this->_tpl_vars['item']['description']; ?>
</description>
        <pubDate><?php echo $this->_tpl_vars['item']['pubDate']; ?>
</pubDate>
        <guid><?php echo $this->_tpl_vars['item']['guid']; ?>
</guid>
      </item>
    <?php endforeach; endif; unset($_from); ?>
  </channel>
</rss>
