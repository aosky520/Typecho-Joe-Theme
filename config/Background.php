<?php if (isMobile()) : ?>
    <?php if ($this->options->JDocumentWAPBG) : ?>
        <script type="text/javascript">
            (() => {
                $('body').css('background-image', 'url(<?php $this->options->JDocumentWAPBG() ?>)');
            })()
        </script>
    <?php endif; ?>
<?php else : ?>
    <?php if ($this->options->JDocumentCanvasBG !== 'off') : ?>

        <?php if ($this->options->JCDN === 'on') : ?>
            <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/background/<?php $this->options->JDocumentCanvasBG() ?>"></script>
        <?php else : ?>
            <script src="<?php $this->options->themeUrl('assets/background/' . $this->options->JDocumentCanvasBG); ?>"></script>
        <?php endif; ?>

    <?php else : ?>
        <?php if ($this->options->JDocumentPCBG) : ?>
            <script type="text/javascript">
                (() => {
                    $('body').css('background-image', 'url(<?php $this->options->JDocumentPCBG() ?>)');
                })()
            </script>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>