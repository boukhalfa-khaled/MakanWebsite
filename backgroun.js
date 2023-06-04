// change the background every reload

let landing = document.getElementsByClassName("landing")[0];
const imgs = [];

imgs[1] = 'images/background.jpg';
imgs[2] = 'images/backgroundd2.jpg';
imgs[3] = 'images/backgroundd3.jpg';
imgs[4] = 'images/backgroundd4.jpg';
imgs[5] = 'images/backgroundd5.jpg';
imgs[6] = 'images/backgroundd6.jpg';
imgs[7] = 'images/backgroundd7.jpg';
imgs[0] = 'images/backgroundd8.jpg';
console.log(landing);

// window.onload = function () {
  const random = Math.floor(Math.random()* imgs.length); 
  landing.style.backgroundImage = `url(${imgs[random]})`;

// }