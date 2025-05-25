// async function useAPI(params) {
//   const apiId = '2d617267bba25115698aaaff0fba2c41';
//   const search = {
//     city: 'bogota',
//     country: 'Colombia',
//     // city: 'london',
//     // country: 'United Kingdom',
//   };
//   // let othersCitys = [
//   //   {
//   //     city: 'bogota',
//   //     country: 'Colombia',
//   //   },
//   //   {
//   //     city: 'london',
//   //     country: 'United Kingdom',
//   //   },
//   //   {
//   //     city: 'bogota',
//   //     country: 'Colombia',
//   //   },
//   //   {
//   //     city: 'london',
//   //     country: 'United Kingdom',
//   //   },
//   //   {
//   //     city: 'bogota',
//   //     country: 'Colombia',
//   //   },
//   //   {
//   //     city: 'london',
//   //     country: 'United Kingdom',
//   //   },
//   // ];
//   const geoURL = `https://api.openweathermap.org/geo/1.0/direct?q=${search.city},${search.country}&appid=${apiId}`;

//   // let otherCitysGeoURL = othersCitys.map((place) => {
//   //   return `https://api.openweathermap.org/geo/1.0/direct?q=${place.city},${place.country}&appid=${apiId}`;
//   // });

//   // console.log(otherCitysGeoURL);

//   try {
//     const res = await fetch(geoURL);
//     const data = await res.json();

//     if (!res.ok) {
//       throw {
//         status: res.status,
//         statusText: res.statusText,
//       };
//     }

//     const lat = data[0].lat;
//     const lon = data[0].lon;

//     // const weatherUrl = `https://api.openweathermap.org/data/3.0/onecall?lat=${lat}&lon=${lon}&appid=${apiId}`;
//     const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiId}`;

//     const res_weather = await fetch(weatherUrl);
//     const data_weather = await res_weather.json();
//     const { clouds, coord, main, weather, wind } = data_weather;

//     // others
//     // let promises = otherCitysGeoURL.map(async (place) => {
//     //   const res = await fetch(geoURL);
//     //   if (!res.ok) throw new Error(`Error: ${res.status}`); // Manejo de errores
//     //   return await res.json();
//     // });

//     // console.log(promises);
//     // const otherCitysData = await Promise.all(promises);
//     // console.log(otherCitysData);

//     return (weatherPrincipal = {
//       search,
//       clouds: clouds.all,
//       coord: {
//         lon: coord.lon,
//         lat: coord.lat,
//       },
//       temp: formatTemperature(main.temp),
//       temp_max: formatTemperature(main.temp_max),
//       temp_min: formatTemperature(main.temp_min),
//       humidity: main.humidity,
//       weather: {
//         description: weather[0].description,
//         description_format: formatImgWeather(weather[0].description),
//         icon: weather[0].icon,
//         main: weather[0].main,
//         // main_format: formatImgWeather(weather[0].main),
//       },
//       wind: {
//         deg: wind.deg,
//         speed: wind.speed,
//       },
//     });
//   } catch (error) {
//     let message = error.statusText || 'Ocurrió un error';
//     alert(`Error: ${error.status}: ${message}`);
//   }
// }
