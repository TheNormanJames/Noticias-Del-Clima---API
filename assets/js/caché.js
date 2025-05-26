async function useAPI(params) {
  const search = nnjWeatherSettings.search;
  const othersCitys = nnjWeatherSettings.othersCitys;
  const apiId = '2d617267bba25115698aaaff0fba2c41';

  // Clave única para el caché basada en la ciudad principal
  const cacheKey = `weatherData_${search.city}_${search.country}`;

  // 1. Verificar si hay datos en caché y no están vencidos
  const cachedData = localStorage.getItem(cacheKey);
  const now = new Date().getTime();

  if (cachedData) {
    const { data, timestamp } = JSON.parse(cachedData);
    const cacheDuration = 15 * 60 * 1000; // 15 minutos en milisegundos

    // Si los datos están frescos, retornarlos
    if (now - timestamp < cacheDuration) {
      console.log('Usando datos desde caché');
      return data;
    }
  }

  // 2. Si no hay caché o está vencido, hacer la petición
  const fetchGeoData = async (city, country) => {
    const geoURL = `https://api.openweathermap.org/geo/1.0/direct?q=${city},${country}&appid=${apiId}`;
    const res = await fetch(geoURL);
    if (!res.ok) throw new Error(`Error ${res.status}: ${res.statusText}`);
    return await res.json();
  };

  const fetchWeatherData = async (lat, lon) => {
    const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiId}`;
    const res = await fetch(weatherUrl);
    if (!res.ok) throw new Error(`Error ${res.status}: ${res.statusText}`);
    return await res.json();
  };

  try {
    // Ciudad principal
    const geoData = await fetchGeoData(search.city, search.country);
    const { lat, lon } = geoData[0];
    const weatherData = await fetchWeatherData(lat, lon);

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
      principal: {
        city: search.city,
        country: search.country,
        clouds: weatherData.clouds.all,
        coord: { lon: weatherData.coord.lon, lat: weatherData.coord.lat },
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
        },
        humidity: weatherData.main.humidity,
        wind: weatherData.wind,
      },
      otherCities: otherCitiesData,
    };

    // 3. Guardar en caché con marca de tiempo
    localStorage.setItem(
      cacheKey,
      JSON.stringify({
        data: finalData,
        timestamp: now,
      })
    );

    console.log('Datos actualizados desde la API');
    return finalData;
  } catch (error) {
    console.error('Error en useAPI:', error);

    // 4. Si hay error, intentar devolver datos del caché (aunque estén vencidos)
    if (cachedData) {
      console.warn('Usando caché (aunque esté vencido) por error en API');
      return JSON.parse(cachedData).data;
    }

    throw error;
  }
}
