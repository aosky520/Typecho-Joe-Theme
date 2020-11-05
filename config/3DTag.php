<?php if ($this->options->J3DTagStatus === 'on') : ?>
    <?php if ($this->options->JCDN === 'on') : ?>
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/3DTag/3DTag.min.js"></script>
    <?php else : ?>
        <script src="<?php $this->options->themeUrl('library/3DTag/3DTag.min.js'); ?>"></script>
    <?php endif; ?>

    <script>
        (function() {
            window.initSvg3DTag = () => {
                let cloudList = []
                $("#cloudList li").each(function(i, item) {
                    cloudList.push({
                        label: $(item).attr("data-label"),
                        url: $(item).attr("data-url"),
                        target: "_blank",
                    })
                })
                $("#cloud").svg3DTagCloud({
                    entries: cloudList,
                    width: 220,
                    height: 230,
                    radius: "65%",
                    radiusMin: 75,
                    bgDraw: !0,
                    bgColor: "#000",
                    opacityOver: 1,
                    opacityOut: .05,
                    opacitySpeed: 6,
                    fov: 800,
                    speed: .5,
                    fontSize: 13,
                    fontColor: "#fff",
                    fontWeight: "500",
                    fontStyle: "normal",
                    fontStretch: "normal",
                    fontToUpperCase: !0
                })
            }
        })(window)
    </script>
<?php endif; ?>