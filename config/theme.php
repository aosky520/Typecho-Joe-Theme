<?php if ($this->options->JGlobalThemeStatus === 'on') : ?>
    <?php if ($this->options->JCDN === 'on') : ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/color-pick/color-pick.min.css" />
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/color-pick/color-pick.min.js"></script>
    <?php else : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('library/color-pick/color-pick.min.css'); ?>" />
        <script src="<?php $this->options->themeUrl('library/color-pick/color-pick.min.js'); ?>"></script>
    <?php endif; ?>

    <script type="text/javascript">
        (() => {
            window.initTheme = () => {
                <?php if ($this->options->JGlobalThemeColor) : ?>
                    $('body').css('--theme', localStorage.getItem('--theme') || '<?php $this->options->JGlobalThemeColor() ?>');
                <?php else : ?>
                    $('body').css('--theme', localStorage.getItem('--theme') || '#4e7cf2');
                <?php endif; ?>

                $('#colorPick').colpick({
                    flat: true,
                    layout: 'hex',
                    submit: false,
                    color: localStorage.getItem('--theme') || <?php if ($this->options->JGlobalThemeColor) : ?> '<?php $this->options->JGlobalThemeColor() ?>'
                <?php else : ?> '#4e7cf2'
                <?php endif; ?>,
                colorScheme: 'dark',
                onChange(a, b, c) {
                    $('body').css('--theme', '#' + b);
                    localStorage.setItem('--theme', '#' + b);
                }
                });
                $('#openColorPick').on('click', function(e) {
                    e.stopPropagation();
                    $('#colorPick').toggleClass('active');
                });
                $('#colorPick').on('click', function(e) {
                    e.stopPropagation();
                });
                $(document).on('click', function(e) {
                    $('#colorPick').removeClass('active');
                });

            }
        })(window)
    </script>
<?php else : ?>
    <script type="text/javascript">
        (() => {
            <?php if ($this->options->JGlobalThemeColor) : ?>
                $('body').css('--theme', '<?php $this->options->JGlobalThemeColor() ?>');
            <?php else : ?>
                $("body").css("--theme", "#4e7cf2")
            <?php endif; ?>
        })()
    </script>
<?php endif; ?>