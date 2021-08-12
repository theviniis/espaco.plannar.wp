document.addEventListener("DOMContentLoaded", function () {
  // Simple Anime
  AOS.init({
    useClassNames: true,
  });

  // Splide Banner
  new Splide(".banner", {
    pagination: false,
    type: "loop",
    classes: {
      arrows: "splide__arrows custom-arrows",
    },
  }).mount();

  // Splide Depoimentos
  new Splide(".depoimentos", {
    easing: "ease-in-out",
    focus: "center",
    gap: "4rem",
    updateOnMove: true,
    pagination: false,
    perPage: 2,
    start: 1,
    trimSpace: false,
    type: "slide",
    classes: {
      arrows: "splide__arrows custom-arrows",
    },
    breakpoints: {
      600: {
        perPage: 1,
      },
    },
  }).mount();

  // Splide servicos
  new Splide(".servicos", {
    focus: "center",
    start: 2,
    perPage: 3,
    gap: "10ch",
    pagination: false,
    updateOnMove: true,
    autoHeight: true,
    type: "loop",
    padding: {
      left: "30ch",
      right: "30ch",
    },
    classes: {
      arrows: "splide__arrows custom-arrows",
    },
    breakpoints: {
      1600: {
        perPage: 3,
        padding: {
          left: "20ch",
          right: "20ch",
        },
      },
      1200: {
        perPage: 2,
      },
      900: {
        perPage: 1,
      },
      600: {
        start: 1,
        perPage: 1,
        padding: {
          left: "0",
          right: "0",
        },
      },
    },
  }).mount();

  // Header Sticky
  window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
  });

  // Mobile Menu
  function toggleMenu() {
    menu.classList.toggle("is-active");
    mobileMenu.classList.toggle("is-active");
  }
  const mobileMenu = document.getElementById("hamburger-icon");
  const menu = document.querySelector(".menu");

  const closeMenu = document.querySelectorAll(".menu > li > a");
  mobileMenu.addEventListener("click", toggleMenu);
  closeMenu.forEach((link) =>
    link.addEventListener("click", function () {
      if (menu.classList.contains("is-active")) {
        return toggleMenu();
      }
    }),
  );

  window.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && menu.classList.contains("is-active")) {
      return toggleMenu();
    }
  });

  // Modal
  const modal = document.querySelector(".modal");
  const modalBtn = document.querySelector(".investimento button");
  const modalClose = document.querySelector(".modal span");
  function toggleModal() {
    const overflow = document.body.style.overflow === "hidden";
    modal.classList.toggle("is-active");
    overflow
      ? (document.body.style.overflow = "hidden")
      : (document.body.style.overflow = "initial");
  }
  modalBtn.addEventListener("click", toggleModal);
  modalClose.addEventListener("click", toggleModal);
  window.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modal.classList.contains("is-active")) {
      return toggleModal();
    }
  });

  var scene = document.getElementById("scene");
  var scene1 = document.getElementById("investimento-scene");

  var parallaxInstance = new Parallax(scene);
  var parallaxInstance = new Parallax(scene1);

  // Agendamento
  const agendamentoBtn = document.querySelector(".servicos .btn");
  const agendamentoModal = document.querySelector(".modal_bg");
  const agendamentoBtnClose = document.querySelector(
    ".modal_bg .material-icons",
  );
  agendamentoBtn.addEventListener("click", function () {
    console.log("agendamento");
    agendamentoModal.classList.toggle("is-active");
  });
  agendamentoBtnClose.addEventListener("click", function () {
    agendamentoModal.classList.toggle("is-active");
  });

  document.querySelector(".eapps-link").style.zIndex = 0;
});
