<?php if ($this->options->JBarragerStatus === 'on') : ?>
    <script>
        (() => {
            window.initBarrager = () => {
                $.getScript("<?php $this->options->themeUrl('library/joe.barrager@0.0.1/joe.barrager.min.js'); ?>", function() {
                    if (localStorage.getItem('barragerStatus') === 'on') {
                        $('#barrager').attr('checked', true);
                        $('.j-barrager').css({
                            opacity: 1,
                            visibility: 'visible'
                        });
                    } else {
                        $('#barrager').attr('checked', false);
                        $('.j-barrager').css({
                            opacity: 0,
                            visibility: 'hidden'
                        });
                    }
                    $('#barrager').on('change', function() {
                        localStorage.setItem('barragerStatus', $(this).prop('checked') ? 'on' : 'off');
                        if ($('#barrager').prop('checked')) {
                            $('.j-barrager').css({
                                opacity: 1,
                                visibility: 'visible'
                            });
                        } else {
                            $('.j-barrager').css({
                                opacity: 0,
                                visibility: 'hidden'
                            });
                        }
                    });
                })
            }
        })(window)
    </script>
<?php endif; ?>