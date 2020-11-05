<?php if ($this->options->JCensusStatus === 'on') : ?>
    <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>

    <?php if ($this->options->JCDN === 'on') : ?>
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/library/highcharts@8.2.0/highcharts.min.js"></script>
    <?php else : ?>
        <script src="<?php $this->options->themeUrl('library/highcharts@8.2.0/highcharts.min.js'); ?>"></script>
    <?php endif; ?>
    
    <script>
        (() => {
            window.initCensus = () => {
                Highcharts.chart('census', {
                    title: {
                        text: null
                    },
                    subtitle: {
                        text: null
                    },
                    xAxis: {
                        text: null,
                        categories: ['页面', '文章', '评论', '分类', ]
                    },
                    yAxis: {
                        title: {
                            text: null
                        },
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                        name: '数量',
                        type: 'column',
                        colorByPoint: true,
                        data: [<?php $stat->publishedPagesNum() ?>, <?php $stat->publishedPostsNum() ?>, <?php $stat->publishedCommentsNum() ?>, <?php $stat->categoriesNum() ?>, ],
                        showInLegend: false
                    }]
                });
            }
        })(window)
    </script>
<?php endif; ?>