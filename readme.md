# Noticias Del Clima - Prueba Técnica 🌦️

## Recursos

- **Figma** Diseno total del proyecto
  [Noticias del Clima – Figma](https://www.figma.com/design/jZK0bD9FbrOA3RFelKokSD/Noticias-del-Clima?node-id=0-1&p=f)
- **Github**: Repositorio del proyecto
  [TheNormanJames/Noticias-Del-Clima---API](https://github.com/TheNormanJames/Noticias-Del-Clima---API)

## Descripción del Proyecto

Sitio web WordPress que muestra datos meteorológicos en tiempo real mediante la API de OpenWeatherMap. Incluye:

- Página principal con clima actual
- Diseño responsive con menú interactivo
- Componente de "brújula" animada
- Sistema de caché para optimizar peticiones

## Cómo se resolví la prueba

1. Empecé con el diseno en papel, pensando distribución. Que no fuera una simple página con un modular del clima.
2. Luego pasé a Figma a desarrollar e implementar variables y componentes para la creación de lo que tenía ya plasmado en el cuaderno. Con lo cuál terminé disenando: [(Ver Figma)](https://www.figma.com/design/jZK0bD9FbrOA3RFelKokSD/Noticias-del-Clima?node-id=0-1&p=f)
   1. Home
   2. Sobre Nosotros
   3. Blog
3. Una vez me sentí cómodo con el diseno empecé con la maquetación en html, css y js. Y una vez terminé la maquetación de la página inicial empecé a migrar todos los archivos creados a Wordpress por miedo a que me demorara en abarcar todo en los 3 díás hábiles.
4. Empecé a transformar el código `html` en piezas de `php` para la creación de la plantilla de la página. [(pueden ver el proceso en el repositorio de github)](https://github.com/TheNormanJames/Noticias-Del-Clima---API) Mi objetivo era duplicar el desarrollo hecho a Wordpress.
5. Luego de la maquetación, empecé con la implementación de los menús dinámicos y la personalización desde el admin de Wordpress `Apariencia → Personalizar` para una mejor experiencia al editar los textos y demás.
6. Pasé a desarrollar la página de `sobre nosotros` con su respectivo archivo php `plantilla-sobre-nosotros.php` para el diseno único de la página.
7. Una vez hecho la apariencia, empecé con la implementación de la API `OpenWeatherMap`, que al principio la verdad no encontraba la forma para obtener los datos. Así que con busquedas empecé a conectar varias URL’s que se necesitaban para la extracción de los datos. Cuando obtuve los datos me dí cuenta que había alguna información que me hacía falta para cumplir con el diseno realizado en Figma (Por ejemplo los próximos 5 días) ya que creía que era pagando la API.
   Así que fuí agregando los datos extraidos con javascript a la sección de la API en el Front.
8. Una vez completado ese paso, empecé con la extracción de 4 ciudades más para implementar una experiencia más completa al usuario desde el front.
9. Cuando ya tenía toda esa parte de la API empecé de nuevo con la personalización desde el admin para agregar las ciudades deseadas
10. Buscando vídeos por internet logré ver que usaban la ruta `forecast` y la empecé a usar para la última parte de extracción de los días posteriores. Extrayendo los datos y agregandolos dinámicamente.
11. Ya a lo último empecé con el caché de los datos simplemente guardandolos al localstorage para una sesión única de navegador. Y optimizando los archivos llevandolos a archivos más espécificos.
12. Al final implementé la página de los `posts` → `home.php` para un acabado del prototipo hecho en figma.

| Requisito              | Implementación                                             |
| ---------------------- | ---------------------------------------------------------- |
| Consumo de API         | Fetch a OpenWeatherMap con JavaScript, cacheado por 15 min |
| Componente interactivo | Slider con animación CSS y brújula sincronizada            |
| WordPress              | Tema personalizado con Customizer para ajustes             |
| Responsive             | Mobile-first con media queries                             |
| Estructura             | Modularización de JS y CSS organizado                      |

Nota personal:
Sé que probablemente hay cosas que podría haber hecho mejor o detalles que pasé por alto. Tuve solo tres días para trabajar en esto, pero intenté ajustarme lo mejor posible a los requerimientos y dar lo mejor de mí en cada parte.

Estoy completamente dispuesto a seguir aprendiendo y mejorando. Me entusiasma mucho la idea de seguir creciendo y poder compartir lo que sé con ustedes.

Adjunto dos videos donde muestro el flujo y la interacción del proyecto. ¡Gracias por la oportunidad de considerarme!

## Instalación 🛠️

### Pasos:

1. Les envío 2 archivos `.zip` al correo dónde estarán los datos del proyecto de wordpress
   1. Uno es la copia exacta del proyecto raiz y con las bases de datos llamado `noticias_del_clima-prueba_tecnica.zip`
      1. Bases De datos:
         1. SQL: `noticias_del_clima.sql`
         2. Extracción de bases de datos de wordpress de la sección `Herramientas → Exportar`: `noticiasdelclima.WordPress.2025-05-26.xml`
   2. Otro archivo es mediante un plugin llamado **`UpdraftPlus Backup/Restore`** que exporta toda la información necesaria para migrar a otro proyecto llamado `backup_plugin-UpdraftPlus_BackupRestore.zip`
2. Una vez obtenido el proyecto instarlo en un servidor local o en web y enlazarlo con la base de datos. O instalar el plugin **`UpdraftPlus Backup/Restore`** y ahora importar los datos una vez extraidos del `backup_plugin-UpdraftPlus_BackupRestore.zip`
3. Credenciales para acceder al proyecto
   1. admin → WebmasterNNJ
   2. contrasena → #D4v%ws2&UR@SQGuOj

## Tiempo aproximado dedicado

Desde que recibí el proyecto, me enfoqué por completo en él.

Le dediqué muchas horas al día en un promedio más de 10. Porque realmente me entusiasmó la propuesta y quise aprovechar al máximo el tiempo para construir algo que reflejara mi compromiso y ganas de formar parte del equipo.
