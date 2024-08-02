// Ensure GSAP and ScrollTrigger are loaded
gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function() {
    // Section animation
    const sections = document.querySelectorAll('.section');

    sections.forEach((section, index) => {
        const direction = index % 2 === 0 ? 'from-right' : 'from-left';
        const xValue = direction === 'from-left' ? '-100%' : '100%';

        gsap.fromTo(section, {
            x: xValue,
            opacity: 0
        }, {
            scrollTrigger: {
                trigger: section,
                start: "top 80%", // Start animation when section is 80% from top of viewport
                end: "bottom 20%", // End animation when section is 20% from bottom of viewport
                toggleActions: "play none none none",
            },
            x: 0,
            opacity: 1,
            duration: 3,
            ease: "power4.out"
        });
    });
});
