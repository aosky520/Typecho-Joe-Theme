<?php if ($this->options->JIndexAD) : ?>
    <?php
    $ad = $this->options->JIndexAD;
    $adCounts = explode("||", $ad);
    ?>
    <div class="index-ad">
        <a no-pjax href="<?php echo $adCounts[1] ?>" title="广告">
            <img class="lazyload" src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo JoeVersion() ?>/assets/img/lazyload.jpg" data-original="<?php echo $adCounts[0] ?>" />
            <span class="j-ad">广告</span>
        </a>
    </div>
<?php endif; ?>