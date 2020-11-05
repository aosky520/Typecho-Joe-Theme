<?php if ($this->options->JIndexSticky) : ?>

    <?php
    $sticky = $this->options->JIndexSticky;
    $stickyCounts = explode("||", $sticky);
    $stickyNum = count($stickyCounts);
    for ($i = 0; $i < $stickyNum; $i++) {
    ?>
        <?php $this->widget('Widget_Archive@sticky' . $i, 'pageSize=1&type=single', 'cid=' . $stickyCounts[$i])->to($item); ?>
        <article class="article-list">
            <?php if ($this->options->JThumbnailStatus === 'on') : ?>
                <a class="picture-box" href="<?php $item->permalink() ?>" title="<?php $item->title() ?>">
                    <img class="lazyload" src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/img/lazyload.jpg" data-original="<?php GetRandomThumbnail($item); ?>">
                    <span><?php $item->date('Y-m-d'); ?></span>
                    <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M903.93077753 107.30625876H115.78633587C64.57261118 107.30625876 22.58166006 149.81138495 22.58166006 201.02510964v624.26547214c0 51.7240923 41.99095114 93.71694641 93.71694641 93.7169464h788.14444164c51.7202834 0 93.71694641-41.99285557 93.71694642-93.7169464v-624.26547214c-0.51227057-51.21372469-43.01739676-93.71885088-94.229217-93.71885088zM115.78633587 171.8333054h788.65671224c16.385041 0 29.70407483 13.31522639 29.70407484 29.70407482v390.22828696l-173.60830179-189.48107072c-12.80486025-13.82749697-30.21634542-21.50774542-48.14010264-19.97093513-17.92375723 1.02073227-34.82106734 10.75387344-46.60138495 26.11437327l-172.58185762 239.1598896-87.06123767-85.52061846c-12.28878076-11.78222353-27.65308802-17.92375723-44.03812902-17.92375577-16.3907529 0.50846167-31.75506163 7.67644101-43.52966736 20.48129978L86.59453164 821.70468765V202.04965083c-1.02454117-17.41529409 12.80486025-30.73052046 29.19180423-30.21634543zM903.93077753 855.50692718H141.90642105l222.25496164-245.81940722 87.0593347 86.03669649c12.80105134 12.80676323 30.21253651 18.95020139 47.11555999 17.4172 17.40958218-1.53871621 33.79652618-11.26614404 45.06267018-26.11818071l172.58376063-238.64762047 216.11152349 236.08817198 2.05098681-1.54062067v142.87778132c0.50846167 16.3907529-13.31522639 29.70597929-30.21444096 29.70597928z m0 0" p-id="1916"></path>
                        <path d="M318.07226687 509.82713538c79.88945091 0 144.41649754-65.03741277 144.41649754-144.41649753 0-79.37718032-64.52704663-144.92495923-144.41649754-144.92495922-79.89135536 0-144.41649754 64.52704663-144.41649756 144.41268862 0 79.89135536 64.52514218 144.92876814 144.41649756 144.92876813z m0-225.3266807c44.55230407 0 80.91208763 36.36168802 80.91208762 80.91018317 0 44.55611297-35.84751297 81.43007159-80.91208762 81.43007012-45.06838356 0-80.91589654-36.35978356-80.91589508-80.91589507 0-44.55611297 36.87205415-81.42435823 80.91589508-81.42435822z m0 0" p-id="1917"></path>
                    </svg>
                </a>
            <?php endif; ?>
            <section class="entry-box">
                <section class="title" title="<?php $item->title() ?>">
                    <div class="badge">置顶</div>
                    <a href="<?php $item->permalink() ?>"><?php $item->title() ?></a>
                </section>
                <a class="summary" href="<?php $item->permalink() ?>"><?php $item->excerpt(500) ?></a>
                <section class="meta">
                    <?php if (!empty($this->options->JSummaryMeta) && in_array('author', $this->options->JSummaryMeta)) : ?>
                        <section class="item">
                            <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M634.342 589.022c105.11 41.118 185.376 133.808 207.609 249.08 2.965 15.374-7.095 30.241-22.469 33.206-15.374 2.965-30.24-7.094-33.205-22.468-25.155-130.425-139.813-226.122-274.22-226.122-134.407 0-249.067 95.7-274.22 226.125-2.965 15.374-17.831 25.434-33.205 22.47-15.374-2.966-25.434-17.832-22.469-33.206 22.23-115.275 102.498-207.967 207.61-249.085-76.52-42.89-128.237-124.79-128.237-218.77 0-138.402 112.16-250.602 250.522-250.602 138.36 0 250.52 112.2 250.52 250.602 0 93.98-51.716 175.88-128.236 218.77z m71.537-218.77c0-107.092-86.78-193.902-193.821-193.902-107.043 0-193.822 86.81-193.822 193.902 0 107.09 86.779 193.9 193.822 193.9 107.042 0 193.82-86.81 193.82-193.9z" p-id="3886"></path>
                            </svg>
                            <a href="<?php $item->author->permalink(); ?>"><?php $item->author(); ?></a>
                        </section>
                    <?php endif; ?>
                    <?php if (!empty($this->options->JSummaryMeta) && in_array('cate', $this->options->JSummaryMeta)) : ?>
                        <section class="item">
                            <?php $item->category(',', '%s', '未分类'); ?>
                        </section>
                    <?php endif; ?>
                    <?php if (!empty($this->options->JSummaryMeta) && in_array('time', $this->options->JSummaryMeta)) : ?>
                        <section class="item">
                            <?php $item->date('Y-m-d'); ?>
                        </section>
                    <?php endif; ?>
                    <?php if (!empty($this->options->JSummaryMeta) && in_array('read', $this->options->JSummaryMeta)) : ?>
                        <section class="item">
                            <?php GetPostViews($item) ?> 阅读
                        </section>
                    <?php endif; ?>
                    <?php if (!empty($this->options->JSummaryMeta) && in_array('comment', $this->options->JSummaryMeta)) : ?>
                        <section class="item">
                            <?php $item->commentsNum('%d'); ?> 评论
                        </section>
                    <?php endif; ?>
                </section>
            </section>
        </article>
    <?php } ?>

<?php endif; ?>