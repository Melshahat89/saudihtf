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
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const mobileMenu = document.querySelector(".mobile-menu");

  if (hamburger) {
    hamburger.addEventListener("click", toggleMenu);
  } else {
    console.warn("Hamburger element not found in the DOM.");
  }

  if (mobileMenu) {
    mobileMenu.addEventListener("click", (event) => {
      event.stopPropagation();
    });
  } else {
    console.warn("Mobile menu element not found in the DOM.");
  }
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

const partnersSwiper = new Swiper(".partners-section__image .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  autoHeight: true,
  slidesPerView: 5,
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
    el: ".our-partners-section .swiper-pagination",
    clickable: true,
  },
});

const testimonialsSwiper = new Swiper(".testimonials-section .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  autoHeight: true,
  slidesPerView: 3,
  spaceBetween: 40,
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
  // If we need pagination
  pagination: {
    el: ".testimonials-section .swiper-pagination",
    clickable: true,
  },
});

const innerFeaturesSwiper = new Swiper(".inner-features-section .swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  autoHeight: true,
  slidesPerView: 3,
  spaceBetween: 40,
  breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
  // If we need pagination
  pagination: {
    el: ".inner-features-section .swiper-pagination",
    clickable: true,
  },
});

const businessFeaturesSwiper = new Swiper(
  ".business-features-section .swiper",
  {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    autoHeight: true,
    slidesPerView: 3,
    spaceBetween: 40,
    breakpoints: {
      "@0.00": {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      "@0.75": {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      "@1.00": {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      "@1.50": {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
    // If we need pagination
    pagination: {
      el: ".business-features-section .swiper-pagination",
      clickable: true,
    },
  }
);

const professionalCertificatesSwiper = new Swiper(
  ".professional-certificates-section .swiper",
  {
    // Optional parameters
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    slidesPerView: 5,
    grid: {
      rows: 2,
    },
    spaceBetween: 10,
    breakpoints: {
      "@0.00": {
        slidesPerView: 1,
        spaceBetween: 20,
        grid: {
          rows: 1,
        },
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 40,
        grid: {
          rows: 2,
        },
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 50,
        grid: {
          rows: 2,
        },
      },
      1300: {
        slidesPerView: 5,
        spaceBetween: 50,
        grid: {
          rows: 2,
        },
      },
    },
    // Add navigation configuration
    navigation: {
      nextEl:
        ".professional-certificates-section .swiper-button-container .button-next",
      prevEl:
        ".professional-certificates-section .swiper-button-container .button-prev",
    },

    // Modify pagination to be disabled on mobile
    pagination: {
      el: ".professional-certificates-section .swiper-pagination",
      clickable: true,
      enabled: window.innerWidth >= 768, // Disable pagination below 768px
    },

    // Add resize handler to toggle pagination
    on: {
      resize: function () {
        this.pagination.enabled = window.innerWidth >= 768;
        this.pagination.render();
        this.pagination.update();
      },
    },
  }
);
