const Slider = {
    currentSlide: 'home',
    dispathSlide(slideName) {
        let slideElement = document.querySelector(`.form.${slideName}`);
        if(slideElement) {
            this.diactivateAllSlides();
            window.location.hash = `#${slideName}`;
            slideElement.classList.add('active');
            this.currentSlide = slideName;
        } else {
            window.location.hash = '';
        }
    },
    diactivateAllSlides() {
        document.querySelectorAll('.form').forEach(el => {
            el.classList.remove('active');
        });
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('button.slide-btn').forEach(btn => {
        btn.addEventListener('click', (event) => {
            Slider.dispathSlide(btn.getAttribute('data-slide'));
        });
    });

    if(window.location.hash) {
        slideName = window.location.hash;
        Slider.dispathSlide(slideName.replace('#',''));
    }
});
