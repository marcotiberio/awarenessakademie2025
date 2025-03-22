import Swiper, { Navigation, A11y, Autoplay, Pagination, Scrollbar } from 'swiper'
import 'swiper/css/bundle'
import { buildRefs } from '@/assets/scripts/helpers.js'

export default function (el) {
  const refs = buildRefs(el)
  const swiper1 = initSlider(refs, 'slider', 'prev', 'next', 'scrollbar')
  const swiper2 = initSlider(refs, 'slider2', 'prev2', 'next2', 'scrollbar2')
  const swiper3 = initSlider(refs, 'slider3', 'prev3', 'next3', 'scrollbar3')

  return () => {
    swiper1.destroy()
    swiper2.destroy()
    swiper3.destroy()
  }
}

function initSlider (refs, sliderRef, prevButtonRef, nextButtonRef, scrollbarRef) {
  const config = {
    modules: [Navigation, A11y, Autoplay, Pagination, Scrollbar],
    slidesPerView: 'auto',
    spaceBetween: 20,
    navigation: {
      nextEl: refs[nextButtonRef],
      prevEl: refs[prevButtonRef]
    },
    scrollbar: {
      el: refs[scrollbarRef],
      draggable: true
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      1181: {
        slidesPerView: 2,
        spaceBetween: 20
      }
    }
  }

  return new Swiper(refs[sliderRef], config)
}
