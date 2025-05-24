const mainNav__list__mobile = document.getElementById('mainNav__list__mobile');

document.addEventListener('click', (e) => {
  if (e.target.matches('#mainNav__hamburger')) {
    mainNav__list__mobile.classList.toggle('show_mainNav__list');
  }
});
