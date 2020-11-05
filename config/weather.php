<?php if ($this->options->JWetherKey) : ?>
    <script>
        (() => {
            window.initWeather = () => {
                $.getScript("//apip.weatherdt.com/standard/static/js/weather-standard-common.js", function() {
                    WIDGET = {
                        CONFIG: {
                            layout: 2,
                            width: '220',
                            height: '270'
                            <?php if ($this->options->JWetherType === "auto") : ?>,
                                background: 1,
                                dataColor: 'ffffff'
                            <?php else : ?>,
                                background: 2,
                                dataColor: '303133'
                            <?php endif; ?>,
                            key: '<?php $this->options->JWetherKey(); ?>'
                        }
                    }
                    let timer = setTimeout(() => {
                        $(".aside-wether .loading").addClass("active")
                    }, 1000)
                })
            }
        })(window)
    </script>
<?php endif; ?>