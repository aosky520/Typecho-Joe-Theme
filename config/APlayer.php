<?php if ($this->options->JPlayer) : ?>
    <meting-js id="<?php $this->options->JPlayer(); ?>" lrc-type="1" server="netease" storage-name="meting" theme="#ebebeb" autoplay type="playlist" fixed="true" list-olded="true"></meting-js>
    <?php if ($this->options->JCDN === 'on') : ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/aplayer@1.9.1/aplayer.min.css" />
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/aplayer@1.9.1/aplayer.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/meting@2.0.1/meting.min.js"></script>
    <?php else : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('library/aplayer@1.9.1/aplayer.min.css'); ?>" />
        <script src="<?php $this->options->themeUrl('library/aplayer@1.9.1/aplayer.min.js'); ?>"></script>
        <script src="<?php $this->options->themeUrl('library/meting@2.0.1/meting.min.js'); ?>"></script>
    <?php endif; ?>
<?php endif; ?>