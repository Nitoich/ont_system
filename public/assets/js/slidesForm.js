const Slider = {
    currentSlide: 'home',
    dispathSlide(slideName) {
        let slideElement = document.querySelector(`.form.${slideName}`);
        this.diactivateAllSlides();
        slideElement.classList.add('active');
        this.currentSlide = slideName;
    },
    diactivateAllSlides() {
        document.querySelectorAll('.form').forEach(el => {
            el.classList.remove('active');
        });
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    console.log(document.querySelectorAll('button.slide-btn'))
    document.querySelectorAll('button.slide-btn').forEach(btn => {
        btn.addEventListener('click', (event) => {
            Slider.dispathSlide(btn.getAttribute('data-slide'));
        });
    });
});
