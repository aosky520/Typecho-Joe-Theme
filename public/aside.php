<div class="j-aside">

    <?php if ($this->options->JAuthorStatus !== 'off') : ?>
        <div class="aside aside-user">
            <div class="user">
                <img src="<?php ParseAvatar($this->author->mail); ?>" />
                <?php if ($this->options->JAuthorLink) : ?>
                    <a no-pjax href="<?php $this->options->JAuthorLink(); ?>"><?php $this->author->screenName(); ?></a>
                <?php else : ?>
                    <a no-pjax href="<?php $this->options->siteUrl(); ?>"><?php $this->author->screenName(); ?></a>
                <?php endif; ?>
                <!-- 座右铭 -->
                <?php if ($this->options->JMotto) : ?>
                    <p><?php GetRandomMotto(); ?></p>
                <?php else : ?>
                    <p>人生之路，难免坎坷，但我执着</p>
                <?php endif; ?>
            </div>
            <?php Typecho_Widget::widget('Widget_Stat')->to($quantity); ?>
            <div class="webinfo">
                <div class="item" title="累计文章数">
                    <span class="num"><?php $quantity->publishedPostsNum(); ?></span>
                    <span>文章数</span>
                </div>
                <div class="item" title="累计评论数">
                    <span class="num"><?php $quantity->publishedCommentsNum(); ?></span>
                    <span>评论量</span>
                </div>
            </div>
            <?php $this->widget('Widget_Contents_Post_Recent@aside565', 'pageSize=' . $this->options->JAuthorStatus)->to($hot); ?>
            <?php if ($hot->have()) : ?>
                <ul class="articles">
                    <?php while ($hot->next()) : ?>
                        <li title="<?php $hot->title(); ?>">
                            <a href="<?php $hot->permalink(); ?>"><?php $hot->title(); ?></a>
                            <svg t="1599802830077" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M448.12 320.331a30.118 30.118 0 0 1-42.616-42.586L552.568 130.68a213.685 213.685 0 0 1 302.2 0l38.552 38.551a213.685 213.685 0 0 1 0 302.2L746.255 618.497a30.118 30.118 0 0 1-42.586-42.616l147.034-147.035a153.45 153.45 0 0 0 0-217.028l-38.55-38.55a153.45 153.45 0 0 0-216.998 0L448.12 320.33zM575.88 703.67a30.118 30.118 0 0 1 42.616 42.586L471.432 893.32a213.685 213.685 0 0 1-302.2 0l-38.552-38.551a213.685 213.685 0 0 1 0-302.2l147.065-147.065a30.118 30.118 0 0 1 42.586 42.616L173.297 595.125a153.45 153.45 0 0 0 0 217.027l38.55 38.551a153.45 153.45 0 0 0 216.998 0L575.88 703.64z m-234.256-63.88L639.79 341.624a30.118 30.118 0 0 1 42.587 42.587L384.21 682.376a30.118 30.118 0 0 1-42.587-42.587z" p-id="7351"></path>
                            </svg>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- 广告1 -->
    <?php if ($this->options->JADContent1) : ?>
        <?php
        $adContent1 = $this->options->JADContent1;
        $adContent1Counts = explode("||", $adContent1);
        ?>
        <a class="aside aside-ad" no-pjax rel="external nofollow" href="<?php echo $adContent1Counts[1] ?>">
            <img src="<?php echo $adContent1Counts[0] ?>">
        </a>
    <?php endif; ?>

    <!-- 自定义 -->
    <?php if ($this->options->JAsideCustom) : ?>
        <div class="aside aside-custom">
            <?php $this->options->JAsideCustom(); ?>
        </div>
    <?php endif; ?>

    <!-- 人生倒计时 -->
    <?php if ($this->options->JCountDownStatus === "on") : ?>
        <div class="aside aside-count">
            <h3>人生倒计时</h3>
            <div class="content">
                <div class="item" id="dayProgress">
                    <div class="title">今日已经过去<span></span>小时</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-1"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
                <div class="item" id="weekProgress">
                    <div class="title">这周已经过去<span></span>天</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-2"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
                <div class="item" id="monthProgress">
                    <div class="title">本月已经过去<span></span>天</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-3"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
                <div class="item" id="yearProgress">
                    <div class="title">今年已经过去<span></span>个月</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-4"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 天气 -->
    <?php if ($this->options->JWetherKey) : ?>
        <div class="aside aside-wether">
            <h3>今日天气</h3>
            <div class="content" title="今日天气">
                <div class="loading">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 30" xml:space="preserve">
                        <rect x="0" y="13" width="4" height="5" fill="#333">
                            <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                            <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0s" dur="0.6s" repeatCount="indefinite"></animate>
                        </rect>
                        <rect x="10" y="13" width="4" height="5" fill="#333">
                            <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                            <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate>
                        </rect>
                        <rect x="20" y="13" width="4" height="5" fill="#333">
                            <animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                            <animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate>
                        </rect>
                    </svg>
                </div>
                <div id="weather-v2-plugin-standard"></div>
            </div>
        </div>
    <?php endif; ?>

    <!-- 热门文章 -->
    <?php if ($this->options->JAsideHotNumber !== 'off') : ?>
        <div class="aside aside-hot">
            <h3>热门文章</h3>
            <?php $this->widget('Widget_Post_hot@asidehot@hot', 'pageSize=' . $this->options->JAsideHotNumber)->to($hot); ?>
            <?php if ($hot->have()) : ?>
                <ul>
                    <?php $i = 1; ?>
                    <?php while ($hot->next()) : ?>
                        <li>
                            <a href="<?php $hot->permalink(); ?>" title="<?php $hot->title(); ?>">
                                <img class="lazyload" src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/img/lazyload.jpg" data-original="<?php GetRandomThumbnail($hot); ?>">
                                <div class="info">
                                    <p><?php $hot->title(); ?></p>
                                    <span><?php GetPostViews($hot); ?> 阅读 - <?php $hot->date('m/d'); ?></span>
                                </div>
                                <div class="tip"><?php echo $i; ?></div>
                            </a>
                        </li>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p class="empty">暂无内容</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- 微博热搜 -->
    <?php if ($this->options->JRanking !== 'off') : ?>
        <?php
        $ranking = $this->options->JRanking;
        $rankingStr = explode("$", $ranking);
        ?>
        <div class="aside aside-ranking">
            <h3><?php echo $rankingStr[0] ?></h3>
            <ul class="list">
                <?php
                $arrContextOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ]
                ];
                $result = file_get_contents("https://the.top/v1/" . $rankingStr[1] . "/1/20", false, stream_context_create($arrContextOptions));
                $res = json_decode($result, true);
                if ($res['code'] === 0) {
                    for ($i = 0; $i < count($res['data']); $i++) {
                        if ($i < 9) {
                            echo
                                "<li title=" . $res['data'][$i]['title'] . ">
                                    <span>" . ($i + 1) . "</span>
                                    <a no-pjax target='_blank' href=" . $res['data'][$i]['url'] . ">" . $res['data'][$i]['title'] . "</a>
                                </li>";
                        }
                    }
                } else {
                    echo "<li>获取失败！</li>";
                }
                ?>
            </ul>
        </div>
    <?php endif; ?>


    <!-- 最新回复 -->
    <?php if ($this->options->JAsideReplyStatus !== 'off') : ?>
        <div class="aside aside-reply">
            <h3>最新回复</h3>
            <?php $this->widget('Widget_Comments_Recent@ok88', 'ignoreAuthor=true&pageSize=5')->to($comments); ?>
            <?php if ($comments->have()) : ?>
                <ol class="list" id="asideReply">
                    <?php while ($comments->next()) : ?>
                        <li>
                            <div class="user">
                                <img src="<?php ParseAvatar($comments->mail); ?>">
                                <div class="info">
                                    <div class="name"><?php $comments->author(false); ?></div>
                                    <span><?php $comments->date('Y-m-d'); ?></span>
                                </div>
                            </div>
                            <div class="reply">
                                <a title="<?php $comments->excerpt(); ?>" href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(); ?></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ol>
            <?php else : ?>
                <p class="empty">暂无回复</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- 广告2 -->
    <?php if ($this->options->JADContent2) : ?>
        <?php
        $adContent2 = $this->options->JADContent2;
        $adContent2Counts = explode("||", $adContent2);
        ?>
        <a class="aside aside-ad" no-pjax rel="external nofollow" href="<?php echo $adContent2Counts[1] ?>" title="广告">
            <img src="<?php echo $adContent2Counts[0] ?>">
            <div class="j-ad">广告</div>
        </a>
    <?php endif; ?>

    <!-- 云标签 -->
    <?php if ($this->options->J3DTagStatus === 'on') : ?>
        <div class="aside aside-cloud">
            <h3>标签云</h3>
            <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 50))->to($tags); ?>
            <?php if ($tags->have()) : ?>
                <div class="cloud" id="cloud"></div>
                <ul id="cloudList">
                    <?php while ($tags->next()) : ?>
                        <li data-url="<?php $tags->permalink(); ?>" data-label="<?php $tags->name(); ?>"></li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p class="empty">暂无标签</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>



</div>