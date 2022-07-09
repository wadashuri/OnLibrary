

//自動でスライドが動くスライダー
const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,

    speed: 300,
    autoplay: {
        delay: 10000
    },
});