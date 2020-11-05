/* 后台设置js */
(function () {
    document.addEventListener('DOMContentLoaded', function () {
        let TabItems = document.querySelectorAll('.j-setting-tab li');
        let Notice = document.querySelector('.j-setting-notice');
        let Form = document.querySelector('.col-mb-12.col-tb-8.col-tb-offset-2 > form');
        let Content = document.querySelectorAll('.j-setting-content');

        TabItems.forEach(item => {
            item.addEventListener('click', function () {
                sessionStorage.setItem('j-setting-current', item.getAttribute('data-current'));
                TabItems.forEach(_item => _item.classList.remove('active'));
                item.classList.add('active');
                if (item.getAttribute('data-current') === 'j-setting-notice') {
                    Notice.style.display = 'block';
                    Form.style.display = 'none';
                } else {
                    Form.style.display = 'block';
                    Notice.style.display = 'none';
                }
                Content.forEach(_item => {
                    _item.style.display = 'none';
                    if (_item.classList.contains(item.getAttribute('data-current'))) _item.style.display = 'block';
                });
            });
        });

        /* 页面第一次进来 */
        if (sessionStorage.getItem('j-setting-current')) {
            if (sessionStorage.getItem('j-setting-current') === 'j-setting-notice') {
                Notice.style.display = 'block';
                Form.style.display = 'none';
            } else {
                Form.style.display = 'block';
                Notice.style.display = 'none';
            }
            TabItems.forEach(item => {
                if (item.getAttribute('data-current') === sessionStorage.getItem('j-setting-current')) {
                    item.classList.add('active');
                    Content.forEach(_item => {
                        if (_item.classList.contains(sessionStorage.getItem('j-setting-current'))) _item.style.display = 'block';
                    });
                }
            });
        } else {
            TabItems[0].classList.add('active');
            Notice.style.display = 'block';
            Form.style.display = 'none';
        }
    });
})();
