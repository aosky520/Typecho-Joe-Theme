<?php if ($this->options->JContextMenuStatus === 'off') : ?>
    <script type="text/javascript">
        (() => {
            window.initContextmenu = () => {
                $(document).on("contextmenu", () => false)
            }
        })(window)
    </script>
<?php endif; ?>