import $ from 'jquery'

$(document).ready(function () {
  $('#showcontactFormWrapper').click(function () {
    $('#contactFormWrapper').toggle()
  })
  $('#hidecontactFormWrapper').click(function () {
    $('#contactFormWrapper').hide()
  })
})

$('.hamburger').on('click', function () {
  $('.menu').toggleClass('menuIsOpen')
  $('body').toggleClass('overflow-y-hidden')
})

$('.menu a').on('click', function () {
  $('.menu').removeClass('menuIsOpen')
  $('body').removeClass('overflow-y-hidden')
})

// Randomize hero banner visual
$(document).ready(function () {
  const $images = $('.imageContainerBlob .figureImage')
  const randomIndex = Math.floor(Math.random() * $images.length)
  $images.eq(randomIndex).show()
})

// Menu items color change
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() >= 50) {
      $('.wrapper--menu').addClass('scrolled')
    } else {
      $('.wrapper--menu').removeClass('scrolled')
    }
  })
})

// Menu show/hide
// $(document).ready(function () {
//   let prev = 0
//   const $window = $(window)
//   const nav = $('.wrapper--menu')

//   $window.on('scroll', function () {
//     const scrollTop = $window.scrollTop()
//     nav.toggleClass('disappear', scrollTop > prev)
//     prev = scrollTop
//   })
// })

// Menu show/hide Safari proof
// $(document).ready(function () {
//   let prev = 0
//   const $window = $(window)
//   const nav = $('.wrapper--menu')
//   const tolerance = 2 // Tolerance to handle Safari precision issues

//   $window.on('scroll', function () {
//     const scrollTop = $window.scrollTop()

//     // Add a tolerance to avoid minor precision issues
//     if (Math.abs(scrollTop - prev) > tolerance) {
//       nav.toggleClass('disappear', scrollTop > prev)
//       prev = scrollTop
//     }

//     // Ensure the menu reappears at the top
//     if (scrollTop === 0) {
//       nav.removeClass('disappear')
//     }
//   })
// })

// Parallax Effect
const body = document.body

// Add mousemove event listener to the body
body.addEventListener('mousemove', parallaxEffect)

function parallaxEffect (e) {
  // Calculate relative mouse position
  const { clientX, clientY } = e
  const centerX = window.innerWidth / 2
  const centerY = window.innerHeight / 2

  // Calculate movement amounts based on distance from center
  const moveX = (clientX - centerX) / centerX
  const moveY = (clientY - centerY) / centerY

  // Apply transformations to parallaxed elements
  const parallaxed = document.querySelectorAll('.parallaxed')
  parallaxed.forEach(element => {
    const intensity = 20 // Adjust movement intensity
    const offsetX = moveX * intensity
    const offsetY = moveY * intensity

    element.style.transform = `translate(${offsetX}px, ${offsetY}px)`
  })

  // Apply transformations to figureImage
  const figureImage = document.querySelectorAll('.figureImageImage')
  figureImage.forEach(element => {
    const intensity = 5 // Different intensity for background image
    const offsetX = moveX * intensity
    const offsetY = moveY * intensity

    element.style.transform = `translate(${offsetX}px, ${offsetY}px)`
  })
}

// Countdown
$(document).ready(function () {
  function countdownTo (targetDate) {
    const target = new Date(targetDate).getTime()

    function updateCountdown () {
      const now = new Date().getTime()
      const difference = target - now

      if (difference <= 0) {
        $('.countdown').text('The date has passed!')
        clearInterval(interval)
        return
      }

      const days = Math.floor(difference / (1000 * 60 * 60 * 24))
      // const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
      // const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60))
      // const seconds = Math.floor((difference % (1000 * 60)) / 1000)

      $('.countdown').text(`Noch ${days} Tage bis zum Zero Waste Spieltag`)
    }

    const interval = setInterval(updateCountdown, 1000)
    updateCountdown()
  }

  // Start the countdown to September 15, 2025
  countdownTo('2025-09-15T00:00:00')
})
