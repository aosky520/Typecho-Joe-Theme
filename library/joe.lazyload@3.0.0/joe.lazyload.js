class LazyLoad {
    constructor(el) {
        this.imglist = Array.from($(el));
        this.init();
    }
    canILoad() {
        let imglist = this.imglist;
        for (let i = imglist.length; i--; ) this.getBound(imglist[i]) && this.loadImage(imglist[i], i);
    }
    getBound(el) {
        let bound = el.getBoundingClientRect();
        let clientHeight = window.innerHeight;
        return bound.top <= clientHeight;
    }
    loadImage(el, index) {
        let src = el.getAttribute('data-original');
        el.src = src;
        this.imglist.splice(index, 1);
    }
    bindEvent() {
        $('#joe').on('scroll', () => {
            this.imglist.length && this.canILoad();
        });
    }
    init() {
        this.canILoad();
        this.bindEvent();
    }
}
