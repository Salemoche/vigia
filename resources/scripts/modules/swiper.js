import Swiper, { Autoplay } from 'swiper';

export const swiperScript = () => {

  const swiper = new Swiper('.swiper', {
    modules: [ Autoplay ],
    speed: 400,
    loop: true,
    autoplay: {
      delay: 3000
    },
  });

  // document.querySelector('.vigia-slider').addEventListener('click', function (e) {
  swiper.on('click', function (e) {
    // const forward = e.target.clientX > e.target.offsetWidth / 2;
    const forward = e.touches.currentX > e.width / 2;
    console.log(e.touches.currentX, forward);

    if ( forward ) {
      swiper.slideNext()
    } else {
      swiper.slidePrev()
    }
  });
}
