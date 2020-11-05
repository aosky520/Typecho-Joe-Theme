<?php if ($this->options->JDocumentTitle) : ?>
    <script>
        (() => {
            window.initDocumentTitle = () => {
                const DOCUMENT_TITLE = document.title;
                $(document).on("visibilitychange", function() {
                    if (document.visibilityState === "hidden") {
                        document.title = "<?php $this->options->JDocumentTitle() ?>"
                    } else {
                        document.title = DOCUMENT_TITLE
                    }
                })
            }
        })(window)
    </script>
<?php endif; ?>