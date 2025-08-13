// Selecting elements
const hamburger = document.querySelector(".hamburger");
const mobileMenu = document.querySelector(".mobile-menu");

// Function to toggle menu
function toggleMenu() {
  hamburger.classList.toggle("hamburger--active");
  mobileMenu.classList.toggle("mobile-menu--active");
  document.body.classList.toggle("overflow-hidden"); // Prevents scrolling when menu is open
}

// Add click event listener for opening/closing menu
hamburger.addEventListener("click", toggleMenu);

// Prevent menu from closing when clicking inside it
mobileMenu.addEventListener("click", (event) => {
  event.stopPropagation();
});

// Close menu only when clicking on the `hamburger` icon
document.addEventListener("click", (event) => {
  if (
    hamburger.classList.contains("hamburger--active") &&
    !hamburger.contains(event.target)
  ) {
    toggleMenu();
  }
});

const heroSwiper = new Swiper(".hero-section__image .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  // If we need pagination
  pagination: {
    el: ".hero-section__image .swiper-pagination",
    clickable: true,
  },
});

const coursesSwiper = new Swiper(".top-courses-slider .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  slidesPerView: 4,
  spaceBetween: 20,
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },

  // Navigation arrows
  navigation: {
    nextEl: ".top-courses-slider .button-next",
    prevEl: ".top-courses-slider .button-prev",
  },
});

const suggestCoursesSwiper = new Swiper(".suggest-courses-slider .swiper", {
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },

  // Default settings (desktop view)
  slidesPerView: 3,
  spaceBetween: 10,

  navigation: {
    nextEl: ".suggest-courses-slider .button-next",
    prevEl: ".suggest-courses-slider .button-prev",
  },

  // Mobile settings (use horizontal direction and pagination)
  breakpoints: {
    0: {
      direction: "horizontal",
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        el: ".suggest-courses-slider .swiper-pagination",
        clickable: true,
      },
      navigation: false, // Disable navigation buttons on mobile
    },
    768: {
      direction: "vertical",
      slidesPerView: 3,
      spaceBetween: 10,
      pagination: false, // Remove pagination on desktop
      navigation: {
        nextEl: ".suggest-courses-slider .button-next",
        prevEl: ".suggest-courses-slider .button-prev",
      },
    },
  },
});

const partnersSwiper = new Swiper(".partners-section__image .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  slidesPerView: 6,
  spaceBetween: 40,
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 5,
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 6,
      spaceBetween: 20,
    },
  },
  // If we need pagination
  pagination: {
    el: ".our-partners-section .swiper-pagination",
    clickable: true,
  },
});

const instructorsSwiper = new Swiper(".instructors-section .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  slidesPerView: 4,
  spaceBetween: 40,
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 5,
      spaceBetween: 20,
    },
  },
  // If we need pagination
  pagination: {
    el: ".instructors-section .swiper-pagination",
    clickable: true,
  },
});

const SpecialitieSslider = new Swiper(".specialities-section .swiper", {
  // Optional parameters
  direction: "horizontal",
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  slidesPerView: 2,
  slidesPerColumn: 2,
  spaceBetween: 20,
  grid: {
    rows: 2,
  },
  // Navigation arrows
  navigation: {
    nextEl: ".specialities-section .button-next",
    prevEl: ".specialities-section .button-prev",
  },

  // Mobile settings (use horizontal direction and pagination)
  breakpoints: {
    0: {
      slidesPerView: 2,
      spaceBetween: 10,
      pagination: {
        el: ".specialities-section .swiper-pagination",
        clickable: true,
      },
      grid: {
        rows: 2,
      },
      navigation: false, // Disable navigation buttons on mobile
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 10,
      grid: {
        rows: 2,
      },
      pagination: false, // Remove pagination on desktop
      navigation: {
        nextEl: ".specialities-section .button-next",
        prevEl: ".specialities-section .button-prev",
      },
    },
  },
});
