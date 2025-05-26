// import useWeather from './api';

import { addWeatherToHTML, slidesDinamycs, useAPI } from './modules/hooks.js';

document.addEventListener('DOMContentLoaded', async function () {
  const mainNav__list__mobile = document.getElementById(
    'mainNav__list__mobile'
  );
  const slider = document.querySelector('.sectionAPI__sliderArea');
  const sectionAPI__textContent = document.querySelector(
    '.sectionAPI__textContent'
  );

  // variables
  const sliderItemsTranslate = 100;
  const radioTotal = 360;
  const radioProgresivo = 45;
  let radioactual = 0;

  function rotateCompass(direction = 'right') {
    direction === 'left'
      ? (radioactual -= radioProgresivo)
      : (radioactual += radioProgresivo);

    if (radioactual >= radioTotal) {
      radioactual = 0;
    }

    sectionAPI__textContent.setAttribute('data-rotate', radioactual);
  }
  let isprimeravez = true;
  function addLastItem() {
    const sectionAPI__slider = document.querySelector('.sectionAPI__slider');
    const hijo = sectionAPI__slider.firstElementChild;
    const clone = hijo.cloneNode(true);
    if (isprimeravez) {
      isprimeravez = false;
    } else {
      setTimeout(() => {
        sectionAPI__slider.appendChild(clone);

        setTimeout(() => {
          sectionAPI__slider.firstElementChild?.remove();
        }, 300);
      }, 200);
    }
  }

  //*------------------------------------------------*/
  function isSlider__arrowLeftVisible(validacion = false) {
    document
      .querySelector('.slider__arrowLeft')
      .classList.toggle('hidden', !validacion);
  }

  document.addEventListener('click', (e) => {
    if (e.target.matches('#mainNav__hamburger')) {
      mainNav__list__mobile.classList.toggle('show_mainNav__list');
    }
    //*------------------------------------------------*/
    //#region //* slider
    if (e.target.matches('.slider__arrowLeft')) {
      isSlider__arrowLeftVisible(false);
      isprimeravez = true;
      rotateCompass('left');

      slider.scrollBy({
        left: -sliderItemsTranslate,
        behavior: 'smooth',
      });
    }
    if (e.target.matches('.slider__arrowRight')) {
      isSlider__arrowLeftVisible(true);
      rotateCompass();
      slider.scrollBy({
        left: sliderItemsTranslate,
        behavior: 'smooth',
      });
      addLastItem();
    }
    //#endregion //! slider
  });

  // useWeather();

  const { principal, otherCities } = await useAPI();
  await addWeatherToHTML(principal);

  await slidesDinamycs(otherCities);
});
