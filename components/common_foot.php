<!-- 启用/禁用 音乐播放器 -->
<?php if (!empty($this->options->JWindowBlock) && in_array('ShowAPlayer', $this->options->JWindowBlock)) : ?>
    <meting-js id="<?php $this->options->JMeting(); ?>" lrc-type="1" server="netease" theme="#ebebeb" autoplay type="playlist" fixed="true" list-olded="true"></meting-js>
<?php endif; ?>


<!-- 最底部版权信息 -->
<div class="j-footer">
    <div class="j-container">
        <div class="left">

            <!-- 最底部版权信息 -->
            <?php if ($this->options->JBanQuan) : ?>
                <span class="info"><?php $this->options->JBanQuan() ?></span>
            <?php else : ?>
                <span class="info">2015 - 2020 © Reach - Joe</span>
            <?php endif; ?>


            <!-- 启用/禁用网页计时 -->
            <?php if (!empty($this->options->JWindowBlock) && in_array('ShowCountTime', $this->options->JWindowBlock)) : ?>
                <svg t="1599036944272" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2749">
                    <path d="M872 64c13.2544 0 24 10.7456 24 24 0 13.2544-10.7456 24-24 24h-104v177.456c0 67.0672-36.4912 128.8224-95.2368 161.1744l-111.0816 61.1744 111.328 61.536C731.6176 605.7328 768 667.4112 768 734.376V912h104c13.2544 0 24 10.7456 24 24 0 13.2544-10.7456 24-24 24H152c-13.2544 0-24-10.7456-24-24 0-13.2544 10.7456-24 24-24h104V734.544c0-67.0672 36.4912-128.8224 95.2368-161.1744l111.08-61.176-111.328-61.5328C292.3824 418.2656 256 356.5872 256 289.6224V112H152c-13.2544 0-24-10.7456-24-24 0-13.2544 10.7456-24 24-24h720zM512.4 539.4112l-138.0064 76.0032A136 136 0 0 0 304 734.544V912h416V734.3776a136 136 0 0 0-70.2096-119.0272l-137.3904-75.9392zM720 112H304v177.6224a136 136 0 0 0 70.2096 119.0272l137.3904 75.9392 138.0064-76.0032A136 136 0 0 0 720 289.456V112z" fill="#979797" p-id="2750"></path>
                </svg>
                <span class="time"><?php echo timer_stop(); ?></span>
            <?php endif; ?>
        </div>


        <div class="right">
            <!-- 最底部右侧链接 -->
            <?php if ($this->options->JBanQuanLinks) : ?>
                <?php $this->options->JBanQuanLinks() ?>
            <?php else : ?>
                <a href="">关于</a>
                <a href="">归档</a>
                <a href="<?php $this->options->feedUrl(); ?>">RSS</a>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- 侧边悬浮按钮 -->
<div class="j-actions">

    <!-- 返回顶部按钮 -->
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowBackTop', $this->options->JWindowBlock)) : ?>
        <div class="item back" id="backtop">
            <svg t="1599799330396" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="10601">
                <path d="M725.902222 498.915556c18.204444-251.448889-93.297778-410.737778-205.368889-475.591112l-6.257777-3.982222-6.257778 3.413334c-111.502222 64.853333-224.711111 224.142222-204.8 475.591111-55.751111 53.475556-80.213333 116.622222-80.213334 204.8v15.36l179.2-35.271111c11.377778 40.391111 58.595556 69.973333 113.208889 69.973333 54.613333 0 101.262222-29.582222 112.64-68.835556l180.337778 36.408889V705.422222c-0.568889-89.884444-25.031111-153.6-82.488889-206.506666zM571.733333 392.533333c-33.564444 31.288889-87.04 28.444444-118.328889-5.12s-28.444444-87.04 5.12-117.76c33.564444-31.288889 87.04-28.444444 118.328889 5.12s28.444444 86.471111-5.12 117.76zM515.413333 761.173333c-35.84 0-64.284444 29.013333-64.284444 64.284445 0 35.84 54.044444 182.613333 64.284444 182.613333s64.284444-146.773333 64.284445-182.613333c0-35.271111-29.013333-64.284444-64.284445-64.284445z" fill="" p-id="10602"></path>
            </svg>
        </div>
    <?php endif; ?>

    <!-- 改变页面主题颜色 -->
    <?php if (!empty($this->options->JWindowBlock) && in_array('ShowColorTheme', $this->options->JWindowBlock)) : ?>
        <div class="item color" id="showPicker">
            <svg t="1599730320387" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6716">
                <path d="M509.8 986.6c-95.9 0-187.6-34.7-258.2-97.7C180.4 825.1 137.1 738.6 130 645c-7.3-93.7 22.2-185.4 82.8-258.7l0.2-0.2L471.2 46.2c7.9-10.5 20.7-16.8 34.3-16.9h0.2c13.3 0 26 6.2 34.2 16.4l263.7 336.6c0.3 0.5 1 1.1 1.4 1.4 60.9 72.2 91.2 163.3 85.3 256.4-6 93.8-47.9 180.9-118.5 245.5-71 65-164.1 101-262 101zM217.1 639.2c-0.3 1.6 0.1 3.5 0.9 6.4 8.7 36.6 37.8 101.7 134.7 126 15.9 4 31.4 6 46.2 6 52.8 0 89.8-24.6 125.4-48.6 30.4-20.3 59.1-39.6 94.6-39.6 3.7 0 7.6 0.2 11.5 0.6 50.1 5.7 106.9 24.1 143.4 39.4 1 0.3 1.9 0.5 3 0.5 1 0 1.9-0.2 2.8-0.5 1.8-0.6 3.3-2.1 4.1-3.9 41.3-98.4 23.5-210.4-46.8-291.9L512.2 147.4c-1.4-1.8-3.5-2.9-5.8-2.9s-4.5 1.2-6 2.9L281 435.9l-1.3 1.7c-0.2 0.3-0.4 0.5-0.6 1-41.8 50.6-64.8 114.2-64.7 179.1 0 0.3 0 0.5 0.1 1l2.6 20.5z" p-id="6717"></path>
            </svg>
            <div class="color-picker" id="picker"></div>
        </div>
    <?php endif; ?>
</div>

<div class="j-notification"></div>

<!-- 站点公告 -->
<?php if ($this->options->JAlert) : ?>
    <div class="j-alert" id="dayContent">
        <div class="header">站 点 公 告</div>
        <div class="body">
            <?php $this->options->JAlert() ?>
        </div>
        <div class="foot">
            <button>我知道了</button>
        </div>
    </div>
    <div class="j-mask-black" id="dayAlert"></div>
<?php endif; ?>