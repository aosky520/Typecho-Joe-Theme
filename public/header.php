<?php if ($this->options->JHeaderStyle === 'default') : ?>
    <header class="container-fluid j-header j-header-default <?php if ($this->options->JHeaderFixedStatus === 'on') : ?>fixed<?php endif; ?>">

        <section class="row above">
            <section class="container">
                <!-- 网站 logo -->
                <h1 class="logo j-hover-music" title="<?php $this->options->title(); ?>">
                    <?php $this->options->title(); ?>
                    <a href="<?php $this->options->siteUrl(); ?>">
                        <?php if ($this->options->JLogo) : ?>
                            <img src="<?php $this->options->JLogo() ?>" />
                        <?php else : ?>
                            <img src="<?php $this->options->themeUrl('assets/img/logo.png'); ?>" />
                        <?php endif; ?>
                    </a>
                </h1>

                <!-- 链接 -->
                <nav class="nav">
                    <a class="link <?php if ($this->is('index')) : ?>active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>">首页</a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <a class="link <?php if ($this->is('page', $pages->slug)) : ?>active<?php endif; ?>" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>

                <!-- 搜索 -->
                <form class="search j-search" method="get" action="<?php $this->options->siteUrl(); ?>">
                    <input maxlength="20" name="s" autocomplete="off" <?php if ($this->is('search')) : ?>value="<?php $this->archiveTitle(' &raquo; ', '', ''); ?>" <?php endif; ?> type="text" placeholder="请输入关键字..." />
                    <button type="submit">Search</button>
                    <span></span>
                </form>
            </section>
        </section>

        <section class="row below">
            <section class="container">

                <!-- 分类 -->
                <nav class="nav">
                    <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                    <?php while ($categorys->next()) : ?>
                        <?php if ($categorys->levels === 0) : ?>
                            <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                            <?php if (empty($children)) { ?>
                                <a class="link <?php if ($this->is('category', $categorys->slug)) : ?>active<?php endif; ?>" href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a>
                            <?php } else { ?>
                                <section class="link">
                                    <section class="j-drop">
                                        <span><?php $categorys->name(); ?></span>
                                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M825.728 390.144L521.056 702.336 217.152 390.144c-16.576-16.576-43.744-16.576-60.32 0s-16.576 43.744 0 60.32L483.36 778.496c10.56 9.056 23.392 19.616 36.96 17.344 13.568 3.008 27.904-6.784 38.464-17.344L886.08 450.464a42.816 42.816 0 0 0 0-60.32 42.784 42.784 0 0 0-60.352 0z"></path>
                                        </svg>
                                    </section>
                                    <nav class="j-dropdown">
                                        <?php foreach ($children as $mid) { ?>
                                            <?php $child = $categorys->getCategory($mid); ?>
                                            <a <?php if ($this->is('category', $child['slug'])) : ?>class="active" <?php endif; ?> href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a>
                                        <?php } ?>
                                    </nav>
                                </section>
                            <?php } ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </nav>

                <!-- 统计 -->
                <?php if ($this->options->JCensusStatus === 'on') : ?>
                    <section class="census">
                        <section class="j-drop">
                            <svg t="1603101294607" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2418" width="200" height="200">
                                <path d="M273.5104 565.82656l200.704-209.97632 194.00704 202.98752c1.4848 2.31424 2.46272 4.93568 4.4544 6.9888 15.90784 16.65536 41.65632 16.65536 57.51808 0l222.86848-233.16992c2.5088-1.68448 4.82304-3.62496 6.92224-5.80608 16.256-17.00864 16.256-44.5952 0-61.61408-16.27136-17.01888-42.64448-17.01888-58.9056 0-1.19296 1.28512-1.72544 2.94912-2.76992 4.34176l-195.73248 204.8256-198.0928-207.27808c-0.50176-0.57856-0.67584-1.3312-1.19296-1.88928-16.26112-17.01376-42.63424-17.01376-58.91072 0-1.21344 1.29024-1.70496 2.95424-2.72896 4.34688L215.99744 505.69216c-15.88736 16.6144-15.88736 43.56608 0 60.1344 15.88224 16.66048 41.64608 16.66048 57.51296 0z m704.8448 273.32096H88.70912V144.1024c0-20.20864-15.91808-36.5824-35.584-36.5824s-35.58912 16.37376-35.58912 36.5824v731.63776c0 20.20864 15.9232 36.57216 35.58912 36.57216h925.2352c19.64032 0 35.58912-16.3584 35.58912-36.57216 0.00512-20.1984-15.93856-36.59264-35.59424-36.59264z m0 0" p-id="2419"></path>
                            </svg>
                            <span>统计</span>
                        </section>
                        <nav class="j-dropdown">
                            <section id="census"></section>
                        </nav>
                    </section>
                <?php endif; ?>

                <?php if ($this->options->JSignStatus === 'on') : ?>
                    <?php if ($this->user->hasLogin()) : ?>
                        <section class="logged">
                            <section class="j-drop">
                                <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M256.003012 341.329983c0-141.182993 114.805994-255.997988 255.987988-255.997987 141.182993 0 255.996988 114.814994 255.996988 255.996987 0 141.173993-114.813994 255.996988-255.996988 255.996988S255.994013 482.502976 255.994013 341.329983M979.869977 970.349953c-41.949998-157.139992-152.539993-280.018986-291.409986-337.404984 98.592995-59.902997 164.861992-168.019992 164.861992-291.622986C853.311983 153.128993 700.182991 0 511.983 0s-341.329983 153.128993-341.329983 341.329983c0 123.594994 66.260997 231.709989 164.904992 291.613986C196.680015 690.372966 86.090021 813.20896 44.114023 970.347953a42.649998 42.649998 0 0 0 30.207998 52.171997 42.708998 42.708998 0 0 0 52.256998-30.206998C175.280016 810.00896 333.741009 682.658967 512 682.658967s336.755984 127.357994 385.445981 309.669985a42.579998 42.579998 0 0 0 52.223998 30.207998 42.649998 42.649998 0 0 0 30.206998-52.179997" p-id="5392"></path>
                                </svg>
                                <span><?php $this->user->screenName(); ?></span>
                            </section>
                            <nav class="j-dropdown">
                                <?php if ($this->user->group == 'administrator') : ?>
                                    <a no-pjax rel="nofollow" target="_balnk" href="<?php $this->options->adminUrl("options-theme.php"); ?>">修改外观</a>
                                <?php endif; ?>
                                <?php if ($this->user->group == 'administrator' || $this->user->group == 'editor' || $this->user->group == 'contributor') : ?>
                                    <a no-pjax rel="nofollow" target="_balnk" href="<?php $this->options->adminUrl("manage-posts.php"); ?>">管理文章</a>
                                <?php endif; ?>
                                <a no-pjax rel="nofollow" target="_balnk" href="<?php $this->options->adminUrl(); ?>">进入后台</a>
                                <a no-pjax rel="nofollow" href="<?php $this->options->logoutUrl(); ?>">退出登录</a>
                            </nav>
                        </section>
                    <?php else : ?>
                        <section class="sign">
                            <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256.003012 341.329983c0-141.182993 114.805994-255.997988 255.987988-255.997987 141.182993 0 255.996988 114.814994 255.996988 255.996987 0 141.173993-114.813994 255.996988-255.996988 255.996988S255.994013 482.502976 255.994013 341.329983M979.869977 970.349953c-41.949998-157.139992-152.539993-280.018986-291.409986-337.404984 98.592995-59.902997 164.861992-168.019992 164.861992-291.622986C853.311983 153.128993 700.182991 0 511.983 0s-341.329983 153.128993-341.329983 341.329983c0 123.594994 66.260997 231.709989 164.904992 291.613986C196.680015 690.372966 86.090021 813.20896 44.114023 970.347953a42.649998 42.649998 0 0 0 30.207998 52.171997 42.708998 42.708998 0 0 0 52.256998-30.206998C175.280016 810.00896 333.741009 682.658967 512 682.658967s336.755984 127.357994 385.445981 309.669985a42.579998 42.579998 0 0 0 52.223998 30.207998 42.649998 42.649998 0 0 0 30.206998-52.179997" p-id="5392"></path>
                            </svg>
                            <div class="sign-box">
                                <span class="j-drop">登录</span>
                                <form class="j-dropdown" id="loginForm" stop-propagation method="post" name="login" action="<?php $this->options->loginAction() ?>">
                                    <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
                                    <div class="form-item">
                                        <div>用户名</div>
                                        <input class="username" placeholder="请输入用户名" type="text" maxlength="16" name="name" autocomplete="off" />
                                    </div>
                                    <div class="form-item">
                                        <div>密码</div>
                                        <input class="password" placeholder="请输入密码" type="password" maxlength="16" name="password" autocomplete="off" />
                                    </div>
                                    <div class="form-item">
                                        <button type="submit">登 录</button>
                                    </div>
                                </form>
                            </div>
                            <?php if ($this->options->allowRegister) : ?>
                                <span class="line">/</span>
                                <div class="sign-box">
                                    <span class="j-drop">注册</span>
                                    <form stop-propagation id="registerForm" class="j-dropdown" action="<?php $this->options->registerAction(); ?>" method="post" name="register">
                                        <div class="form-item">
                                            <div>用户名</div>
                                            <input class="username" placeholder="请输入用户名" type="text" maxlength="16" name="name" autocomplete="off" />
                                        </div>
                                        <div class="form-item">
                                            <div>邮箱</div>
                                            <input class="mail" placeholder="请输入邮箱" type="text" name="mail" autocomplete="off" />
                                        </div>
                                        <div class="form-item">
                                            <button type="submit">注 册</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </section>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- 弹幕 -->
                <?php if ($this->options->JBarragerStatus === 'on') : ?>
                    <input id="barrager" class="barrager" type="checkbox" title="开启/关闭弹幕">
                <?php endif; ?>
            </section>
        </section>

        <?php if ($this->options->JProgressStatus === 'on') : ?>
            <section id="progress" class="progress"></section>
        <?php endif; ?>
    </header>
<?php else : ?>
    <header class="container-fluid j-header j-header-fluid <?php if ($this->options->JHeaderFixedStatus === 'on') : ?>fixed<?php endif; ?>">

        <!-- 进度条 -->
        <?php if ($this->options->JProgressStatus === 'on') : ?>
            <section id="progress" class="progress"></section>
        <?php endif; ?>

        <section class="left">

            <!-- 网站 logo -->
            <h1 class="logo j-hover-music" title="<?php $this->options->title(); ?>">
                <?php $this->options->title(); ?>
                <a href="<?php $this->options->siteUrl(); ?>">
                    <?php if ($this->options->JLogo) : ?>
                        <img src="<?php $this->options->JLogo() ?>" />
                    <?php else : ?>
                        <img src="<?php $this->options->themeUrl('assets/img/logo.png'); ?>" />
                    <?php endif; ?>
                </a>
            </h1>

            <!-- 链接 -->
            <nav class="nav">
                <a class="link <?php if ($this->is('index')) : ?>active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>">首页</a>
                <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                <?php while ($categorys->next()) : ?>
                    <?php if ($categorys->levels === 0) : ?>
                        <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                        <?php if (empty($children)) { ?>
                            <a class="link <?php if ($this->is('category', $categorys->slug)) : ?>active<?php endif; ?>" href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a>
                        <?php } else { ?>
                            <section class="drop">
                                <section class="j-drop">
                                    <span><?php $categorys->name(); ?></span>
                                    <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M825.728 390.144L521.056 702.336 217.152 390.144c-16.576-16.576-43.744-16.576-60.32 0s-16.576 43.744 0 60.32L483.36 778.496c10.56 9.056 23.392 19.616 36.96 17.344 13.568 3.008 27.904-6.784 38.464-17.344L886.08 450.464a42.816 42.816 0 0 0 0-60.32 42.784 42.784 0 0 0-60.352 0z"></path>
                                    </svg>
                                </section>
                                <nav class="j-dropdown">
                                    <?php foreach ($children as $mid) { ?>
                                        <?php $child = $categorys->getCategory($mid); ?>
                                        <a <?php if ($this->is('category', $child['slug'])) : ?>class="active" <?php endif; ?> href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a>
                                    <?php } ?>
                                </nav>
                            </section>
                        <?php } ?>
                    <?php endif; ?>
                <?php endwhile; ?>

                <!-- 页面 -->
                <section class="drop">
                    <section class="j-drop">
                        <span>页面</span>
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M813.056 201.216c-11.776 32.768-18.432 67.584-18.432 103.424 0 34.816 6.144 69.632 17.92 101.888H250.88c-56.32 0-102.4-46.08-102.4-102.4s46.08-102.4 102.4-102.4h562.176M947.2 129.536H250.88c-96.256 0-174.08 77.824-174.08 174.08s77.824 174.08 174.08 174.08h694.272c-48.64-41.984-78.848-103.936-78.848-173.568 0-70.144 31.232-132.608 80.896-174.592zM773.12 617.984c56.32 0 102.4 46.08 102.4 102.4s-46.08 102.4-102.4 102.4H211.456c11.776-32.256 17.92-66.56 17.92-101.888 0-35.84-6.144-70.656-18.432-103.424H773.12m0-71.168H76.8c49.664 41.984 80.896 104.96 80.896 175.104 0 69.12-30.72 131.072-78.848 173.568H773.12c96.256 0 174.08-77.824 174.08-174.08 0-96.768-77.824-174.592-174.08-174.592z" p-id="2529"></path>
                        </svg>
                    </section>
                    <nav class="j-dropdown">
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <?php while ($pages->next()) : ?>
                            <a class="<?php if ($this->is('page', $pages->slug)) : ?>active<?php endif; ?>" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                    </nav>
                </section>

                <!-- 统计 -->
                <?php if ($this->options->JCensusStatus === 'on') : ?>
                    <section class="drop">
                        <section class="j-drop">
                            <span>统计</span>
                            <svg t="1603101294607" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2418" width="200" height="200">
                                <path d="M273.5104 565.82656l200.704-209.97632 194.00704 202.98752c1.4848 2.31424 2.46272 4.93568 4.4544 6.9888 15.90784 16.65536 41.65632 16.65536 57.51808 0l222.86848-233.16992c2.5088-1.68448 4.82304-3.62496 6.92224-5.80608 16.256-17.00864 16.256-44.5952 0-61.61408-16.27136-17.01888-42.64448-17.01888-58.9056 0-1.19296 1.28512-1.72544 2.94912-2.76992 4.34176l-195.73248 204.8256-198.0928-207.27808c-0.50176-0.57856-0.67584-1.3312-1.19296-1.88928-16.26112-17.01376-42.63424-17.01376-58.91072 0-1.21344 1.29024-1.70496 2.95424-2.72896 4.34688L215.99744 505.69216c-15.88736 16.6144-15.88736 43.56608 0 60.1344 15.88224 16.66048 41.64608 16.66048 57.51296 0z m704.8448 273.32096H88.70912V144.1024c0-20.20864-15.91808-36.5824-35.584-36.5824s-35.58912 16.37376-35.58912 36.5824v731.63776c0 20.20864 15.9232 36.57216 35.58912 36.57216h925.2352c19.64032 0 35.58912-16.3584 35.58912-36.57216 0.00512-20.1984-15.93856-36.59264-35.59424-36.59264z m0 0" p-id="2419"></path>
                            </svg>
                        </section>
                        <nav class="j-dropdown census">
                            <section id="census"></section>
                        </nav>
                    </section>
                <?php endif; ?>
            </nav>

            <!-- 弹幕 -->
            <?php if ($this->options->JBarragerStatus === 'on') : ?>
                <input id="barrager" class="barrager" type="checkbox" title="开启/关闭弹幕">
            <?php endif; ?>

        </section>

        <section class="right">

            <!-- 登录/注册 -->
            <?php if ($this->options->JSignStatus === 'on') : ?>
                <?php if ($this->user->hasLogin()) : ?>
                    <section class="logged">
                        <section class="j-drop">
                            <img src="<?php ParseAvatar($this->user->mail); ?>">
                        </section>
                        <nav class="j-dropdown">
                            <?php if ($this->user->group == 'administrator') : ?>
                                <a no-pjax rel="nofollow" target="_balnk" href="<?php $this->options->adminUrl("options-theme.php"); ?>">修改外观</a>
                            <?php endif; ?>
                            <?php if ($this->user->group == 'administrator' || $this->user->group == 'editor' || $this->user->group == 'contributor') : ?>
                                <a no-pjax rel="nofollow" target="_balnk" href="<?php $this->options->adminUrl("manage-posts.php"); ?>">管理文章</a>
                            <?php endif; ?>
                            <a no-pjax rel="nofollow" target="_balnk" href="<?php $this->options->adminUrl(); ?>">进入后台</a>
                            <a no-pjax rel="nofollow" href="<?php $this->options->logoutUrl(); ?>">退出登录</a>
                        </nav>
                    </section>
                <?php else : ?>
                    <section class="sign">
                        <div class="sign-box">
                            <button class="j-drop">
                                <span>登录</span>
                                <span>Go !</span>
                            </button>
                            <form class="j-dropdown" id="loginForm" stop-propagation method="post" name="login" action="<?php $this->options->loginAction() ?>">
                                <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
                                <div class="form-item">
                                    <div>用户名</div>
                                    <input class="username" placeholder="请输入用户名" type="text" maxlength="16" name="name" autocomplete="off" />
                                </div>
                                <div class="form-item">
                                    <div>密码</div>
                                    <input class="password" placeholder="请输入密码" type="password" maxlength="16" name="password" autocomplete="off" />
                                </div>
                                <div class="form-item">
                                    <button type="submit">登 录</button>
                                </div>
                            </form>
                        </div>
                        <?php if ($this->options->allowRegister) : ?>
                            <div class="sign-box">
                                <button class="j-drop">
                                    <span>注册</span>
                                    <span>Go !</span>
                                </button>
                                <form stop-propagation id="registerForm" class="j-dropdown" action="<?php $this->options->registerAction(); ?>" method="post" name="register">
                                    <div class="form-item">
                                        <div>用户名</div>
                                        <input class="username" placeholder="请输入用户名" type="text" maxlength="16" name="name" autocomplete="off" />
                                    </div>
                                    <div class="form-item">
                                        <div>邮箱</div>
                                        <input class="mail" placeholder="请输入邮箱" type="text" name="mail" autocomplete="off" />
                                    </div>
                                    <div class="form-item">
                                        <button type="submit">注 册</button>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif; ?>
            <?php endif; ?>

            <!-- 搜索 -->
            <form class="search j-search" method="get" action="<?php $this->options->siteUrl(); ?>">
                <input maxlength="20" name="s" autocomplete="off" <?php if ($this->is('search')) : ?>value="<?php $this->archiveTitle(' &raquo; ', '', ''); ?>" <?php endif; ?> type="text" placeholder="请输入关键字..." />
                <button type="submit">
                    <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M999.038976 940.800004l-186.879991-186.239991c159.999992-186.239991 144.639993-465.278977-35.199998-632.317969-179.199991-167.679992-458.878978-161.919992-632.957969 11.519999-169.599992 169.599992-178.559991 440.958978-21.759999 622.07897 156.799992 181.119991 427.518979 208.63999 618.87897 63.999997l188.799991 188.798991c12.159999 12.159999 30.079999 16.639999 46.719997 12.159999 16.638999-3.84 30.078999-17.279999 33.918999-33.919998 5.76-16.639999 0.64-33.919998-11.52-46.079998zM466.560002 816.64001c-199.67999 0-360.319982-161.279992-360.319982-360.318982 0-198.39999 161.279992-359.679982 360.319982-359.679983 199.67999 0 360.319982 161.279992 360.319983 360.319983 0.64 198.39999-160.639992 359.679982-360.319983 359.679982z m0 0" p-id="5075"></path>
                    </svg>
                </button>
                <span></span>
            </form>
        </section>
    </header>
<?php endif; ?>