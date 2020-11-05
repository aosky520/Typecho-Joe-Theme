<?php if ($this->options->JBackTopStatus === 'on') : ?>
    <script type="text/javascript">
        (() => {
            window.initBackTop = () => {
                let isShowBackTop = () => {
                    if ($("#joe").scrollTop() > 500) {
                        $("#backToTop").addClass("active")
                    } else {
                        $("#backToTop").removeClass("active")
                    }
                }
                isShowBackTop()
                $("#joe").on("scroll", function() {
                    isShowBackTop()
                })
                $("#backToTop").on("click", function() {
                    $("#joe").scrollTop(0)
                })
            }
        })(window)
    </script>
<?php endif; ?>