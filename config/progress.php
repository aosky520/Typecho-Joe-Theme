<?php if ($this->options->JProgressStatus === 'on') : ?>
    <script type="text/javascript">
        (() => {
            window.initProgress = () => {
                let calcProgress = () => {
                    let scrollTop = $("#joe").scrollTop();
                    let scrollHeight = $("#joe")[0].scrollHeight;
                    let height = $("#joe").height();
                    let progress = parseInt(scrollTop / (scrollHeight - height) * 100)
                    if (progress < 0) progress = 0
                    if (progress > 100) progress = 100
                    $("#progress").css("width", progress + "%")
                }
                calcProgress()
                $("#joe").on("scroll", () => calcProgress())
            }
        })(window)
    </script>
<?php endif; ?>