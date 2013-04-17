<?php /* Smarty version 2.6.26, created on 2012-10-13 22:58:40
         compiled from _header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucwords', '_header.tpl', 92, false),array('modifier', 'strip_tags', '_header.tpl', 93, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Article">
<head>
  <meta charset="utf-8">
  <title><?php if ($this->_tpl_vars['controller_title']): ?><?php echo $this->_tpl_vars['controller_title']; ?>
 | <?php endif; ?><?php echo $this->_tpl_vars['app_title']; ?>
</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/img/favicon.png">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/css/base.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/css/style.css">
  <?php $_from = $this->_tpl_vars['header_css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
    <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo $this->_tpl_vars['css']; ?>
" />
  <?php endforeach; endif; unset($_from); ?>
  <!-- jquery -->
  <link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/css/jquery-ui-1.8.13.css">
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/jquery.min-1.4.js"></script>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
assets/js/jquery-ui.min-1.8.js"></script>

  <!-- google chart tools -->
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

  <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
plugins/twitter/assets/js/widgets.js"></script>
  <script type="text/javascript">var site_root_path = '<?php echo $this->_tpl_vars['site_root_path']; ?>
';</script>
  <?php if ($this->_tpl_vars['csrf_token']): ?><script type="text/javascript">var csrf_token = '<?php echo $this->_tpl_vars['csrf_token']; ?>
';</script><?php endif; ?>
  <?php $_from = $this->_tpl_vars['header_scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['script']):
?>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo $this->_tpl_vars['script']; ?>
"></script>
  <?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['enable_tabs']): ?>
<script type="text/javascript">
    <?php echo '
      // tabs functionality
      var current_query_key = \'updates\';
      $(function() {
        $("#tabs").tabs( { select: function(event, ui) { current_query_key =  ui.panel.id  } } );
      });
      
      // buttons functionality
      $(function() {
        //all hover and click logic for buttons
        $(".linkbutton:not(.ui-state-disabled)")
        .hover(
          function() {
            $(this).addClass("ui-state-hover"); 
          },
          function() {
            $(this).removeClass("ui-state-hover"); 
          }
        )
        .mousedown(function() {
            $(this).parents(\'.linkbuttonset-single:first\').find(".linkbutton.ui-state-active").removeClass("ui-state-active");
            if ($(this).is(\'.ui-state-active.linkbutton-toggleable, .linkbuttonset-multi .ui-state-active\')) {
              $(this).removeClass("ui-state-active");
            }
            else {
              $(this).addClass("ui-state-active");
            }
        })
        .mouseup(function() {
          if (! $(this).is(\'.linkbutton-toggleable, .linkbuttonset-single .linkbutton,  .linkbuttonset-multi .linkbutton\') ) {
            $(this).removeClass("ui-state-active");
          }
        });
      });
    '; ?>

</script>
<?php endif; ?>

  <!-- custom css -->
  <?php echo '
  <style>
  .line { background:url(\''; ?>
<?php echo $this->_tpl_vars['site_root_path']; ?>
<?php echo 'assets/img/border-line-470.gif\') no-repeat center bottom;
  margin: 8px auto;
  height: 1px;
  }

  </style>
  '; ?>

  
<?php echo '
  <script type="text/javascript">
  $(document).ready(function() {
      $(".post").hover(
        function() { $(this).children(".small").children(".metaroll").show(); },
        function() { $(this).children(".small").children(".metaroll").hide(); }
      );
      $(".metaroll").hide();
    });
  </script>
'; ?>


<?php if ($this->_tpl_vars['post']->post_text): ?> 
<meta itemprop="name" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->network)) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
 post by <?php echo $this->_tpl_vars['post']->author_username; ?>
 on ThinkUp">
<meta itemprop="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']->post_text)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
<meta itemprop="image" content="http://thinkupapp.com/assets/img/thinkup-logo_sq.png">
<?php endif; ?>
</head>
<body>