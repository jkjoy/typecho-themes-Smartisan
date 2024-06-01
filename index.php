<?php
/**
 * Smartisan  for Typecho
 *
 * @package Smartisan  Theme
 * @author Smartisan 
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE HTML>
<html>
<head>
<?php $this->need('head.php'); ?>
</head>
  <div class="main">
    <div class="main-content">
    <?php $this->need('header.php'); ?>
    <div class="content container clearfix">
    <?php $this->need('post-list.php'); ?>
    <?php $this->need('sidebar.php'); ?>
    </div>
    <?php $this->need('footer.php'); ?>
  </div>
  </div>
</body>
</html>