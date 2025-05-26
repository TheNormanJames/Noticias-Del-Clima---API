// import useWeather from './api';

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

function slidesDinamycs(otherCities) {
  const fragment = document.createDocumentFragment();

  otherCities.forEach((city) => {
    const div = document.createElement('div');
    div.classList.add(
      'sectionAPI__sliderItem',
      formatImgWeather(city.weather.description)
    );
    div.innerHTML = `
     <h3 class="sectionAPI__sliderItem__title">${city.city}</h3>
     <p class="sectionAPI__sliderItem__subTitle">${city.country}</p>
     <p class="temperature">${formatTemperature(city.temp)}</p>`;
    fragment.appendChild(div);
  });

  sectionAPI__slider.appendChild(fragment);
}
async function useAPI(params) {
  const search = nnjWeatherSettings.search;

  const apiId = '2d617267bba25115698aaaff0fba2c41';
  const othersCitys = nnjWeatherSettings.othersCitys;

  const fetchGeoData = async (city, country) => {
    const geoURL = `https://api.openweathermap.org/geo/1.0/direct?q=${city},${country}&appid=${apiId}`;
    const res = await fetch(geoURL);
    if (!res.ok) throw new Error(`Error ${res.status}: ${res.statusText}`);
    return await res.json();
  };

  const fetchWeatherData = async (lat, lon) => {
    const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiId}`;
    // http://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&appid=${key}&units=${units}&lang=${lang}
    const dataForeCast = `http://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiId}`;
    const resforeCast = await fetch(dataForeCast);
    console.log(
      `http://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiId}`,
      'Nuevo'
    );
    setTimeout(() => {
      console.log(resforeCast.json(), 'resforeCast');
    }, 2000);

    const res = await fetch(weatherUrl);
    if (!res.ok) throw new Error(`Error ${res.status}: ${res.statusText}`);
    // console.log(weatherUrl);

    return await res.json();
  };
  const fetchDataForeCast = async (lat, lon) => {
    const dataForeCast = `http://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiId}`;

    const res = await fetch(dataForeCast);
    if (!res.ok) throw new Error(`Error ${res.status}: ${res.statusText}`);

    const json = await res.json();
    console.log(json, 'dataForeCast');

    return json;
  };

  try {
    // Ciudad principal
    const geoData = await fetchGeoData(search.city, search.country);
    const { lat, lon } = geoData[0];
    const weatherData = await fetchWeatherData(lat, lon);
    const dataForeCast = await fetchDataForeCast(lat, lon);
    const pronostico5Dias = obtenerPronosticoDiario(dataForeCast);

    console.log(pronostico5Dias);

    // Ciudades secundarias
    const otherCitiesData = await Promise.all(
      othersCitys.map(async (place) => {
        const geoData = await fetchGeoData(place.city, place.country);

        const { lat, lon } = geoData[0];
        const weatherData = await fetchWeatherData(lat, lon);
        return {
          city: place.city,
          country: place.country,
          weather: weatherData.weather[0],
          temp: weatherData.main.temp,
        };
      })
    );

    // Formatear respuesta
    // Cachear los elementos
    const now = Date.now(); //timestamp
    // console.log(now);

    const finalData = {
      // return {
      principal: {
        city: search.city,
        country: search.country,
        clouds: weatherData.clouds.all,
        coord: {
          lon: weatherData.coord.lon,
          lat: weatherData.coord.lat,
        },
        temp: formatTemperature(weatherData.main.temp),
        temp_max: formatTemperature(weatherData.main.temp_max),
        temp_min: formatTemperature(weatherData.main.temp_min),
        weather: {
          description: weatherData.weather[0].description,
          description_format: formatImgWeather(
            weatherData.weather[0].description
          ),
          icon: weatherData.weather[0].icon,
          main: weatherData.weather[0].main,
          // main_format: formatImgWeather(weather[0].main),
        },
        humidity: weatherData.main.humidity,
        wind: weatherData.wind,
        pronostico5Dias: pronostico5Dias,
        hour: now,
        // hour: weatherData.dt,
      },
      otherCities: otherCitiesData,
    };

    // localStorage.setItem(cacheKey, JSON.stringify({
    //   data: finalData,
    //   timestamp: now
    // }));

    return finalData;
  } catch (error) {
    console.error('Error en useAPI:', error);
    throw error;
  }
}

const sectionAPI__title = document.querySelector('.sectionAPI__title');
const sectionAPI__subTitle = document.querySelector('.sectionAPI__subTitle');
const sectionAPI__description = document.querySelector(
  '.sectionAPI__description'
);
const weatherDetails__title = document.querySelector('.weatherDetails__title');
const sectionAPI__listItem = document.querySelector('.sectionAPI__listItem');
const weatherDetails__temperature = document.querySelector(
  '.weatherDetails__temperature'
);

const hourHtml = document.querySelector('.hour span');
const humidity = document.querySelector('.humidity span');
const temp_max = document.querySelector('.temp_max span');
const temp_min = document.querySelector('.temp_min span');
const windDeg = document.querySelector('.windDeg span');
const windSpeed = document.querySelector('.windSpeed span');

const sectionAPI = document.querySelector('.sectionAPI');
const sectionAPI__slider = document.querySelector('.sectionAPI__slider');
const weatherDetails__daysList = document.querySelector(
  '.weatherDetails__daysList'
);

const sectionAPI__icon = document.querySelector('.sectionAPI__icon');
function addWeatherToHTML(APIJSON) {
  const iconUrl = `http://openweathermap.org/img/wn/${APIJSON.weather.icon}@2x.png`;

  sectionAPI__title.innerHTML = APIJSON.city;
  sectionAPI__subTitle.innerHTML = APIJSON.country;
  sectionAPI__description.innerHTML = APIJSON.weather.description;
  weatherDetails__title.innerHTML = APIJSON.weather.description;
  document.documentElement.style.setProperty('--urlImg', `url(${iconUrl})`);
  weatherDetails__temperature.innerHTML = APIJSON.temp;
  sectionAPI.classList.add(APIJSON.weather.description_format);

  hourHtml.innerHTML = formatDate(APIJSON.hour);
  humidity.innerHTML = APIJSON.humidity;
  temp_max.innerHTML = APIJSON.temp_max;
  temp_min.innerHTML = APIJSON.temp_min;
  windDeg.innerHTML = `${APIJSON.wind.deg}deg`;
  windSpeed.innerHTML = APIJSON.wind.speed;

  const fragment = document.createDocumentFragment();
  APIJSON.pronostico5Dias.forEach((dia) => {
    console.log(dia);

    const li = document.createElement('li');
    li.classList.add('weatherDetails__day');
    li.innerHTML = `
        <p class="weatherDetails__dayName">${obtenerNombreDelDia(dia.fecha)}</p>
        <img src="http://openweathermap.org/img/wn/${
          dia.icono
        }@2x.png" alt="Icono del día" />
        <p class="weatherDetails__dayTemperature temperature">${formatTemperature(
          dia.temperatura
        )}</p>
       `;
    fragment.appendChild(li);
  });
  weatherDetails__daysList.innerHTML = '';
  weatherDetails__daysList.appendChild(fragment);
}

const formatTemperature = (temperature) => {
  const kelvin = 273.15;
  return parseInt((temperature - kelvin).toString());
};
const formatImgWeather = (mainWeather) => {
  const weatherFrom = mainWeather.toLowerCase();

  let weather;
  switch (weatherFrom) {
    case 'clear sky':
      weather = 'sun';
      break;
    case 'few clouds':
    case 'scattered clouds':
    case 'broken clouds':
      weather = 'clouds';
      break;
    case 'shower rain':
      weather = 'little_rain';
      break;
    case 'rain':
      weather = 'rain';
      break;
    case 'thunderstorm':
      weather = 'storm';
      break;
    case 'snow':
    case 'mist':
      weather = 'snow';
      break;

    default:
      weather = 'sun';
      break;
  }
  return weather;
};

function formatDate(timestamp) {
  const fecha = new Date(timestamp);
  console.log(fecha);

  const dias = [
    'Domingo',
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
    'Sábado',
  ];
  const diaSemana = dias[fecha.getDay()];

  console.log(fecha.getMonth());

  const dia = fecha.getDate().toString();
  const mes = (fecha.getMonth() + 1).toString();
  const año = fecha.getFullYear();

  const horas = fecha.getHours().toString();
  const minutos = fecha.getMinutes().toString();

  return `${horas}:${minutos} del día ${diaSemana} ${dia}/${mes}/${año} `;
}
function obtenerPronosticoDiario(data) {
  const resultados = {};

  data.list.forEach((item) => {
    const fecha = new Date(item.dt * 1000);
    const dia = fecha.toISOString().split('T')[0]; // yyyy-mm-dd
    const hora = fecha.getHours();

    if (
      !resultados[dia] ||
      Math.abs(hora - 12) < Math.abs(resultados[dia].hora - 12)
    ) {
      resultados[dia] = {
        hora,
        fecha,
        temperatura: item.main.temp,
        clima: item.weather[0].description,
        icono: item.weather[0].icon,
        viento: item.wind.speed,
      };
    }
  });

  // Se convierte el objeto en array y se saca solo los próximos 5 días
  return Object.values(resultados).slice(0, 5);
}
function obtenerNombreDelDia(fechaString) {
  const fecha = new Date(fechaString);
  const dias = [
    'Domingo',
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
    'Sábado',
  ];
  return dias[fecha.getDay()];
}
