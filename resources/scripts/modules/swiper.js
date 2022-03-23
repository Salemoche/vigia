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
}
