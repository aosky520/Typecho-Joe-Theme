<?php if ($this->options->JPageStatus === 'ajax') : ?>
    <script>
        (() => {
            window.initLoadMore = () => {
                $(".j-loadmore a").attr("data-href", $(".j-loadmore a").attr("href"))
                $(".j-loadmore a").removeAttr("href")
                $(".j-loadmore a").on("click", function() {
                    $(this).html("loading...")
                    let url = $(this).attr('data-href');
                    if (url) {
                        $.ajax({
                            url: url,
                            type: 'get',
                            success: (data) => {
                                $(this).html("查看更多")
                                let list = $(data).find(".article-list")
                                $(".j-index-article.article").append(list)
                                if ($(".j-header").hasClass("fixed")) {
                                    $("#joe").scrollTop(($("#joe").scrollTop() + $(list).first().offset().top) - ($(".j-header").height() + 20))
                                } else {
                                    $("#joe").scrollTop(($("#joe").scrollTop() + $(list).first().offset().top) - 20)
                                }
                                let newURL = $(data).find('.j-loadmore a').attr('href');
                                if (newURL) {
                                    $(this).attr('data-href', newURL);
                                } else {
                                    $(".j-loadmore").remove()
                                }
                                new LazyLoad('.lazyload');
                            }
                        });
                    }
                })
            }
        })(window)
    </script>
<?php endif ?>