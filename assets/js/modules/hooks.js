import {
  hourHtml,
  humidity,
  sectionAPI,
  sectionAPI__description,
  sectionAPI__slider,
  sectionAPI__subTitle,
  sectionAPI__title,
  temp_max,
  temp_min,
  weatherDetails__daysList,
  weatherDetails__temperature,
  weatherDetails__title,
  windDeg,
  windSpeed,
} from './variables.js';

export async function useAPI(params) {
  const search = nnjWeatherSettings.search;

  const apiId = '2d617267bba25115698aaaff0fba2c41';
  const othersCitys = nnjWeatherSettings.othersCitys;

  // caché
  // generar una key para el caché
  const cacheKey = `noticiasClima_${search.city}_${search.country}`;
  const now = Date.now(); //timestamp
  // console.log(now);
  const cacheStorage = localStorage.getItem(cacheKey);

  if (cacheStorage) {
    const { data, timestamp } = JSON.parse(cacheStorage);
    const cacheDuration = 15 * 60 * 1000; // 15 minutos

    if (now - timestamp < cacheDuration) {
      console.info('Usando datos desde caché');
      return data;
    }
  }

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
    // console.log(
    //   `http://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiId}`,
    //   'Nuevo'
    // );
    // setTimeout(() => {
    //   console.log(resforeCast.json(), 'resforeCast');
    // }, 2000);

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
    // console.log(json, 'dataForeCast');

    return json;
  };

  try {
    // Ciudad principal
    const geoData = await fetchGeoData(search.city, search.country);
    const { lat, lon } = geoData[0];
    const weatherData = await fetchWeatherData(lat, lon);
    const dataForeCast = await fetchDataForeCast(lat, lon);
    const pronostico5Dias = obtenerPronosticoDiario(dataForeCast);

    // console.log(pronostico5Dias);

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

    localStorage.setItem(
      cacheKey,
      JSON.stringify({
        data: finalData,
        timestamp: now,
      })
    );

    return finalData;
  } catch (error) {
    console.error('Error en useAPI:', error);

    // Si hay error se cargan los datos guardados
    if (cacheStorage) {
      console.warn('Usando caché (aunque esté vencido) por error en API');
      return JSON.parse(cacheStorage).data;
    }
    throw error;
  }
}

export function slidesDinamycs(otherCities) {
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
export function addWeatherToHTML(APIJSON) {
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
    // console.log(dia);

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

export const formatTemperature = (temperature) => {
  const kelvin = 273.15;
  return parseInt((temperature - kelvin).toString());
};
export const formatImgWeather = (mainWeather) => {
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

export function formatDate(timestamp) {
  const fecha = new Date(timestamp);
  // console.log(fecha);

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

  // console.log(fecha.getMonth());

  const dia = fecha.getDate().toString();
  const mes = (fecha.getMonth() + 1).toString();
  const año = fecha.getFullYear();

  const horas = fecha.getHours().toString();
  const minutos = fecha.getMinutes().toString();

  return `${horas}:${minutos} del día ${diaSemana} ${dia}/${mes}/${año} `;
}
export function obtenerPronosticoDiario(data) {
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
export function obtenerNombreDelDia(fechaString) {
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
