// change the background every reload

let landing = document.getElementsByClassName("landing")[0];
const imgs = [];

imgs[1] = 'assets/background.jpg';
imgs[2] = 'assets/backgroundd2.jpg';
imgs[3] = 'assets/backgroundd3.jpg';
imgs[4] = 'assets/backgroundd4.jpg';
imgs[5] = 'assets/backgroundd5.jpg';
imgs[6] = 'assets/backgroundd6.jpg';
imgs[7] = 'assets/background7.jpg';
imgs[0] = 'assets/backgroundd8.jpg';

// window.onload = function () {
  const random = Math.floor(Math.random()* imgs.length); 
  landing.style.backgroundImage = `url(${imgs[random]})`;
  
// }