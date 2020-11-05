<?php if ($this->options->JCodeColor !== 'off') : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.1/build/styles/<?php $this->options->JCodeColor() ?>.min.css">
    <script>
        (() => {
            window.initHighLight = () => {
                $.getScript("//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.1/build/highlight.min.js", function() {
                    hljs.initHighlighting();
                })
            }

        })(window)
    </script>
<?php endif; ?>