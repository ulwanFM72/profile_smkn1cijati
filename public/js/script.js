document.addEventListener("DOMContentLoaded", function () {
    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 700,
            once: true,
            offset: 60,
            easing: "ease-out-cubic",
        });
    }

    const navbar = document.getElementById("mainNavbar");
    const backToTop = document.querySelector(".back-to-top");

    function handleScroll() {
        const scrolled = window.scrollY > 40;
        if (navbar) navbar.classList.toggle("scrolled", scrolled);
        if (backToTop)
            backToTop.classList.toggle("visible", window.scrollY > 400);
    }

    window.addEventListener("scroll", handleScroll);
    handleScroll();

    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            if (targetId.length > 1) {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                    const navMenu = document.getElementById("navMenu");
                    if (navMenu && navMenu.classList.contains("show")) {
                        const bsCollapse =
                            bootstrap.Collapse.getOrCreateInstance(navMenu);
                        bsCollapse.hide();
                    }
                }
            }
        });
    });

    if (backToTop) {
        backToTop.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    const counters = document.querySelectorAll(".counter");

    if (counters.length && "IntersectionObserver" in window) {
        const runCounter = function (el) {
            const target = parseInt(el.getAttribute("data-target"), 10) || 0;
            const duration = 1500;
            const startTime = performance.now();

            function tick(now) {
                const progress = Math.min((now - startTime) / duration, 1);
                const eased = 1 - (1 - progress) * (1 - progress);
                el.textContent = Math.floor(eased * target);

                if (progress < 1) {
                    requestAnimationFrame(tick);
                } else {
                    el.textContent = target;
                }
            }

            requestAnimationFrame(tick);
        };

        const counterObserver = new IntersectionObserver(
            function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting && !entry.target.dataset.counted) {
                        entry.target.dataset.counted = "true";
                        runCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.4 },
        );

        counters.forEach(function (counter) {
            counterObserver.observe(counter);
        });
    } else {
        counters.forEach(function (el) {
            el.textContent = el.getAttribute("data-target") || "0";
        });
    }

    const lightboxOverlay = document.getElementById("lightboxOverlay");
    const lightboxImage = document.getElementById("lightboxImage");
    const lightboxCaption = document.getElementById("lightboxCaption");
    const lightboxClose = document.getElementById("lightboxClose");
    const lightboxTriggers = document.querySelectorAll("[data-lightbox]");

    function openLightbox(imgSrc, caption) {
        if (!lightboxOverlay) return;
        lightboxImage.src = imgSrc;
        lightboxImage.alt = caption || "";
        lightboxCaption.textContent = caption || "";
        lightboxOverlay.classList.add("active");
        document.body.style.overflow = "hidden";
    }

    function closeLightbox() {
        if (!lightboxOverlay) return;
        lightboxOverlay.classList.remove("active");
        document.body.style.overflow = "";
    }

    lightboxTriggers.forEach(function (trigger) {
        trigger.addEventListener("click", function () {
            openLightbox(
                this.getAttribute("data-img"),
                this.getAttribute("data-caption"),
            );
        });
    });

    if (lightboxClose) lightboxClose.addEventListener("click", closeLightbox);

    if (lightboxOverlay) {
        lightboxOverlay.addEventListener("click", function (e) {
            if (e.target === lightboxOverlay) closeLightbox();
        });
    }

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closeLightbox();
    });

    const filterButtons = document.querySelectorAll(".filter-btn");
    const galeriItems = document.querySelectorAll(".galeri-item");
    const galeriEmptyState = document.getElementById("galeriEmptyState");

    if (filterButtons.length && galeriItems.length) {
        filterButtons.forEach(function (btn) {
            btn.addEventListener("click", function () {
                filterButtons.forEach(function (b) {
                    b.classList.remove("active");
                });
                this.classList.add("active");

                const filter = this.getAttribute("data-filter");
                let visibleCount = 0;

                galeriItems.forEach(function (item) {
                    const match =
                        filter === "semua" ||
                        item.getAttribute("data-kategori") === filter;
                    item.classList.toggle("filtered-out", !match);
                    if (match) visibleCount++;
                });

                if (galeriEmptyState) {
                    galeriEmptyState.classList.toggle(
                        "d-none",
                        visibleCount > 0,
                    );
                }
            });
        });
    }
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("passwordInput");
    const toggleIcon = document.getElementById("toggleIcon");

    if (togglePassword && passwordInput && toggleIcon) {
        togglePassword.addEventListener("click", function () {
            const isHidden = passwordInput.type === "password";
            passwordInput.type = isHidden ? "text" : "password";
            toggleIcon.classList.toggle("bi-eye-fill", !isHidden);
            toggleIcon.classList.toggle("bi-eye-slash-fill", isHidden);
        });
    }

    // ==========================================================
    // LIHAT SELENGKAPNYA — Grid Guru & Staf Pengajar
    // ==========================================================
    const btnGuruMore = document.getElementById("btnGuruMore");

    if (btnGuruMore) {
        btnGuruMore.addEventListener("click", function () {
            const isExpanding =
                document.querySelectorAll(".guru-extra.d-none").length > 0;

            document.querySelectorAll(".guru-extra").forEach(function (card) {
                card.classList.toggle("d-none", !isExpanding);
            });

            if (isExpanding) {
                btnGuruMore.innerHTML =
                    'Tampilkan Lebih Sedikit <i class="bi bi-chevron-up"></i>';
            } else {
                btnGuruMore.innerHTML =
                    'Lihat Selengkapnya <i class="bi bi-chevron-down"></i>';
                document
                    .getElementById("guruGrid")
                    .scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    }
});
