
const openaside = document.getElementById("open_aside-btn");
const aside = document.getElementById("aside");



document.onclick = function (e) {
  if (e.target.id !== 'aside' && e.target.id !== 'open_aside-btn'  ) 
  {
        openaside.classList.remove('active');
        aside.classList.remove('active');
        document.body.classList.remove('active');
  }
}


openaside.onclick = function () {
  openaside.classList.toggle('active')
  aside.classList.toggle('active')
  document.body.classList.toggle('active')
}



 // ========================================== theme
  let lis = document.querySelectorAll(".theme-select li");
//   let show = document.querySelector(" .theme .show");
  
  let root = document.querySelector(':root');
  let rootstyles = getComputedStyle(root);
  let primaryColor = rootstyles.getPropertyValue('--primary-color');
  
  

  //
  if (window.localStorage.getItem("color")) {
      // if there is color in local storage
      // add color to div
      root.style.setProperty('--primary-color', window.localStorage.getItem("color"));
      root.style.setProperty('--hover-bg', window.localStorage.getItem("hover"));
      root.style.setProperty('--color-clicked', window.localStorage.getItem("hover"));
      // show.style.backgroundColor = window.localStorage.getItem("color");
      
  
      // remove active class from all lis
      lis.forEach((li) => {

        
        
          li.classList.remove("active");


          
      });
      // add active class to current color
      // document.querySelector(`[data-color="${window.localStorage.getItem("color")}"]`).classList.add("active");
  
  
  }
  // else {
      
  // }
  
      lis.forEach((li) => {
          li.addEventListener("click", (e) => {
              console.log(e.currentTarget.dataset.color);
  
              // REMOVE ACTIVE CLASS FROM ALL LIS
              lis.forEach((li) => {
                  li.classList.remove("active");
              });
  
              // ADD ACTIVE CLASS TO CURRENT ELEMENT
              e.currentTarget.classList.add("active");
  
              // ADD CURRENT COLOR TO LOCAL STORAGE
              window.localStorage.setItem("color", e.currentTarget.dataset.color);
              window.localStorage.setItem("hover", e.currentTarget.dataset.hover);
  
              // change div show backgroud color
              
            //   show.style.backgroundColor = e.currentTarget.dataset.color;
              root.style.setProperty('--primary-color', e.currentTarget.dataset.color);
              root.style.setProperty('--hover-bg', e.currentTarget.dataset.hover);
              root.style.setProperty('--color-clicked', e.currentTarget.dataset.hover);
          });
      });
  
  // byme