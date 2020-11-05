<?php if ($this->options->JConsoleStatus === 'on') : ?>
    <script type="text/javascript">
        (() => {
            let ConsoleManager = {
                onOpen: function() {
                    window.location.href = "<?php $this->options->themeUrl(); ?>console.html"
                },
                onClose: function() {
                    window.location.href = "<?php $this->options->themeUrl(); ?>"
                },
                init: function() {
                    var e = this,
                        n = document.createElement("div"),
                        t = false,
                        o = false;
                    Object.defineProperty(n, "id", {
                        get: function() {
                            t || (e.onOpen(), t = !0), o = !0
                        }
                    }), setInterval(function() {
                        o = !1, console.info(n), console.clear(), !o && t && (e.onClose(), t = !1)
                    }, 100)
                }
            };
            ConsoleManager.init()
        })()
    </script>
<?php endif; ?>