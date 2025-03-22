// import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
// import delegate from 'delegate-event-listener'
// import { buildRefs } from '@/assets/scripts/helpers.js'

// export default function (el) {
//   let isMenuOpen
//   const refs = buildRefs(el)
//   const navigationHeight = parseInt(window.getComputedStyle(el).getPropertyValue('--navigation-height')) || 0

//   const isDesktopMediaQuery = window.matchMedia('(min-width: 1024px)')
//   isDesktopMediaQuery.addEventListener('change', onBreakpointChange)

//   el.addEventListener('click', delegate('[data-ref="menuButton"]', onMenuButtonClick))
//   el.addEventListener('click', delegate('[data-ref="menu"] a', onMenuLinkClick))

//   onBreakpointChange()

//   function onMenuButtonClick(e) {
//     isMenuOpen = !isMenuOpen
//     refs.menuButton.setAttribute('aria-expanded', isMenuOpen)

//     if (isMenuOpen) {
//       el.classList.add('menuIsOpen');
//       disableBodyScroll(refs.menu)
//     } else {
//       el.classList.remove('menuIsOpen');
//       enableBodyScroll(refs.menu)
//     }
//   }

//   function onMenuLinkClick(e) {
//     // Check if the clicked element is a link within the menu
//     const isLink = e.target.tagName.toLowerCase() === 'a';

//     if (isLink) {
//       // Remove the 'menuIsOpen' class when a link is clicked
//       el.classList.remove('menuIsOpen');
//       enableBodyScroll(refs.menu);
//     }
//   }

//   function onBreakpointChange() {
//     if (!isDesktopMediaQuery.matches) {
//       setScrollPaddingTop();
//     }
//   }

//   function setScrollPaddingTop() {
//     const scrollPaddingTop = document.getElementById('wpadminbar')
//       ? navigationHeight + document.getElementById('wpadminbar').offsetHeight
//       : navigationHeight;
//     document.documentElement.style.scrollPaddingTop = `${scrollPaddingTop}px`;
//   }
// }
