<?php if ($this->options->JLive2D !== 'off') : ?>
    <script src="//eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script type="text/javascript">
        (() => {
            L2Dwidget.init({
                "model": {
                    "jsonPath": "<?php $this->options->JLive2D() ?>",
                    "scale": 1
                },
                "display": {
                    "position": "right",
                    "width": 80,
                    "height": 100,
                    "hOffset": 70,
                    "vOffset": 0
                }
            })
        })()
    </script>
<?php endif; ?>