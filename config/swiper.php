<?php if ($this->options->JIndexCarousel) : ?>
    <?php if ($this->options->JCDN === 'on') : ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/swiper@5.4.5/swiper.min.css">
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/swiper@5.4.5/swiper.min.js"></script>
    <?php else : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('library/swiper@5.4.5/swiper.min.css'); ?>">
        <script src="<?php $this->options->themeUrl('library/swiper@5.4.5/swiper.min.js'); ?>"></script>
    <?php endif; ?>
    <script>
        (() => {
            window.initSwiper = () => {
                let direction = $("#recommend").length > 0 ? "vertical" : "horizontal"
                new Swiper('.swiper-container', {
                    direction: direction,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    mousewheel: true,
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            }
        })(window)
    </script>
<?php endif; ?>