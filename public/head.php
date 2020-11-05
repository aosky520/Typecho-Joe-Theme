<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="author" content="Joe, QQ群：966245514" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no, viewport-fit=cover">

<!-- Typecho自有函数 -->
<?php if ($this->fields->keywords || $this->fields->desc) : ?>
    <?php $this->header('keywords=' . $this->fields->keywords . '&description=' . $this->fields->desc); ?>
<?php else : ?>
    <?php $this->header(); ?>
<?php endif; ?>

<!-- 网站标题 -->
<title>
    <?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?>
    <?php $this->archiveTitle(
        array(
            'category' => '分类 %s 下的文章',
            'search' => '包含关键字 %s 的文章', 'tag' =>  '标签 %s 下的文章', 'author' => '%s 发布的文章'
        ),
        '',
        ' - '
    ); ?>
    <?php $this->options->title(); ?>
</title>

<!-- favicon图标 -->
<?php if ($this->options->JFavicon) : ?>
    <link rel="shortcut icon" href="<?php $this->options->JFavicon() ?>" />
<?php else : ?>
    <?php if ($this->options->JCDN === 'on') : ?>
        <link rel="shortcut icon" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/img/favicon.ico" />
    <?php else : ?>
        <link rel="shortcut icon" href="<?php $this->options->themeUrl('assets/img/favicon.ico'); ?>" />
    <?php endif; ?>
<?php endif; ?>

<?php if ($this->options->JCDN === 'on') : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/bootstrap.gird@4.5.3/bootstrap.gird.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/css/joe.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/joe.toast@3.0.0/joe.toast.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/fancybox@3.5.7/fancybox.min.css" />
<?php else : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('library/bootstrap.gird@4.5.3/bootstrap.gird.min.css'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.min.css'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('library/joe.toast@3.0.0/joe.toast.min.css'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('library/fancybox@3.5.7/fancybox.min.css'); ?>" />
<?php endif; ?>

<style>
    :root {
        --element: #409eff;
        <?php
        /* 一级色彩 */
        if ($this->options->JClassA) {
            echo "--classA: " . $this->options->JClassA . ";";
        } else {
            echo "--classA: #dcdfe6;";
        };
        /* 二级色彩 */
        if ($this->options->JClassB) {
            echo "--classB: " . $this->options->JClassB . ";";
        } else {
            echo "--classB: #e4e7ed;";
        };
        /* 三级色彩 */
        if ($this->options->JClassC) {
            echo "--classC: " . $this->options->JClassC . ";";
        } else {
            echo "--classC: #ebeef5;";
        };
        /* 四级色彩 */
        if ($this->options->JClassD) {
            echo "--classD: " . $this->options->JClassD . ";";
        } else {
            echo "--classD: #f2f6fc;";
        };
        /* 主要文字 */
        if ($this->options->JMainColor) {
            echo "--main: " . $this->options->JMainColor . ";";
        } else {
            echo "--main: #303133;";
        };
        /* 常规文字 */
        if ($this->options->JRoutineColor) {
            echo "--routine: " . $this->options->JRoutineColor . ";";
        } else {
            echo "--routine: #606266;";
        };
        /* 次要文字 */
        if ($this->options->JMinorColor) {
            echo "--minor: " . $this->options->JMinorColor . ";";
        } else {
            echo "--minor: #909399;";
        };
        /* 占位文字 */
        if ($this->options->JSeatColor) {
            echo "--seat: " . $this->options->JSeatColor . ";";
        } else {
            echo "--seat: #c0c4cc;";
        };
        /* 成功色 */
        if ($this->options->JSuccessColor) {
            echo "--success: " . $this->options->JSuccessColor . ";";
        } else {
            echo "--success: #67c23a;";
        };
        /* 警告色 */
        if ($this->options->JWarningColor) {
            echo "--warning: " . $this->options->JWarningColor . ";";
        } else {
            echo "--warning: #e6a23c;";
        };
        /* 危险色 */
        if ($this->options->JDangerColor) {
            echo "--danger: " . $this->options->JDangerColor . ";";
        } else {
            echo "--danger: #f56c6c;";
        };
        /* 信息色 */
        if ($this->options->JInfoColor) {
            echo "--info: " . $this->options->JInfoColor . ";";
        } else {
            echo "--info: #909399;";
        };
        echo "--radius-pc: " . $this->options->JRadiusPC . ";";
        echo "--radius-wap: " . $this->options->JRadiusWap . ";";
        /* 标题阴影 */
        if ($this->options->JTextShadow) {
            echo "--text-shadow: " . $this->options->JTextShadow . ";";
        } else {
            echo "--text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);";
        };
        /* 盒子阴影 */
        if ($this->options->JBoxShadow) {
            echo "--box-shadow: " . $this->options->JBoxShadow . ";";
        } else {
            echo "--box-shadow: 0px 0px 20px -5px rgba(158, 158, 158, 0.22);";
        };
        ?>
    }
</style>

<!-- 后台自定义CSS -->
<?php if ($this->options->JCustomCSS) : ?>
    <style type="text/css">
        <?php $this->options->JCustomCSS() ?>
    </style>
<?php endif; ?>