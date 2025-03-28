import Swiper, { Navigation, A11y, Autoplay, Pagination, EffectFade } from 'swiper'
import 'swiper/css/bundle'
import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'

export default function (HeroMultimedia) {
  const refs = buildRefs(HeroMultimedia)
  const data = getJSON(HeroMultimedia)
  const swiper = initSlider(refs, data)
  return () => swiper.destroy()
}

function initSlider (refs, data) {
  const { options } = data
  const config = {
    modules: [Navigation, A11y, Autoplay, Pagination, EffectFade],
    a11y: options.a11y,
    slidesPerView: 1,
    spaceBetween: 0,
    effect: 'fade',
    pagination: {
      el: refs.pagination,
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: refs.next,
      prevEl: refs.prev
    }
  }
  if (options.autoplay && options.autoplaySpeed) {
    config.autoplay = {
      delay: options.autoplaySpeed
    }
  }

  return new Swiper(refs.slider, config)
}
