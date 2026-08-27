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
    let footerVisible = false;

    function handleScroll() {
        const scrolled = window.scrollY > 40;
        if (navbar) navbar.classList.toggle("scrolled", scrolled);
        if (backToTop)
            backToTop.classList.toggle(
                "visible",
                window.scrollY > 400 && !footerVisible,
            );
    }

    // Sembunyikan tombol back-to-top saat footer (termasuk peta) terlihat,
    // supaya tombol tidak menutupi/menghalangi peta atau link footer di mobile.
    const footerEl = document.getElementById("kontak");
    if (footerEl && backToTop && "IntersectionObserver" in window) {
        const footerObserver = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    footerVisible = entry.isIntersecting;
                    handleScroll();
                });
            },
            { threshold: 0.05 },
        );
        footerObserver.observe(footerEl);
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

    // ==========================================================
    // HERO SPOTLIGHT — cahaya kecil mengikuti kursor/sentuhan
    // untuk membantu "menerangi" foto hero yang agak gelap
    // ==========================================================
    const heroSection = document.querySelector(".hero");
    const heroSpotlight = document.getElementById("heroSpotlight");

    if (heroSection && heroSpotlight) {
        function moveSpotlight(clientX, clientY) {
            const rect = heroSection.getBoundingClientRect();
            const x = ((clientX - rect.left) / rect.width) * 100;
            const y = ((clientY - rect.top) / rect.height) * 100;
            heroSpotlight.style.setProperty("--spot-x", x + "%");
            heroSpotlight.style.setProperty("--spot-y", y + "%");
            heroSpotlight.classList.add("active");
        }

        // Desktop: ikuti gerakan mouse
        heroSection.addEventListener("mousemove", function (e) {
            moveSpotlight(e.clientX, e.clientY);
        });
        heroSection.addEventListener("mouseleave", function () {
            heroSpotlight.classList.remove("active");
        });

        // Mobile/tablet: ikuti sentuhan jari
        heroSection.addEventListener(
            "touchmove",
            function (e) {
                if (e.touches && e.touches[0]) {
                    moveSpotlight(e.touches[0].clientX, e.touches[0].clientY);
                }
            },
            { passive: true },
        );
        heroSection.addEventListener("touchend", function () {
            heroSpotlight.classList.remove("active");
        });
    }

    // ==========================================================
    // COVERFLOW JURUSAN — kartu tengah fokus, kartu lain
    // berderet miring & mengecil ke belakang kiri/kanan
    // ==========================================================
    const coverflowTrack = document.getElementById("coverflowTrack");

    if (coverflowTrack) {
        const items = Array.from(
            coverflowTrack.querySelectorAll(".coverflow-item"),
        );
        const total = items.length;
        const dotsWrap = document.getElementById("coverflowDots");
        const dots = dotsWrap
            ? Array.from(dotsWrap.querySelectorAll(".coverflow-dot"))
            : [];
        const stage = document.querySelector(".coverflow-stage");

        let active = 0;

        function getBreakpoint() {
            const w = window.innerWidth;
            if (w <= 480) return "xs";
            if (w <= 767) return "sm";
            return "md";
        }

        const settings = {
            xs: { spacing: 145, rotate: 26, depth: 115, scaleStep: 0.16 },
            sm: { spacing: 195, rotate: 28, depth: 145, scaleStep: 0.15 },
            md: { spacing: 280, rotate: 32, depth: 180, scaleStep: 0.14 },
        };

        function shortestDiff(i, from) {
            let diff = i - from;
            if (diff > total / 2) diff -= total;
            if (diff < -total / 2) diff += total;
            return diff;
        }

        // Batas jarak (dari kartu aktif) yang masih ditampilkan.
        // 1 = hanya kartu aktif + satu tetangga kiri & satu kanan yang terlihat;
        // sisanya disembunyikan (opacity 0) di belakang, tidak ikut terlihat/diklik.
        const VISIBLE_RANGE = 1;

        function render() {
            const cfg = settings[getBreakpoint()];

            items.forEach(function (item, i) {
                const diff = shortestDiff(i, active);
                const abs = Math.abs(diff);
                const hidden = abs > VISIBLE_RANGE;

                const translateX = diff * cfg.spacing;
                const translateZ = -abs * cfg.depth;
                const rotateY =
                    diff === 0 ? 0 : diff > 0 ? -cfg.rotate : cfg.rotate;
                const scale = Math.max(1 - abs * cfg.scaleStep, 0.55);
                const opacity = hidden ? 0 : abs === 0 ? 1 : 0.85;

                item.style.transform =
                    "translateX(-50%) translateX(" +
                    translateX +
                    "px) translateZ(" +
                    translateZ +
                    "px) rotateY(" +
                    rotateY +
                    "deg) scale(" +
                    scale +
                    ")";
                item.style.opacity = opacity;
                item.style.zIndex = 100 - abs;
                item.style.pointerEvents = hidden ? "none" : "auto";
                item.classList.toggle("is-active", diff === 0);
            });

            dots.forEach(function (dot, i) {
                dot.classList.toggle("is-active", i === active);
            });
        }

        function goTo(index) {
            active = ((index % total) + total) % total;
            render();
        }

        // Klik langsung pada kartu (mouse maupun sentuh) untuk memilihnya.
        //
        // Catatan teknis: kartu di sini di-transform secara 3D (rotateY +
        // translateZ di bawah perspective). Sebagian browser kurang akurat
        // saat menentukan elemen yang "kena" klik pada objek yang diputar/
        // didorong ke belakang secara 3D, sehingga deteksi klik bawaan
        // (event.target) bisa meleset dari kartu yang terlihat.
        //
        // Solusinya: hitung sendiri posisi kartu di layar lewat
        // getBoundingClientRect() (akurat & konsisten di semua browser,
        // termasuk untuk elemen yang di-transform), lalu cocokkan manual
        // dengan koordinat klik.
        coverflowTrack.addEventListener("click", function (e) {
            const clickX = e.clientX;
            const clickY = e.clientY;
            let bestMatch = null;
            let bestAbs = Infinity;

            items.forEach(function (item, i) {
                const diffCheck = Math.abs(shortestDiff(i, active));
                if (diffCheck > VISIBLE_RANGE) return; // lewati kartu yang tersembunyi

                const rect = item.getBoundingClientRect();
                const inside =
                    clickX >= rect.left &&
                    clickX <= rect.right &&
                    clickY >= rect.top &&
                    clickY <= rect.bottom;

                if (inside && diffCheck < bestAbs) {
                    bestAbs = diffCheck;
                    bestMatch = i;
                }
            });

            if (bestMatch !== null && bestMatch !== active) {
                e.preventDefault();
                goTo(bestMatch);
            }
        });

        dots.forEach(function (dot, i) {
            dot.addEventListener("click", function () {
                goTo(i);
            });
        });

        if (stage) {
            stage.setAttribute("tabindex", "0");
            stage.addEventListener("keydown", function (e) {
                if (e.key === "ArrowRight") goTo(active + 1);
                if (e.key === "ArrowLeft") goTo(active - 1);
            });
        }

        // Swipe untuk mobile/tablet
        let touchStartX = 0;
        coverflowTrack.addEventListener(
            "touchstart",
            function (e) {
                touchStartX = e.touches[0].clientX;
            },
            { passive: true },
        );
        coverflowTrack.addEventListener(
            "touchend",
            function (e) {
                const dx = e.changedTouches[0].clientX - touchStartX;
                if (Math.abs(dx) > 40) {
                    dx < 0 ? goTo(active + 1) : goTo(active - 1);
                }
            },
            { passive: true },
        );

        let resizeTimer;
        window.addEventListener("resize", function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(render, 150);
        });

        render();
    }
});
