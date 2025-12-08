// === gallery-and-site.js (gabungan, sudah diperbaiki) ===
document.addEventListener("DOMContentLoaded", () => {
    /* -------------------------
     Helper: safe query
     ------------------------- */
    const $ = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));

    /* =========================
     1) AUTO CLOSE NAVBAR ON MOBILE
     ========================= */
    (() => {
        const navLinks = $$(".navbar-nav .nav-link:not(.dropdown-toggle)");
        const navbarCollapse = $(".navbar-collapse");
        const navbarToggler = $(".navbar-toggler");

        navLinks.forEach(link => {
            link.addEventListener("click", () => {
                if (navbarCollapse && navbarCollapse.classList.contains("show")) {
                    // Option 1: formatting click
                    navbarToggler.click(); 
                    // Option 2: bootstrap API if available
                    // const bsCollapse = new bootstrap.Collapse(navbarCollapse, {toggle:false});
                    // bsCollapse.hide();
                }
            });
        });
    })();

    /* =========================
     2) COUNTER (IntersectionObserver)
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
     3) GALLERY INFINITE SCROLL (SMOOTH & CENTERED)
     ========================= */
    const initGallerySlider = (selector, velocity = 0.5) => {
        const scrollArea = $(selector);
        if (!scrollArea) return;
        
        // Disable smooth scrolling/snap via JS ensuring direct control
        scrollArea.style.scrollBehavior = "auto";
        scrollArea.style.scrollSnapType = "none";

        // 1. Setup Clones for Infinite Loop
        const originalItems = Array.from(scrollArea.children);
        if (!originalItems.length) return;

        // Clone enough items to fill extra space and allow smooth wrap
        // We append a full set of clones to the end
        originalItems.forEach((it) => {
            const clone = it.cloneNode(true);
            clone.classList.add('clone');
            scrollArea.appendChild(clone);
        });

        // 2. Measure One Set Width
        // Forces a reflow to ensure dimensions are correct
        const itemStyle = window.getComputedStyle(originalItems[0]);
        const gap = parseFloat(getComputedStyle(scrollArea).gap || "0");
        const singleItemWidth = originalItems[0].offsetWidth + gap;
        const totalSetWidth = singleItemWidth * originalItems.length;

        // 3. Start in the Middle (Optional: Center the view on 1st original item, or actually center)
        // If we want "Centre" like Alumni, maybe user means text alignment, but for Marquee, 
        // usually it means not starting at the very edge.
        // Let's set it to start at the beginning of the original set (which is now preceded by nothing? No we appended).
        // If we want it to look "centered", we might want to shift it. 
        // But for continuous loop, starting at 0 is fine, OR starting at totalSetWidth if we prepended.
        // Since we only appended, 0 is the start of real items. 
        // User said: "dimulai nyah dibagian tengah". 
        // Implementation: Scroll to the middle of the ENTIRE scrollable area (Original + Clones)
        // Adjust scrollLeft to (ScrollWidth / 2) - (ViewportWidth / 2)
        
        // Let's try to center the FIRST set initially if possible, or just standard 0 if it looks good.
        // But "dimulai nyah dibagian tengah" implies specific visual preference.
        // Let's try centering the first item of the original set in the viewport.
        // Actually, if we want infinite loop, we usually need clones BEFORE too if we start in middle.
        // Simpler approach for "Start Middle": Prepend clones too.
        
        originalItems.reverse().forEach((it) => {
            const clone = it.cloneNode(true);
            clone.classList.add('clone');
            scrollArea.insertBefore(clone, scrollArea.firstChild);
        });
        // Restore order for other computations if needed
        originalItems.reverse(); 

        // Now structure is: [Clones Reversed] [Originals] [Clones]
        // Center of standard set is at offset: totalSetWidth
        // We want to center the first item of Original set? Or the middle item?
        // Let's center the whole view on the Original Set.
        
        const startPos = totalSetWidth; // This places the start of Original set at left edge
        // To center the Original Set's *content* relative to screen? 
        // Let's center the first item of Original set in the viewport.
        const viewportWidth = scrollArea.clientWidth;
        const initialScroll = startPos - (viewportWidth / 2) + (singleItemWidth / 2);
        
        // Clamp to positive
        scrollArea.scrollLeft = Math.max(0, initialScroll);

        
        // 4. Auto Scroll Logic
        let playing = true;
        let rafId = null;

        const step = () => {
            if (playing) {
                scrollArea.scrollLeft += velocity;

                // Seamless Loop Logic
                // If we scrolled past the originals (to the right clones), reset to start of originals
                // Structure: [0..W] (Prepend) | [W..2W] (Original) | [2W..3W] (Append)
                // We are moving Right. scrollLeft increases.
                // When scrollLeft > 2W (start of Append), we can jump back to W (start of Original)
                // Actually, exact join point is when scrollLeft reaches (2W).
                // At that point, the view is identical to scrollLeft = W.
                
                if (scrollArea.scrollLeft >= totalSetWidth * 2) {
                   scrollArea.scrollLeft -= totalSetWidth;
                } 
                // Bi-directional safety (if velocity < 0)
                else if (scrollArea.scrollLeft <= totalSetWidth - viewportWidth) {
                     // If we moved too far left into prepended clones?
                     // reset to corresponding position in appended/original?
                     // For simple 'velocity > 0', we just need the forward reset.
                     // But if user drags?
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
        scrollArea.addEventListener("pointerdown", pause);
        scrollArea.addEventListener("pointerup", resume);
        
        // Optional: Manual Drag logic could be re-added here if needed, 
        // but often conflicts with simple Marquee. 
        // Let's align with "Alumni": Alumni has manual drag.
        // We can keep the simple marquee for now unless requested.
        // User asked "smoot dan lancar" (smooth and fluid).
    };

    // Initialize Gallery Slider
    // Velocity 0.5 is slow and smooth.
    initGallerySlider(".gallery-scroll", 0.5);

  
    /* =========================
     4) ALUMNI SLIDER (INFINITE AUTO-SCROLL + FOCUS)
     ========================= */
    const initAlumniSlider = () => {
        const scrollArea = $(".alumni-scroll");
        if (!scrollArea) return;
        
        // Disable smooth scrolling/snap via JS
        scrollArea.style.scrollBehavior = "auto";
        scrollArea.style.scrollSnapType = "none";

        let items = $$(".alumni-item", scrollArea);
        const originalCount = items.length;
        if (originalCount === 0) return;

        // 1. Clone items for infinite loop if not already cloned
        // We need enough buffer. Existing logic clones 1 set each side.
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
        
        let itemWidth, setWidth;

        const updateDimensions = () => {
            const itemStyle = window.getComputedStyle(items[0]);
            const containerStyle = window.getComputedStyle(scrollArea);
            const gap = parseFloat(containerStyle.columnGap || containerStyle.gap || "0");
            itemWidth = items[0].offsetWidth + gap; 
            setWidth = itemWidth * originalCount;
        };

        updateDimensions();

        // 2. Set Initial Scroll Position (Center)
        const middleIndex = Math.floor(originalCount / 2); 
        // We have 1 set prepended, so start is at (1 set + middle)
        const startScrollPos = setWidth + (middleIndex * itemWidth);
        
        scrollArea.scrollLeft = startScrollPos;

        // 3. Focus Logic (Highlight Center Item)
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

        // 4. Auto Scroll Logic
        let playing = true;
        let velocity = 0.5; // Smooth speed
        let rafId = null;

        const step = () => {
            if (playing) {
                scrollArea.scrollLeft += velocity;

                // Seamless Loop Logic
                // Structure: [Clones A (Width=W)] [Originals (Width=W)] [Clones C (Width=W)]
                // Total width ~ 3W.
                // We start at W.
                // If scrollLeft >= 2W (Start of Clones C), jump back to W (Start of Originals)
                
                if (scrollArea.scrollLeft >= setWidth * 2) {
                    scrollArea.scrollLeft -= setWidth;
                } 
                else if (scrollArea.scrollLeft <= 0) {
                     scrollArea.scrollLeft += setWidth;
                }
                
                updateFocus(); // Update focus while auto-scrolling
            }
            rafId = requestAnimationFrame(step);
        };

        rafId = requestAnimationFrame(step);

        /* Pause auto-scroll on user interaction */
        const pause = () => { 
            playing = false; 
            // Optional: Enable scroll snap when paused for better UX?
            // scrollArea.style.scrollSnapType = "x mandatory";
        };
        const resume = () => { 
            playing = true; 
            // scrollArea.style.scrollSnapType = "none";
        };

        // Disable scroll snap for smooth auto-scroll
        scrollArea.style.scrollSnapType = "none";

        scrollArea.addEventListener("mouseenter", pause);
        scrollArea.addEventListener("mouseleave", resume);
        scrollArea.addEventListener("pointerdown", pause);
        scrollArea.addEventListener("pointerup", resume);
        
        // Handle Resize
        window.addEventListener("resize", () => {
            updateDimensions();
            updateFocus();
        });
        
        // If user manually scrolls (touch drag), 'scroll' event fires.
        // We might want to pause there too, or let the pointer events handle it.
        // Pointer events usually suffice for "touching".
    };

    initAlumniSlider();


    /* =========================
     5) GALLERY LIGHTBOX & INTERACTION
     ========================= */
    /* =========================
     5) GALLERY LIGHTBOX & INTERACTION
     ========================= */
    (() => {
        // Supports both old (.galeri-scroll) and new (.gallery-grid/.gallery-scroll) containers
        // Including .gallery-scroll for horizontal layout
        const galleryContainers = [$(".galeri-scroll"), $(".gallery-grid"), $(".gallery-scroll")].filter(el => el);
        const modal = $("#imgModal");
        const modalImg = $("#imgFull");
        
        if (galleryContainers.length && modal && modalImg) {
             const handleImageClick = (e) => {
                // Support both old class .galeri-link and new .gallery-link
                const link = e.target.closest(".galeri-link, .gallery-link");
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
                }
            };

            galleryContainers.forEach(container => {
                container.addEventListener("click", handleImageClick);
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
            
            // Close on ESC key
            document.addEventListener('keydown', function(e) {
                if(e.key === "Escape" && modal.style.display === "block") {
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
     6) PRESTASI SLIDER (MOBILE AUTO-SCROLL)
     ========================= */
    const initPrestasiSlider = () => {
        const scrollArea = $(".prestasi-scroll");
        if (!scrollArea) return;

        // Disable smooth scrolling/snap via JS
        scrollArea.style.scrollBehavior = "auto";
        scrollArea.style.scrollSnapType = "none";

        // Check if we are in mobile/scroll mode (clones exist or overflow)
        // Better: Always init logic, but auto-scroll only effectively runs if overflow/clones created?
        // Actually, we need to create clones ONLY if we are in a mode that supports it, 
        // OR create them always (hidden on desktop) and run logic.
        // Since we hide .clone on desktop via CSS, we can safely create them.
        
        let items = $$(".prestasi-item", scrollArea);
        const originalCount = items.length;
        if (originalCount === 0) return;

        // 1. Clone items for infinite loop
        if (!scrollArea.querySelector(".clone")) {
            const clonesA = items.map(item => item.cloneNode(true));
            const clonesC = items.map(item => item.cloneNode(true));
            
            // Add identifying class
            clonesA.forEach(c => c.classList.add("clone"));
            clonesC.forEach(c => c.classList.add("clone"));

            clonesA.reverse().forEach(clone => {
                scrollArea.insertBefore(clone, scrollArea.firstChild);
            });

            clonesC.forEach(clone => {
                scrollArea.appendChild(clone);
            });
        }

        items = $$(".prestasi-item", scrollArea); // re-query including clones? 
        // wait, we typically re-query inside `updateDimensions` or just use the container width.
        // For logic consistency, let's treat it like Alumni w/o focus scaling (unless requested).
        // Prestasi is simple slider.
        
        let totalWidth = 0;
        
        const updateDimensions = () => {
             // For Prestasi, items might have different widths (text length?)
             // But we set min-width: 240px.
             // Let's compute total scroll width accurately.
             totalWidth = scrollArea.scrollWidth / 3; // Approx if 3 sets (A + Orig + B)
             // Better: measure one set.
        };
        // Actually simpler: 
        // We know we added 1 set before and 1 set after.
        // So total content = 3 * OriginalSetWidth.
        // Start Position (Original Start) = TotalScrollWidth / 3.
        
        // 2. Set Initial Scroll Position (Center of Original Set)
        // User wants "start centered".
        // Center of Original Set = (TotalScrollWidth / 3) + (OriginalSetWidth / 2) - (Viewport / 2)
        // OR just start at the beginning of Original Set?
        // "dimulai nyah dibagian tengah" (start in the middle).
        // Let's aim for the Middle Card of the Original Set.
        
        const calculateStart = () => {
            const scrollW = scrollArea.scrollWidth;
            const viewW = scrollArea.clientWidth;
            
            // If on desktop (grid), scrollWidth might be same as clientWidth (no scroll).
            // Logic should be robust.
            if (scrollW <= viewW) return 0;

            const singleSetWidth = scrollW / 3;
            const middleOfOriginalSet = singleSetWidth + (singleSetWidth / 2);
            return middleOfOriginalSet - (viewW / 2);
        };
        
        // Apply start position
        // We use a timeout to let layout settle slightly if needed, or just run.
        scrollArea.scrollLeft = calculateStart();

        // 3. Auto Scroll
        let playing = true;
        let velocity = 0.5;
        let rafId = null;

        const step = () => {
            // Only scroll if we have space to scroll (Mobile)
            if (scrollArea.scrollWidth > scrollArea.clientWidth && playing) {
                scrollArea.scrollLeft += velocity;
                
                const oneSetWidth = scrollArea.scrollWidth / 3;
                
                // Infinite Loop Checks
                if (scrollArea.scrollLeft >= oneSetWidth * 2) {
                    scrollArea.scrollLeft -= oneSetWidth;
                } else if (scrollArea.scrollLeft <= 0) {
                    scrollArea.scrollLeft += oneSetWidth;
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
        scrollArea.addEventListener("pointerdown", pause);
        scrollArea.addEventListener("pointerup", resume);
        
        window.addEventListener("resize", () => {
             // On resize, re-center if we crossed breakpoint?
             // Or primarily just let the user scroll.
             // If we go from Desktop -> Mobile, we might need to reset scrollLeft.
        });
    };

    initPrestasiSlider();

    /* =========================
     7) CLEANUP on unload (cancel RAF)
     ========================= */
    window.addEventListener("beforeunload", () => {
        // cancel any RAF if needed (we kept rafId var inside closure so not globally accessible)
        // Not strictly necessary, browser cleans up, but left for completeness
    });
}); // end DOMContentLoaded
