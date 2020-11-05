<?php if ($this->options->JCDN === 'on') : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/jquery@3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/jquery.pjax@2.0.1/jquery.pjax.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/joe.lazyload@3.0.0/joe.lazyload.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/joe.toast@3.0.0/joe.toast.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/fancybox@3.5.7/fancybox.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/jquery.qrcode@1.0.0/jquery.qrcode.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/sketchpad/sketchpad.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/js/joe.js"></script>
<?php else : ?>
    <script src="<?php $this->options->themeUrl('library/jquery@3.5.1/jquery.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('library/jquery.pjax@2.0.1/jquery.pjax.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('library/joe.lazyload@3.0.0/joe.lazyload.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('library/joe.toast@3.0.0/joe.toast.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('library/fancybox@3.5.7/fancybox.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('library/jquery.qrcode@1.0.0/jquery.qrcode.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('library/sketchpad/sketchpad.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('assets/js/joe.js'); ?>"></script>
<?php endif; ?>




<?php $this->need('config/census.php'); ?>
<?php $this->need('config/barrager.php'); ?>
<?php $this->need('config/progress.php'); ?>
<?php $this->need('config/hover.music.php'); ?>
<?php $this->need('config/contextmenu.php'); ?>
<?php $this->need('config/document.title.php'); ?>
<?php $this->need('config/aplayer.php'); ?>
<?php $this->need('config/background.php'); ?>
<?php $this->need('config/cursor.effect.php'); ?>
<?php $this->need('config/live2d.php'); ?>
<?php $this->need('config/icon.loading.php'); ?>
<?php $this->need('config/page.loading.php'); ?>
<?php $this->need('config/console.php'); ?>
<?php $this->need('config/backtop.php'); ?>
<?php $this->need('config/theme.php'); ?>
<?php $this->need('config/weather.php'); ?>
<?php $this->need('config/3DTag.php'); ?>
<?php $this->need('config/swiper.php'); ?>
<?php $this->need('config/post.config.php'); ?>
<?php $this->need('config/loadmore.php'); ?>


<script>
    (function() {


        /* 初始化目录树 */
        <?php if ($this->options->JDirectoryStatus === 'on') : ?>
            <?php if ($this->options->JCDN === 'on') : ?>
                $.getScript("//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/js/jfloor.js");
            <?php else : ?>
                $.getScript("<?php $this->options->themeUrl('assets/js/jfloor.js'); ?>");
            <?php endif; ?>
        <?php endif; ?>

        /* 初始化统计 */
        <?php if ($this->options->JCensusStatus === 'on') : ?>
            initCensus();
        <?php endif; ?>

        /* 初始化弹幕 */
        <?php if ($this->options->JBarragerStatus === 'on') : ?>
            initBarrager();
        <?php endif; ?>

        /* 初始化进度条 */
        <?php if ($this->options->JProgressStatus === 'on') : ?>
            initProgress();
        <?php endif; ?>

        /* 初始化音效 */
        <?php if ($this->options->JHoverMusicStatus === 'on') : ?>
            initHoverMusic();
        <?php endif; ?>

        /* 初始化鼠标右键 */
        <?php if ($this->options->JContextMenuStatus === 'off') : ?>
            initContextmenu()
        <?php endif; ?>

        /* 初始化网站标题 */
        <?php if ($this->options->JDocumentTitle) : ?>
            initDocumentTitle();
        <?php endif; ?>

        /* 初始化返回顶部 */
        <?php if ($this->options->JBackTopStatus === 'on') : ?>
            initBackTop()
        <?php endif; ?>

        /* 初始化主题色 */
        <?php if ($this->options->JGlobalThemeStatus === 'on') : ?>
            initTheme()
        <?php endif; ?>

        /* 初始化标签云 */
        <?php if ($this->options->J3DTagStatus === 'on') : ?>
            initSvg3DTag();
        <?php endif; ?>

        /* 初始化天气 */
        <?php if ($this->options->JWetherKey) : ?>
            initWeather();
        <?php endif; ?>

        /* 初始化轮播图 */
        <?php if ($this->options->JIndexCarousel) : ?>
            initSwiper()
        <?php endif; ?>

        /* 初始化代码高亮 */
        <?php if ($this->options->JCodeColor !== 'off') : ?>
            initHighLight()
        <?php endif; ?>

        /* 初始化分页 */
        <?php if ($this->options->JPageStatus === 'ajax') : ?>
            initLoadMore()
        <?php endif; ?>
        /* ****************************************************************************************************************** */

        /* 初始化全局Pjax */
        $(document).pjax('a:not(a[target="_blank"], a[no-pjax])', {
            container: '#joe',
            fragment: '#joe',
            timeout: 5000,
            replace: true
        })

        /* pjax请求时 */
        $(document).on("pjax:send", () => {
            /* 加载动画 */
            <?php if ($this->options->JIconLoading !== "off") : ?>
                initIconLoading.start()
            <?php endif; ?>
        })

        /* pjax请求结束 */
        $(document).on('pjax:complete', () => {

            /* 结束动画 */
            <?php if ($this->options->JIconLoading !== "off") : ?>
                initIconLoading.end()
            <?php endif; ?>



            /* 初始化目录树 */
            <?php if ($this->options->JDirectoryStatus === 'on') : ?>
                <?php if ($this->options->JCDN === 'on') : ?>
                    $.getScript("//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/js/jfloor.js");
                <?php else : ?>
                    $.getScript("<?php $this->options->themeUrl('assets/js/jfloor.js'); ?>");
                <?php endif; ?>
            <?php endif; ?>

            /* 初始化统计 */
            <?php if ($this->options->JCensusStatus === 'on') : ?>
                initCensus();
            <?php endif; ?>

            /* 初始化弹幕 */
            <?php if ($this->options->JBarragerStatus === 'on') : ?>
                initBarrager();
            <?php endif; ?>

            /* 初始化进度条 */
            <?php if ($this->options->JProgressStatus === 'on') : ?>
                initProgress();
            <?php endif; ?>

            /* 初始化音效 */
            <?php if ($this->options->JHoverMusicStatus === 'on') : ?>
                initHoverMusic();
            <?php endif; ?>

            /* 初始化鼠标右键 */
            <?php if ($this->options->JContextMenuStatus === 'off') : ?>
                initContextmenu()
            <?php endif; ?>

            /* 初始化网站标题 */
            <?php if ($this->options->JDocumentTitle) : ?>
                initDocumentTitle();
            <?php endif; ?>

            /* 初始化返回顶部 */
            <?php if ($this->options->JBackTopStatus === 'on') : ?>
                initBackTop()
            <?php endif; ?>

            /* 初始化主题色 */
            <?php if ($this->options->JGlobalThemeStatus === 'on') : ?>
                initTheme()
            <?php endif; ?>

            /* 初始化标签云 */
            <?php if ($this->options->J3DTagStatus === 'on') : ?>
                initSvg3DTag();
            <?php endif; ?>

            /* 初始化天气 */
            <?php if ($this->options->JWetherKey) : ?>
                initWeather();
            <?php endif; ?>

            /* 初始化轮播图 */
            <?php if ($this->options->JIndexCarousel) : ?>
                initSwiper()
            <?php endif; ?>

            /* 初始化代码高亮 */
            <?php if ($this->options->JCodeColor !== 'off') : ?>
                initHighLight()
            <?php endif; ?>

            /* 初始化分页 */
            <?php if ($this->options->JPageStatus === 'ajax') : ?>
                initLoadMore()
            <?php endif; ?>

            /* 初始化joe */
            <?php if ($this->options->JCDN === 'on') : ?>
                $.getScript("//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/js/joe.js");
            <?php else : ?>
                $.getScript("<?php $this->options->themeUrl('assets/js/joe.js'); ?>");
            <?php endif; ?>
        })



        /* 登录注册验证 */
        <?php
        $p = Typecho_Cookie::getPrefix();
        $q = $p . '__typecho_notice';
        $y = $p . '__typecho_notice_type';
        if (isset($_COOKIE[$y]) && ($_COOKIE[$y] == 'success' || $_COOKIE[$y] == 'notice' || $_COOKIE[$y] == 'error')) {
            if (isset($_COOKIE[$q])) {
        ?>
                $.toast({
                    type: "warning",
                    message: '<?php echo preg_replace('#\[\"(.*?)\"\]#', '$1', $_COOKIE[$q]); ?>！'
                })
        <?php
                Typecho_Cookie::delete('__typecho_notice');
                Typecho_Cookie::delete('__typecho_notice_type');
            }
        } ?>

        /* 自定义js */
        <?php $this->options->JCustomScript() ?>

    })()
</script>