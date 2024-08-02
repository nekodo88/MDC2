document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.counter');

    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    function countUp(el) {
        const target = +el.getAttribute('data-target');
        let count = 0;
        const speed = 200; // mniejsza liczba oznacza szybsze działanie
        const updateCount = () => {
            const inc = target / speed;
            if (count < target) {
                count += inc;
                el.textContent = Math.ceil(count).toLocaleString();
                setTimeout(updateCount, 10);
            } else {
                el.textContent = target.toLocaleString();
            }
        };
        updateCount();
    }

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                countUp(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, options);

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
