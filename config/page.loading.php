<?php if ($this->options->JPageLoading !== "off") : ?>
    <div class="fakeLoader"></div>
    <?php if ($this->options->JCDN === 'on') : ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/fakeLoader@1.1.0/fakeLoader.min.css" />
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/fakeLoader@1.1.0/fakeLoader.min.js"></script>
    <?php else : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('library/fakeLoader@1.1.0/fakeLoader.min.css'); ?>" />
        <script src="<?php $this->options->themeUrl('library/fakeLoader@1.1.0/fakeLoader.min.js'); ?>"></script>
    <?php endif; ?>


    <script>
        (() => {
            $(".fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71"
                <?php if ($this->options->JPageLoading === "type1") : ?>,
                    spinner: "spinner1"
                <?php elseif ($this->options->JPageLoading === "type2") : ?>,
                    spinner: "spinner2"
                <?php elseif ($this->options->JPageLoading === "type3") : ?>,
                    spinner: "spinner3"
                <?php elseif ($this->options->JPageLoading === "type4") : ?>,
                    spinner: "spinner4"
                <?php elseif ($this->options->JPageLoading === "type5") : ?>,
                    spinner: "spinner5"
                <?php elseif ($this->options->JPageLoading === "type6") : ?>,
                    spinner: "spinner6"
                <?php elseif ($this->options->JPageLoading === "type7") : ?>,
                    spinner: "spinner7"
                <?php endif; ?>,
            });
        })()
    </script>
<?php endif; ?>