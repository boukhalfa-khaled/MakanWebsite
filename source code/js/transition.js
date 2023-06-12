window.onload = () => {
//   const anchors = document.querySelectorAll('a');
  const transition_el = document.querySelector('.transition');

  setTimeout(() => {
    transition_el.classList.remove('is-active');
  }, 500);

//   for (let i = 0; i < anchors.length; i++) {
//     const anchor = anchors[i];

//     anchor.addEventListener('click', e => {
//         let target = e.target.href;
//     //   e.preventDefault();

//       console.log(transition_el);

//       transition_el.classList.add('is-active');

//       console.log(transition_el);

//       setTimeout(() => {
//         window.location.href = target;
//       }, 500);
//     })
//   }
}