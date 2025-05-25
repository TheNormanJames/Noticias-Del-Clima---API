const testimonials__slider = document.querySelector('.testimonials__slider');
let contadorSlider = 0;
document.addEventListener('click', (e) => {
  if (e.target.matches('.testimonials__slider__arrowsLeft')) {
    contadorSlider === 0
      ? (contadorSlider = testimonials__slider.children.length - 1)
      : contadorSlider--;
    testimonials__slider.style.translate = `-${contadorSlider}00% 0`;
  }
  if (e.target.matches('.testimonials__slider__arrowsRight')) {
    contadorSlider === testimonials__slider.children.length - 1
      ? (contadorSlider = 0)
      : contadorSlider++;
    testimonials__slider.style.translate = `-${contadorSlider}00% 0`;
  }
});
