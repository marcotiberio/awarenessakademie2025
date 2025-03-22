import Swiper, { Navigation, A11y, Autoplay, Pagination } from 'swiper'
import 'swiper/css/bundle'
import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { gsap } from 'gsap'

gsap.registerPlugin(ScrollTrigger)

export default (blockTicker) => {
  const refs = buildRefs(blockTicker)
  const data = getJSON(blockTicker)
  const swiper = initSlider(refs, data)
  return () => swiper.destroy()
}

function initSlider (refs, data) {
  const { options } = data
  const config = {
    modules: [Navigation, A11y, Autoplay, Pagination],
    a11y: options.a11y,
    slidesPerView: 'auto',
    loop: true,
    freeMode: true,
    spaceBetween: 20,
    speed: options.autoplaySpeed,
    autoplay: {
      delay: options.autoplayDelay,
      pauseOnMouseEnter: true,
      disableOnInteraction: false
    },
    on: {
      afterInit: () => {
        ScrollTrigger.refresh()
      }
    }
  }

  return new Swiper(refs.slider, config)
}
