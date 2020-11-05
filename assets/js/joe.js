(function () {
    /* *
     *
     * 解决移动端 hover 问题
     *
     * */
    $(document).on('touchstart', e => {});

    /* *
     *
     * 点击弹出下拉框
     *
     * */
    $('.j-drop').on('click', function (e) {
        e.stopPropagation();
        if ($(this).siblings('.j-dropdown').hasClass('active')) $(this).siblings('.j-dropdown').removeClass('active');
        else {
            $('.j-dropdown').removeClass('active');
            $(this).siblings('.j-dropdown').addClass('active');
        }
    });
    $(document).on('click', e => $('.j-dropdown').removeClass('active'));

    $('.j-dropdown[stop-propagation]').on('click', function (e) {
        e.stopPropagation();
    });

    /* *
     *
     * 计算高度
     *
     * */
    let asideWidth = $('.j-aside').width();
    if (asideWidth > 0) {
        $('.j-stretch').addClass('active');
        $('.j-aside').css('width', asideWidth);
    }
    if ($('.j-header').hasClass('fixed')) {
        $('.j-aside .aside')
            .last()
            .css('top', $('.j-header').height() + 20);
        $('.j-floor .contain').css('top', $('.j-header').height() + 20);
        $('.j-stretch .contain').css('top', $('.j-header').height() + 20);
    } else {
        $('.j-aside .aside').last().css('top', 20);
        $('.j-floor .contain').css('top', 20);
        $('.j-stretch .contain').css('top', 20);
    }
    $('.j-stretch .contain').on('click', function () {
        /* 设置侧边栏宽度 */
        if ($('.j-aside').width() === 0) {
            $('.j-aside').css('width', asideWidth);
            $('.j-aside').css('overflow', '');
        } else {
            $('.j-aside').css('width', 0);
            $('.j-aside').css('overflow', 'hidden');
        }
        $("#commentType button[data-type='text']").click();
    });

    /* 归档 */
    $('.j-file .panel').first().next().slideToggle(0);
    $('.j-file .panel').on('click', function () {
        let next = $(this).next();
        next.slideToggle(200);
        $('.j-file .panel-body').not(next).slideUp();
    });

    /* 格式化数字 */
    let formatNumber = val => {
        if (!val && typeof val !== 'number') return;
        return (val + '' || 0).toString().replace(/(\d)(?=(?:\d{3})+$)/g, '$1,');
    };

    /* *
     *
     * 判断搜索框是否为空
     *
     * */
    $('.j-search').on('submit', function (e) {
        if ($('.j-search input').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入搜索内容！'
            });
        }
        $.pjax.submit(e, '#joe', {
            fragment: '#joe'
        });
    });

    /* *
     *
     * 登录注册验证
     *
     * */
    $('#loginForm').on('submit', function (e) {
        if ($('#loginForm .username').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入用户名！'
            });
        }
        if ($('#loginForm .password').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入密码！'
            });
        }
    });

    $('#registerForm').on('submit', function (e) {
        if ($('#registerForm .username').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入用户名！'
            });
        }
        if ($('#registerForm .mail').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入邮箱！'
            });
        }
        if (!/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test($('#registerForm .mail').val())) {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入正确的邮箱！'
            });
        }
    });

    /* *
     *
     * 格式化侧边栏
     *
     * */
    $('#asideReply a').each(function (i, item) {
        let str = $(item).html();
        if (/\{!\{.*/.test(str)) {
            $(item).html('# 图片回复');
        } else {
            $(item).html(str);
        }
        $(item).css('display', '-webkit-box');
    });

    /* *
     *
     * 获取时间计时
     *
     * */
    function getAsideLifeTime() {
        /* 当前时间戳 */
        let nowDate = +new Date();
        /* 今天开始时间戳 */
        let todayStartDate = new Date(new Date().toLocaleDateString()).getTime();
        /* 今天已经过去的时间 */
        let todayPassHours = (nowDate - todayStartDate) / 1000 / 60 / 60;
        /* 今天已经过去的时间比 */
        let todayPassHoursPercent = (todayPassHours / 24) * 100;
        $('#dayProgress .title span').html(parseInt(todayPassHours));
        $('#dayProgress .progress .progress-inner').css('width', parseInt(todayPassHoursPercent) + '%');
        $('#dayProgress .progress .progress-percentage').html(parseInt(todayPassHoursPercent) + '%');

        /* 当前周几 */
        let weekDay = new Date().getDay();
        let weekDayPassPercent = (weekDay / 7) * 100;
        $('#weekProgress .title span').html(weekDay);
        $('#weekProgress .progress .progress-inner').css('width', parseInt(weekDayPassPercent) + '%');
        $('#weekProgress .progress .progress-percentage').html(parseInt(weekDayPassPercent) + '%');

        let year = new Date().getFullYear();

        let date = new Date().getDate();
        let month = new Date().getMonth() + 1;
        let monthAll = new Date(year, month, 0).getDate();
        let monthPassPercent = (date / monthAll) * 100;
        $('#monthProgress .title span').html(date);
        $('#monthProgress .progress .progress-inner').css('width', parseInt(monthPassPercent) + '%');
        $('#monthProgress .progress .progress-percentage').html(parseInt(monthPassPercent) + '%');

        let yearPass = (month / 12) * 100;
        $('#yearProgress .title span').html(month);
        $('#yearProgress .progress .progress-inner').css('width', parseInt(yearPass) + '%');
        $('#yearProgress .progress .progress-percentage').html(parseInt(yearPass) + '%');
    }
    getAsideLifeTime();
    setInterval(() => {
        getAsideLifeTime();
    }, 1000);

    /* *
     *
     * 打字机效果
     *
     * */
    $('.j-typing').each(function (index, item) {
        $(item).show();
        let htmlStr = $(item).html();
        let timer = null;
        let i = 0;
        let typing = () => {
            if (i <= htmlStr.length) {
                $(item).html(htmlStr.slice(0, i++) + '_');
                timer = setTimeout(typing, 100);
            } else {
                $(item).html(htmlStr);
                clearTimeout(timer);
            }
        };
        typing();
    });

    /* *
     *
     * 百度收录
     *
     * */
    $.ajax({
        url: '//api.uomg.com/api/collect.baidu?url=' + encodeURI(window.location.href),
        method: 'get',
        success(res) {
            if (res.code == 1) {
                $('#baiduIncluded').html('百度已收录');
                $('#baiduIncluded').css('color', '#3bca72');
            } else if (res.code == 202703) {
                $('#baiduIncluded').html(`<a no-pjax target="_blank" href="//ziyuan.baidu.com/linksubmit/url?sitename=${encodeURI(window.location.href)}">未收录，加快收录</a>`);
                $('#baiduIncluded a').css('color', '#e6a23c');
            } else {
                $('#baiduIncluded').html('查询收录失败');
                $('#baiduIncluded').css('color', '#f56c6c');
            }
        }
    });

    /* *
     *
     * 格式化图片
     *
     * */
    $('#markdown img').each(function () {
        $(this).addClass('lazyload');
        $(this).attr('data-original', $(this).attr('src'));
        $(this).attr('src', '//cdn.jsdelivr.net/npm/typecho_joe_theme@3.1.3/assets/img/lazyload.jpg');
        let element = document.createElement('a');
        $(element).attr('data-fancybox', 'gallery');
        $(element).attr('href', $(this).attr('data-original'));
        $(this).wrap(element);
    });

    /* *
     *
     * 新窗口打开
     *
     * */
    $('#markdown a:not(a[no-target])').attr({
        target: '_blank'
    });

    /* *
     *
     * 获取高度
     *
     * */
    $('#markdown h1, #markdown h2, #markdown h3, #markdown h4, #markdown h5, #markdown h6').each((i, item) => {
        if ($('.j-header').hasClass('fixed')) {
            $(item).css('scroll-margin-top', $('.j-header').height() + 20);
        } else {
            $(item).css('scroll-margin-top', 20);
        }
    });

    /* 计算评论的高度 */
    $('.comment-list .scrolltop').each((i, item) => {
        if ($('.j-header').hasClass('fixed')) {
            $(item).css('scroll-margin-top', $('.j-header').height() + 20);
        } else {
            $(item).css('scroll-margin-top', 20);
        }
    });

    /* 处理hash值 */
    if (window.location.hash === '') {
        $('#joe').scrollTop(0);
    } else {
        let hashUrl = window.location.hash.split('/');
        let timer = setTimeout(() => {
            if ($('.j-header').hasClass('fixed')) {
                $('#joe').scrollTop($('#joe').scrollTop() + $(hashUrl[0]).offset().top - ($('.j-header').height() + 20));
            } else {
                $('#joe').scrollTop($('#joe').scrollTop() + $(hashUrl[0]).offset().top - 20);
            }
            clearTimeout(timer);
        }, 120);
    }

    window.TypechoComment = {
        dom: function (id) {
            return document.getElementById(id);
        },
        create: function (tag, attr) {
            var el = document.createElement(tag);
            for (var key in attr) {
                el.setAttribute(key, attr[key]);
            }
            return el;
        },
        reply: function (cid, coid) {
            var comment = this.dom(cid),
                parent = comment.parentNode,
                response = this.dom($('.j-comment').attr('data-respondid')),
                input = this.dom('comment-parent'),
                form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                textarea = response.getElementsByTagName('textarea')[0];
            if (null == input) {
                input = this.create('input', {
                    type: 'hidden',
                    name: 'parent',
                    id: 'comment-parent'
                });
                form.appendChild(input);
            }
            input.setAttribute('value', coid);
            if (null == this.dom('comment-form-place-holder')) {
                var holder = this.create('div', {
                    id: 'comment-form-place-holder'
                });
                response.parentNode.insertBefore(holder, response);
            }
            comment.appendChild(response);
            this.dom('cancel-comment-reply-link').style.display = '';
            if (null != textarea && 'text' == textarea.name) {
                textarea.focus();
            }
            return false;
        },
        cancelReply: function () {
            var response = this.dom($('.j-comment').attr('data-respondid')),
                holder = this.dom('comment-form-place-holder'),
                input = this.dom('comment-parent');
            if (null != input) {
                input.parentNode.removeChild(input);
            }
            if (null == holder) {
                return true;
            }
            this.dom('cancel-comment-reply-link').style.display = 'none';
            holder.parentNode.insertBefore(response, holder);
            return false;
        }
    };

    /* *
     *
     * 朗读按钮
     *
     * */
    const synth = window.speechSynthesis;
    const msg = new SpeechSynthesisUtterance();
    synth.cancel(msg);
    $('#read').on('click', function () {
        if ($(this).find('span').html() === '朗读') {
            $.toast({
                type: 'info',
                message: '如果不能朗读代表不支持'
            });
            msg.lang = 'zh-CN';
            msg.text = $('#markdown').text();
            synth.speak(msg);
            $(this).find('span').html('停止朗读');
        } else {
            synth.cancel(msg);
            $(this).find('span').html('朗读');
        }
    });

    /* *
     *
     * 复制按钮
     *
     * */
    $('.j-copy').on('click', function (e) {
        e.preventDefault();
        $('body').append(`
                <input id="copyInput" value="${$(this).attr('data-copy')}"/>
            `);
        $('#copyInput').select();
        document.execCommand('copy');
        $.toast({
            type: 'success',
            message: '已复制到剪切板中~'
        });
        $('#copyInput').remove();
    });

    /* 生成二维码 */
    $('#j-share-code').qrcode({
        render: 'canvas',
        width: 90,
        height: 90,
        text: encodeURI(window.location.href),
        background: '#ffffff',
        foreground: '#000000',
        correctLevel: 0
    });

    /* 点赞 */
    $('#j-thumbs-up').on('click', function () {
        if ($(this).attr('disabled')) {
            return $.toast({
                type: 'warning',
                message: '本篇文章您已经赞过！'
            });
        }
        $.ajax({
            type: 'post',
            url: $(this).attr('data-url'),
            data: 'agree=' + $(this).attr('data-cid'),
            async: true,
            timeout: 30000,
            cache: false,
            success: function (data) {
                var reg = /\d/;
                if (reg.test(data)) $('#j-thumbs-up span').html('赞（' + data + '）');
                $.toast({
                    type: 'success',
                    message: '感谢您的点赞！'
                });
                $('#j-thumbs-up').attr('disabled', 'disabled');
            }
        });
    });

    $('.j-whisper-like').on('click', function () {
        if ($(this).hasClass('active')) return;
        $.ajax({
            type: 'post',
            url: $(this).attr('data-url'),
            data: 'agree=' + $(this).attr('data-cid'),
            async: true,
            timeout: 30000,
            cache: false,
            success: data => {
                $(this).addClass('active');
            }
        });
    });

    /* 赞赏按钮 */
    $('#j-admire').on('click', function () {
        $('.j-admire-modal').addClass('active');
        $('#joe').css('overflow', 'hidden');
    });
    $('.j-admire-modal .close').on('click', function () {
        $('.j-admire-modal').removeClass('active');
        $('#joe').css('overflow', '');
    });

    /*
     *
     *
     * 格式化回复列表
     *
     *
     */
    $('.replyContent p').each(function (i, item) {
        let str = $(item).html();
        if (!/\{!\{.*\}!\}/.test(str)) return;
        str = str.replace(/{!{/, '').replace(/}!}/, '');
        $(item).html('<img class="canvas" src="' + str + '" />');
    });
    $('.replyContent').show();
    /* 切换画图模式/文本模式 */
    $('#commentType button').on('click', function () {
        $('#commentType button').removeClass('active');
        $(this).addClass('active');
        if ($(this).attr('data-type') === 'canvas') {
            $('#draw').prop('width', $('#commentTypeContent').width());
            $('#commentTypeContent textarea').hide();
            $('#commentTypeContent .canvas').show();
            $('#commentTypeContent .canvas').attr('data-type', 'canvas');
        } else {
            $('#commentTypeContent textarea').show();
            $('#commentTypeContent .canvas').hide();
            $('#commentTypeContent .canvas').attr('data-type', 'text');
        }
    });
    $('.comment-list .meta a').on('click', function () {
        $('#draw').prop('width', $('#commentTypeContent').width());
    });
    $('#cancel-comment-reply-link').on('click', function () {
        $('#draw').prop('width', $('#commentTypeContent').width());
    });
    $('#comment-form').on('submit', function (e) {
        if ($('#comment-nick').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入您的昵称！'
            });
        }
        if (!/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test($('#comment-mail').val())) {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入正确的邮箱！'
            });
        }
        if ($('#commentTypeContent .canvas').attr('data-type') === 'canvas') {
            let url = $('#draw')[0].toDataURL('image/webp', 0.1);
            $('#comment-content').val('{!{' + url + '}!} ');
        }
        if ($('#comment-content').val().trim() === '') {
            e.preventDefault();
            return $.toast({
                type: 'warning',
                message: '请输入评论内容！'
            });
        }
    });
    if ($('#draw').length > 0) {
        sketchpad = new Sketchpad({
            element: '#draw',
            height: 300,
            penSize: 5,
            color: '303133'
        });
        $('#commentTypeContent .undo').on('click', function () {
            sketchpad.undo();
        });
        $('#commentTypeContent .animate').on('click', function () {
            sketchpad.animate(10);
        });
        $('#commentTypeContent .canvas ul li').on('click', function () {
            sketchpad.penSize = $(this).attr('data-line');
            $('#commentTypeContent .canvas ul li').removeClass('active');
            $(this).addClass('active');
        });
        $('#commentTypeContent .canvas ol li').on('click', function () {
            sketchpad.color = $(this).attr('data-color');
            $('#commentTypeContent .canvas ol li').removeClass('active');
            $(this).addClass('active');
        });
    }

    let initLeaving = () => {
        let isDown = false;
        let x = 0;
        let y = 0;
        let positionX = 0;
        let positionY = 0;
        let moveItem = null;
        let zIndex = 100;
        function random(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        $('#j-leaving li').each(function (i, item) {
            $(item)
                .find('.body .content p')
                .each(function (_i, _item) {
                    let str = $(_item).html();
                    if (!/\{!\{.*\}!\}/.test(str)) return;
                    str = str.replace(/{!{/, '').replace(/}!}/, '');
                    $(_item).html('<img class="canvas" src="' + str + '" />');
                });
            $(item).css({
                'z-index': random(1, 99),
                'background-color': `rgba(${random(0, 255)}, ${random(0, 255)}, ${random(0, 255)}, ${random(0.8, 1)})`,
                top: parseInt(Math.random() * ($('#j-leaving').height() - $(item).height()), 10),
                left: parseInt(Math.random() * ($('#j-leaving').width() - $(item).width()), 10),
                display: 'flex'
            });
            $(item).on('mousedown', function (e) {
                e.preventDefault();
                e.stopPropagation();
                isDown = true;
                $(this).css('transform', 'scale(1.25)');
                moveItem = $(this);
                x = e.pageX;
                y = e.pageY;
                positionX = $(this).position().left;
                positionY = $(this).position().top;
                $(item).css('z-index', zIndex);
                zIndex++;
                return false;
            });
        });
        $(document).on('mouseup', function (e) {
            isDown = false;
            $(moveItem).css('transform', '');
        });
        $(document).on('mousemove', function (e) {
            let xPage = e.pageX;
            let moveX = positionX + xPage - x;
            let yPage = e.pageY;
            let moveY = positionY + yPage - y;
            if (!isDown) return;
            $(moveItem).css({
                left: moveX,
                top: moveY
            });
            if (moveX < 0) {
                $(moveItem).css({
                    left: 0
                });
            }
            if (moveX > $('#j-leaving').width() - $(moveItem).width()) {
                $(moveItem).css({
                    left: $('#j-leaving').width() - $(moveItem).width()
                });
            }
            if (moveY < 0) {
                $(moveItem).css({
                    top: 0
                });
            }
            if (moveY > $('#j-leaving').height() - $(moveItem).height()) {
                $(moveItem).css({
                    top: $('#j-leaving').height() - $(moveItem).height()
                });
            }
        });
    };
    initLeaving();

    /* *
     *
     * 图片懒加载
     *
     * */
    new LazyLoad('.lazyload');

    console.log('%cTypecho-Joe-Theme%cae.js.cn', 'background: #1fc46a;padding: 10px', 'background: #15a5ed;padding: 10px');
})();
