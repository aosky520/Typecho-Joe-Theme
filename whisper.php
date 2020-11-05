<?php

/**
 * 微语
 * 
 * @package custom 
 * 
 **/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->need('public/head.php'); ?>
</head>

<body>

    <section id="joe">
        <!-- 头部 -->
        <?php $this->need('public/header.php'); ?>

        <!-- 主体 -->
        <section class="container j-post">
            <section class="j-adaption">
                <?php $this->widget('Widget_Contents_Post_Recent@sbooo')->to($whisper); ?>
                <?php while ($whisper->next()) : ?>
                    <?php if ($whisper->fields->type === '1') : ?>
                        <section class="whisper">
                            <section class="head">
                                <img src="<?php ParseAvatar($whisper->author->mail); ?>">
                                <section class="desc">
                                    <section class="author"><?php $whisper->author(); ?></section>
                                    <section class="time"><?php $whisper->date('Y-m-d H:i:s'); ?></section>
                                </section>
                            </section>
                            <section class="body">
                                <a href="<?php $whisper->permalink() ?>"><?php $whisper->excerpt(300) ?><span>#<?php $whisper->title() ?>#</span></a>
                            </section>
                            <section class="foot">
                                <section class="count">浏览 <?php GetPostViews($whisper) ?> 次</section>
                                <section class="action">
                                    <?php $agree = $whisper->hidden ? array('agree' => 0, 'recording' => true) : agreeNum($whisper->cid); ?>
                                    <section  data-cid="<?php echo $whisper->cid; ?>" data-url="<?php $whisper->permalink(); ?>" class="j-whisper-like item agree <?php echo $agree['recording'] ? 'active' : ''; ?>">
                                        <svg viewBox="0 0 1169 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M99.084845 104.579285l3.552895-3.552895c132.553386-130.572217 343.891242-135.049658 481.978692-10.526609 138.100658-124.589088 349.438514-119.887115 481.9919 10.566232 135.247775 133.54397 136.806294 351.419683 3.262325 486.812744l-3.262325 3.262324-403.762156 400.024352a109.624661 109.624661 0 0 1-155.019838 1.426441l-1.426441-1.426441-403.762157-399.773404c-135.393061-133.398684-137.096866-351.419683-3.552895-486.812744z m132.077905 284.297692a18.239959 18.239959 0 0 0 18.200335-18.213543 118.790868 118.790868 0 0 1 118.764453-118.751245 18.490907 18.490907 0 0 0 18.345621-18.345621 18.147504 18.147504 0 0 0-18.213543-18.200336 155.323617 155.323617 0 0 0-155.24437 155.297202 18.239959 18.239959 0 0 0 18.200335 18.213543z m0 0" p-id="2303"></path>
                                        </svg>
                                    </section>
                                    <a class="item" href="<?php $whisper->permalink() ?>#j-comment">
                                        <svg class="icon" viewBox="0 0 1092 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M546.350808 508.766169c40.652018 0 73.383052-33.704219 73.383052-75.440291s-33.260742-75.440291-73.383052-75.440291c-40.652018 0-73.383052 33.704219-73.383053 75.440291S505.649514 508.766169 546.350808 508.766169zM797.025935 508.766169c40.652018 0 73.383052-33.704219 73.383053-75.440291a77.842456 77.842456 0 0 0-21.964409-54.030228A72.18813 72.18813 0 0 0 797.025935 357.910224c-40.652018 0-73.383052 33.704219-73.383052 75.440291S756.866669 508.766169 797.025935 508.766169z" fill="" p-id="33214"></path>
                                            <path d="M922.911685 0H169.260222C76.056231 0 0 77.608399 0 173.337742v486.321328c0 98.439478 79.271436 181.899304 172.463108 181.899304h172.463108c46.601996 48.683872 157.483455 163.174738 158.555191 164.246472a59.130208 59.130208 0 0 0 42.857082 18.194858 61.446142 61.446142 0 0 0 43.928817-19.254274l1.601443-1.601443c27.852792-31.031041 96.948904-108.072775 150.511019-161.031268h177.316712c93.733699 0 172.463108-83.459826 172.463108-181.899304V173.337742C1092.676978 77.608399 1016.115677 0 922.911685 0zM88.375024 173.337742c0-47.082429 36.426672-85.603296 81.414906-85.603295h753.121755c44.988234 0 81.414906 38.520867 81.414906 85.603295v486.321328c0 49.755607-39.09985 93.62283-84.100403 93.62283H706.507441l-12.86082 12.318793c-49.275174 47.612137-115.1684 119.837223-148.367548 156.756647C501.374893 877.406062 419.947668 792.874502 395.839789 767.189818l-12.86082-13.907918H172.463108c-44.988234 0-84.100403-43.867223-84.100403-93.62283z" fill="" p-id="33215"></path>
                                            <path d="M295.133653 508.766169c40.652018 0 73.383052-33.704219 73.383053-75.440291s-33.260742-75.440291-73.383053-75.440291S221.738282 391.614443 221.738282 433.350515 254.43236 508.766169 295.133653 508.766169z" fill="" p-id="33216"></path>
                                        </svg>
                                        <?php $whisper->commentsNum('%d'); ?>
                                    </a>
                                </section>
                            </section>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            </section>
            <?php if ($this->options->JPostAsideStatus === 'on') : ?>
                <?php $this->need('public/aside.php'); ?>
            <?php endif; ?>
        </section>

        <!-- 弹幕 -->
        <?php if ($this->options->JBarragerStatus === 'on') : ?>
            <ul class="j-barrager-list">
                <?php $this->widget('Widget_Comments_Recent@index', 'ignoreAuthor=true')->to($comments); ?>
                <?php while ($comments->next()) : ?>
                    <li>
                        <span class="j-barrager-list-avatar" data-src="<?php ParseAvatar($comments->mail); ?>"></span>
                        <span class="j-barrager-list-content"><?php $comments->excerpt(); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <!-- 尾部 -->
        <?php $this->need('public/footer.php'); ?>
    </section>

    <!-- 配置文件 -->
    <?php $this->need('public/config.php'); ?>
</body>

</html>