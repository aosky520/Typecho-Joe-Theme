<?php if ($this->options->JHoverMusicStatus === 'on') : ?>
    <audio id="j-hover-music" autoplay="autoplay"></audio>
    <script>
        (() => {
            window.initHoverMusic = () => {
                let random = (min, max) => {
                    return Math.floor(Math.random() * (max - min + 1)) + min
                }
                $(".j-hover-music").on("mouseover", function() {
                    $("#j-hover-music").attr("src", "<?php echo THEME_URL ?>/assets/audio/" + random(1, 8) + ".ogv")
                })
            }
        })(window)
    </script>
<?php endif; ?>