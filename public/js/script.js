// === gallery-and-site.js (gabungan, sudah diperbaiki) ===
document.addEventListener("DOMContentLoaded", () => {
    /* -------------------------
     Helper: safe query
     ------------------------- */
    const $ = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));

    /* =========================
     1) COUNTER (IntersectionObserver)
     ========================= */
    (() => {
        const counters = $$(".counter");
        if (!counters.length) return;

        const startCount = (el) => {
            const target = +el.getAttribute("data-target") || 0;
            const duration = 1500;
            const stepTime = 20;
            const steps = Math.max(1, Math.floor(duration / stepTime));
            const increment = target / steps;
            let current = 0;
            const tick = () => {
                current += increment;
                if (current < target) {
                    el.innerText = Math.ceil(current);
                    setTimeout(tick, stepTime);
                } else {
                    el.innerText = target + "+";
                }
            };
            tick();
        };

        const io = new IntersectionObserver(
            (entries, obs) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const group = entry.target;
                        $$(".counter", group).forEach((c) => startCount(c));
                        obs.unobserve(group);
                    }
                });
            },
            { threshold: 0.4 }
        );

        // target container could be .bg-blue-statistik or individual counters' container
        const statSection =
            document.querySelector(".bg-blue-statistik") ||
            counters[0].parentElement;
        if (statSection) io.observe(statSection);
    })();

    /* =========================
     2) SMOOTH SCROLL (with offset for fixed navbar)
     ========================= */
    (() => {
        const OFFSET = 100; // adjust sesuai tinggi navbar fixed
        $$('a[href^="#"]').forEach((link) => {
            link.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (!href || href === "#") return;
                const target = document.querySelector(href);
                if (!target) return;
                e.preventDefault();
                const top =
                    target.getBoundingClientRect().top +
                    window.scrollY -
                    OFFSET;
                window.scrollTo({ top, behavior: "smooth" });
            });
        });
    })();

    /* =========================
     3) NAVBAR ACTIVE (IntersectionObserver)
     ========================= */
    (() => {
        const sections = $$("section[id]");
        const navLinks = $$(".navbar .nav-link");
        if (!sections.length || !navLinks.length) return;

        const mapHrefToLink = {};
        navLinks.forEach((link) => {
            const href = link.getAttribute("href");
            if (href && href.startsWith("#"))
                mapHrefToLink[href.slice(1)] = link;
        });

        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute("id");
                        Object.values(mapHrefToLink).forEach((l) =>
                            l.classList.remove("active")
                        );
                        const activeLink = mapHrefToLink[id];
                        if (activeLink) activeLink.classList.add("active");
                    }
                });
            },
            {
                root: null,
                threshold: 0.35,
                rootMargin: "-120px 0px -40% 0px",
            }
        );

        sections.forEach((s) => io.observe(s));
    })();

    /* =========================
     4) GALLERY: infinite loop, auto-scroll, drag, thumbnails, modal
     ========================= */
    /* =========================
     4) INFINITE SLIDER LOGIC (Reusable)
     ========================= */
    const initInfiniteSlider = (selector, velocity = 0.25) => {
        const scrollArea = $(selector);
        if (!scrollArea) return;

        // grab original items (live children may change after clone)
        const originalItems = Array.from(scrollArea.children);
        if (!originalItems.length) return;

        // compute original width (sum of offsetWidth + gaps)
        const style = getComputedStyle(scrollArea);
        const gap = parseFloat(style.columnGap || style.gap || 0);
        const originalWidth = originalItems.reduce(
            (sum, el) => sum + el.offsetWidth + gap,
            0
        );

        // clone each original item once and append (so total = 2 * originals)
        originalItems.forEach((it) => {
            const clone = it.cloneNode(true);
            scrollArea.appendChild(clone);
        });

        // start at originalWidth to place user in middle of loop
        scrollArea.scrollLeft = originalWidth;

        /* Auto-scroll using requestAnimationFrame */
        let playing = true;
        let rafId = null;

        const step = () => {
            if (playing) {
                scrollArea.scrollLeft += velocity;
                // wrap logic
                if (scrollArea.scrollLeft >= originalWidth * 2) {
                    scrollArea.scrollLeft -= originalWidth;
                } else if (scrollArea.scrollLeft <= 0) {
                    scrollArea.scrollLeft += originalWidth;
                }
            }
            rafId = requestAnimationFrame(step);
        };
        rafId = requestAnimationFrame(step);

        /* Pause auto-scroll on user interaction */
        const pause = () => { playing = false; };
        const resume = () => { playing = true; };

        scrollArea.addEventListener("mouseenter", pause);
        scrollArea.addEventListener("mouseleave", resume);

        /* Pointer drag (works for mouse + touch) */
        let isDown = false;
        let startX = 0;
        let startScroll = 0;
        let isDragging = false;

        scrollArea.addEventListener("pointerdown", (e) => {
            isDown = true;
            isDragging = false;
            startX = e.clientX;
            startScroll = scrollArea.scrollLeft;
            pause();
        });

        scrollArea.addEventListener("pointermove", (e) => {
            if (!isDown) return;
            const dx = e.clientX - startX;
            
            if (Math.abs(dx) > 5) isDragging = true;

            scrollArea.scrollLeft = startScroll - dx;
            if (scrollArea.scrollLeft >= originalWidth * 2)
                scrollArea.scrollLeft -= originalWidth;
            if (scrollArea.scrollLeft <= 0)
                scrollArea.scrollLeft += originalWidth;
        });

        const release = (e) => {
            if (!isDown) return;
            isDown = false;
            resume();
        };

        scrollArea.addEventListener("pointerup", release);
        scrollArea.addEventListener("pointercancel", release);
        scrollArea.addEventListener("pointerleave", (e) => {
            if (isDown) release(e);
        });

        // Return state/methods if needed externally
        return { isDragging };
    };

    // Initialize Gallery Slider
    initInfiniteSlider(".galeri-scroll", 0.5);

    // Initialize Alumni Slider
    // initInfiniteSlider(".alumni-scroll", 0.4);

    /* =========================
     Alumni Focus Effect (Infinite Loop & Center Start)
     ========================= */
    /* =========================
     Alumni Focus Effect (Infinite Loop & Center Start)
     ========================= */
    const initAlumniFocus = () => {
        const scrollArea = $(".alumni-scroll");
        if (!scrollArea) return;

        let items = $$(".alumni-item", scrollArea);
        const originalCount = items.length;
        if (originalCount === 0) return;

        // 1. Clone items for infinite loop if not already cloned
        if (!scrollArea.querySelector(".clone")) {
            const clonesA = items.map(item => item.cloneNode(true));
            const clonesC = items.map(item => item.cloneNode(true));

            clonesA.reverse().forEach(clone => {
                clone.classList.add("clone");
                scrollArea.insertBefore(clone, scrollArea.firstChild);
            });

            clonesC.forEach(clone => {
                clone.classList.add("clone");
                scrollArea.appendChild(clone);
            });
        }

        // Re-query items and cards
        items = $$(".alumni-item", scrollArea);
        const cards = $$(".alumni-card", scrollArea);
        
        // State variables
        let itemWidth, setWidth;

        // Function to update dimensions
        const updateDimensions = () => {
            const itemStyle = window.getComputedStyle(items[0]);
            const containerStyle = window.getComputedStyle(scrollArea);
            const gap = parseFloat(containerStyle.columnGap || containerStyle.gap || "0");
            itemWidth = items[0].offsetWidth + gap; 
            setWidth = itemWidth * originalCount;
        };

        // Initial calculation
        updateDimensions();

        // 2. Set Initial Scroll Position
        const middleIndex = Math.floor(originalCount / 2); 
        const startScrollPos = (originalCount + middleIndex) * itemWidth;
        
        scrollArea.style.scrollSnapType = "none";
        scrollArea.scrollLeft = startScrollPos;
        scrollArea.style.scrollSnapType = "x mandatory";

        // 3. Focus Logic
        const updateFocus = () => {
            const center = scrollArea.scrollLeft + (scrollArea.clientWidth / 2);
            let closest = null;
            let minDiff = Infinity;

            items.forEach((item, index) => {
                const itemCenter = item.offsetLeft + (item.offsetWidth / 2);
                const diff = Math.abs(center - itemCenter);

                if (diff < minDiff) {
                    minDiff = diff;
                    closest = cards[index];
                }
            });

            if (closest) {
                cards.forEach(c => c.classList.remove("active"));
                closest.classList.add("active");
            }
        };

        // 4. Infinite Scroll Logic (Jump)
        const handleScroll = () => {
            const currentScroll = scrollArea.scrollLeft;
            
            if (currentScroll < setWidth - itemWidth) {
                scrollArea.style.scrollSnapType = "none"; 
                scrollArea.scrollLeft += setWidth;
                scrollArea.style.scrollSnapType = "x mandatory"; 
            } else if (currentScroll > (2 * setWidth) - itemWidth) {
                scrollArea.style.scrollSnapType = "none";
                scrollArea.scrollLeft -= setWidth;
                scrollArea.style.scrollSnapType = "x mandatory";
            }

            window.requestAnimationFrame(updateFocus);
        };

        updateFocus();
        scrollArea.addEventListener("scroll", handleScroll);

        // 5. Handle Resize
        window.addEventListener("resize", () => {
            updateDimensions();
            updateFocus();
        });
    };

    initAlumniFocus();


    /* =========================
     5) GALLERY LIGHTBOX & INTERACTION
     ========================= */
    (() => {
        const scrollArea = $(".galeri-scroll");
        const modal = $("#imgModal");
        const modalImg = $("#imgFull");
        
        if (scrollArea && modal && modalImg) {
             // event delegation on scrollArea to handle both originals & clones
             scrollArea.addEventListener("click", (e) => {
                const link = e.target.closest(".galeri-link");
                if (link) {
                    e.preventDefault();
                    modal.style.display = "block";
                    modalImg.src = link.href;
                    
                    // Set caption
                    const captionText = link.getAttribute('data-caption');
                    const captionEl = document.getElementById('caption');
                    if (captionEl) {
                        captionEl.innerText = captionText || '';
                    }
                    return;
                }
            });

            // Close Modal Logic
            const closeBtn = modal.querySelector(".close");
            if (closeBtn) {
                closeBtn.addEventListener("click", () => {
                    modal.style.display = "none";
                });
            }

            // Close when clicking outside the image
            modal.addEventListener("click", (e) => {
                if (e.target === modal || e.target.id === "caption") {
                    modal.style.display = "none";
                }
            });
        }
    })();


    /* =========================
     5) IMAGE PRELOAD (optional safety for layout)
     ========================= */
    // small helper: ensure images loaded to compute widths correct (already mostly handled by DOMContentLoaded)
    // can be extended if layout jump observed

    /* =========================
     6) CLEANUP on unload (cancel RAF)
     ========================= */
    window.addEventListener("beforeunload", () => {
        // cancel any RAF if needed (we kept rafId var inside closure so not globally accessible)
        // Not strictly necessary, browser cleans up, but left for completeness
    });
}); // end DOMContentLoaded
