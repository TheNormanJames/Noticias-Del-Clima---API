<?php get_header(); ?>


<main class="main">
 <section class="section sectionAPI">
  <div class="container-pcL flexGrow">
   <div class="sectionAPI__content">
    <div class="sectionAPI__textContent" data-rotate="0">
     <h2 class="sectionAPI__title">Bogotá</h2>
     <p class="sectionAPI__subTitle">Colombia</p>
     <p class="sectionAPI__description">
      Feels like 14°C. Overcast clouds. Gentle Breeze
     </p>
     <ul class="sectionAPI__list">
      <li class="sectionAPI__listItem hour">Hora: <span></span> </li>
      <li class="sectionAPI__listItem humidity">Humedad: <span></span> </li>
      <li class="sectionAPI__listItem temp_max temperature">Temperatura max: <span></span></li>
      <li class="sectionAPI__listItem temp_min temperature">emperatura min: <span></span></li>
      <li class="sectionAPI__listItem windDeg">Dirección del Viento: <span></span></li>
      <li class="sectionAPI__listItem windSpeed">Velocidad del Viento: <span></span></li>
     </ul>
     <div class="sliderButtons">
      <img
       class="slider__arrowLeft hidden"
       src="<?php echo get_template_directory_uri(); ?>/assets/icons/ArrowWhite.svg"
       alt="flecha del slider interactivo" />
      <img
       class="slider__arrowRight"
       src="<?php echo get_template_directory_uri(); ?>/assets/icons/ArrowWhite.svg"
       alt="flecha del slider interactivo" />
     </div>
    </div>
    <div class="sectionAPI__sliderArea">
     <div class="sectionAPI__slider">
      <!-- <div class="sectionAPI__sliderItem sun">
       <h3 class="sectionAPI__sliderItem__title">Bogotá</h3>
       <p class="sectionAPI__sliderItem__subTitle">Colombia</p>
       <p class="temperature">31</p>
      </div>
      <div class="sectionAPI__sliderItem rain">
       <h3 class="sectionAPI__sliderItem__title">Bogotá</h3>
       <p class="sectionAPI__sliderItem__subTitle">Colombia</p>
       <p class="temperature">31</p>
      </div>
      <div class="sectionAPI__sliderItem little_rain">
       <h3 class="sectionAPI__sliderItem__title">Bogotá</h3>
       <p class="sectionAPI__sliderItem__subTitle">Colombia</p>
       <p class="temperature">31</p>
      </div>
      <div class="sectionAPI__sliderItem storm">
       <h3 class="sectionAPI__sliderItem__title">Bogotá</h3>
       <p class="sectionAPI__sliderItem__subTitle">Colombia</p>
       <p class="temperature">31</p>
      </div> -->
     </div>
    </div>
   </div>
  </div>
  <article class="weatherDetails">
   <div class="container-pcL">
    <h3 class="weatherDetails__title">Mostly Sunday</h3>
    <div class="weatherDetails__content">
     <p class="weatherDetails__temperature temperature">15</p>
     <div class="weatherDetails__days">
      <ul class="weatherDetails__daysList">
       <li class="weatherDetails__day">
        <p class="weatherDetails__dayName">Lunes</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Sun.svg" alt="Icono del día" />
        <p class="weatherDetails__dayTemperature temperature">25</p>
       </li>
       <li class="weatherDetails__day">
        <p class="weatherDetails__dayName">Martes</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Sun.svg" alt="Icono del día" />
        <p class="weatherDetails__dayTemperature temperature">25</p>
       </li>
       <li class="weatherDetails__day">
        <p class="weatherDetails__dayName">Miércoles</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Sun.svg" alt="Icono del día" />
        <p class="weatherDetails__dayTemperature temperature">25</p>
       </li>
       <li class="weatherDetails__day">
        <p class="weatherDetails__dayName">Jueves</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Sun.svg" alt="Icono del día" />
        <p class="weatherDetails__dayTemperature temperature">25</p>
       </li>
       <li class="weatherDetails__day">
        <p class="weatherDetails__dayName">Viernes</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Sun.svg" alt="Icono del día" />
        <p class="weatherDetails__dayTemperature temperature">25</p>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </article>
 </section>
 <?php get_footer(); ?>