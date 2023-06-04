
//// Get slider Items | Array.from [ES6 Feature]



let sliderImages = Array.from(document.querySelectorAll('.slide-container img'));

// Get Number Of slider 
let slidesCount = sliderImages.length;

// Set Current slide 
let currentSlide = 1;

// Slide Number Element 
let slideNumberElement = document.getElementById('slide-number');


// Previous and Next Buttons
let nextButton = document.getElementById('next');
let prevButton = document.getElementById('prev');   

// Hanle Click on Previous And Next Buttons
nextButton.onclick= nextSlide;
prevButton.onclick = prevSlide; 

// Creat the Main Ul Element 
let paginationElement = document.createElement('ul');

// Set ID On Created Ul Element 
paginationElement.setAttribute('id', 'pagination-ul');

// Create List ITems Based On slides Count
for (let i = 1; i <= slidesCount; i++) { 
    
    // Creat The LI
    let paginationItem = document.createElement('li');

    // Set Custom Attribute
    paginationItem.setAttribute('data-index', i);

    // Set Item Content
    paginationItem.appendChild(document.createTextNode(i));

    // Append Items to the Main Ul List
    paginationElement.appendChild(paginationItem);
    
}

// Add The Created Ul Element to the page
document.getElementById('indicators').appendChild(paginationElement);

// Get the new Createed Ul 
let paginationCreatedUl = document.getElementById('pagination-ul');

// Get pagination itmes | Array.from [ES6 Feature]
let paginationBullets = Array.from(document.querySelectorAll('#pagination-ul li'));

// Loop Through All Bullets Items

for (var i = 0; i < paginationBullets.length; i++) {
    paginationBullets[i].onclick = function () {
        currentSlide = parseInt(this.getAttribute('data-index'));

        theChecker();
    }
}

// Trigger The Checker Function
theChecker();

// Next Slide Function
function nextSlide() {
    if (nextButton.classList.contains('disabled')) {
        // thanks function we don't need any thing from you
    } else {
        currentSlide++;

        theChecker();
    }
}

// Previous Slide Function 
function prevSlide() {
    if (prevButton.classList.contains('disabled')) {
        // Do nothin
    } else {
        currentSlide--;
        theChecker();
    }
}


// Create the Checker funciton
function theChecker() {

    // Set The Slide Number
    slideNumberElement.textContent = 'صورة رقم ' + (currentSlide) + ' من ' + (slidesCount);

    // Remove All Active Classes
    removeAllActive();

    // Set Actie Class On Current Slide
    sliderImages[currentSlide - 1].classList.add('active');

    // Set Active Class ON Current Pagination Item
    paginationCreatedUl.children[currentSlide - 1].classList.add('active');

    // Check if Current Slide is the first
    if (currentSlide == 1) {
        // Add Disabled Class on previous Button
        prevButton.classList.add('disabled');

    } else {
        // Remove Disabled Class From Previous Button
        prevButton.classList.remove('disabled');

    }

    // Check if current slide is the Last
    if (currentSlide == slidesCount) {
        // Add Disabled on Next Button
        nextButton.classList.add('disabled');
    } else {
        // Remove Disabled Class From Next Button
        nextButton.classList.remove('disabled');
    }
}

// Remove All ACtive Classes From Images And Pagination Bullets
function removeAllActive() {

    // Loop Through Images
    sliderImages.forEach(function (img) {
        img.classList.remove('active');
    });

    // Loop thruogh Pagination Bullets
    paginationBullets.forEach(function (Bullet) {
        Bullet.classList.remove('active');
    });
}