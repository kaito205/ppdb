// Animasi Counter saat discroll
const counters = document.querySelectorAll(".counter");
let started = false;

function startCount() {
    counters.forEach((counter) => {
        const target = +counter.getAttribute("data-target");
        const duration = 1500;
        const step = target / (duration / 20);
        let count = 0;

        const updateCount = () => {
            count += step;
            if (count < target) {
                counter.innerText = Math.ceil(count);
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target + "+";
            }
        };
        updateCount();
    });
}

window.addEventListener("scroll", () => {
    const section = document.querySelector(".bg-blue-statistik");
    if (!section) return;
    const sectionTop = section.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;
    if (!started && sectionTop < windowHeight - 100) {
        startCount();
        started = true;
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const scrollArea = document.querySelector(".galeri-scroll");

    // Ambil item asli
    const items = [...scrollArea.children];

    // Clone item agar bisa infinite loop
    items.forEach((item) => {
        scrollArea.appendChild(item.cloneNode(true));
    });

    const totalWidth = scrollArea.scrollWidth;
    const halfWidth = totalWidth / 4;
    // karena scrollWidth sudah 2x lipat akibat clone

    // Mulai dari tengah
    scrollArea.scrollLeft = halfWidth;

    // Saat mencapai akhir, balik ke tengah lagi
    scrollArea.addEventListener("scroll", () => {
        if (scrollArea.scrollLeft >= totalWidth / 2) {
            scrollArea.scrollLeft = halfWidth;
        }
    });
});

// Smooth scroll ke section pas diklik navbar
document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Highlight navbar aktif pas discroll
const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".navbar .nav-link");

window.addEventListener("scroll", () => {
    let current = "";
    sections.forEach((section) => {
        const sectionTop = section.offsetTop - 120;
        if (scrollY >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});
