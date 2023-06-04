let switcherLis = document.querySelectorAll(".switcher li");
let imgs = Array.from(document.querySelectorAll(".gallery div"));

switcherLis.forEach((li) => {
   li.addEventListener("click", removeActive);
   li.addEventListener("click", manageImgs);
});

// Remove Active Class From All Lis ana Add To Current
function removeActive() {
   switcherLis.forEach((li) => {
      li.classList.remove("active");
      this.classList.add("active");
   });
}

// Manage Imgs 
function manageImgs() {
   imgs.forEach((div) => {
      div.style.display = "none";
   });
   document.querySelectorAll(this.dataset.cat).forEach((el) => {
      el.style.display = "flex";
   });
}