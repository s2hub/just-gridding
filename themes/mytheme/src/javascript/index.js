import Swiper from "swiper";
import GLightbox from "glightbox";
import { Autoplay, Navigation } from "swiper/modules";

document.addEventListener("DOMContentLoaded", function (event) {
  //Lightbox
  const lightbox = GLightbox({
    selector: "[data-gallery]",
    touchNavigation: true,
    loop: true,
  });

  // init Swiper:
  const swiperElements = document.querySelectorAll(".swiper");
  swiperElements.forEach((swiperElement) => {
    const nextEl =
      swiperElement.parentElement?.querySelector(".swiper-button-next") ||
      undefined;
    const prevEl =
      swiperElement.parentElement?.querySelector(".swiper-button-prev") ||
      undefined;
    const paginationEl =
      swiperElement.querySelector(".swiper-pagination") || undefined;

    const opts = {
      modules: [Navigation],
      direction: "horizontal",
      loop: false,
    };

    if (paginationEl) {
      opts.pagination = { el: paginationEl };
    }

    // Navigation nur setzen, wenn mind. eines der Elemente existiert
    if (nextEl || prevEl) {
      opts.navigation = { nextEl, prevEl };
    }

    new Swiper(swiperElement, opts);
  });

  const autoSwiperElements = document.querySelectorAll(".autoswiper");
  autoSwiperElements.forEach((autoSwiperElement) => {
    const autoSwiper = new Swiper(autoSwiperElement, {
      // configure Swiper to use modules
      modules: [Autoplay],
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      // direction: 'horizontal',
      loop: true,
      autoplay: {
        delay: 5000,
      },
      speed: 1000,
    });
  });

  // Static Navigation
  const staticNav = document.querySelector("header");
  const staticNavHeight = staticNav.offsetHeight;
  var lastScrollHeight = 0;

  // Ensure content starts below the fixed header on mobile
  function applyHeaderOffset() {
    if (!staticNav) return;
    const body = document.body;
    const isMobile = window.innerWidth < 1024; // Tailwind lg breakpoint
    if (isMobile) {
      body.style.paddingTop = staticNav.offsetHeight + "px";
    } else {
      // Remove offset on larger screens if not needed
      body.style.paddingTop = "";
    }
  }

  // Apply on load
  applyHeaderOffset();
  // Re-apply on resize (orientation change, viewport changes)
  window.addEventListener("resize", applyHeaderOffset);
  // Re-apply if header height changes due to dynamic content
  if (window.ResizeObserver && staticNav) {
    const ro = new ResizeObserver(() => applyHeaderOffset());
    ro.observe(staticNav);
  }

  window.addEventListener("scroll", function (event) {
    // console.log("Scrolling...");
    if (window.scrollY > staticNavHeight) {
      // console.log("should hide");
      if (
        lastScrollHeight > window.scrollY &&
        window.scrollY > staticNavHeight * 2
      ) {
        staticNav.classList.remove("hide");
        lastScrollHeight = window.scrollY;
      } else {
        staticNav.classList.add("hide");
        lastScrollHeight = window.scrollY;
      }
    } else {
      if (window.scrollY < lastScrollHeight - staticNavHeight) {
        staticNav.classList.remove("hide");
        lastScrollHeight = window.scrollY;
      }
    }
  });
});
