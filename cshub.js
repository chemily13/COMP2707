
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function validateForm() {
  let x = document.forms["myForm"]["name"].value;
  let y = document.forms["myForm"]["email"].value;
  let z = document.forms["myForm"]["subject"].value;
  let q = document.forms["myForm"]["message"].value;
  if (x == "") {
    alert("Name cannot be left blank");
    return false;
  }
   if (y == "") {
    alert("Email cannot be left blank");
    return false;
  }
   if (z == "") {
    alert("Subject cannot be left blank");
    return false;
  }
   if (q == "") {
    alert("Message cannot be left blank");
    return false;
  }
}


// Search bar on the tutorials page. Allows users to search for specific items.
function search() {
    var searchTerm = document.getElementById('searchInput').value.toLowerCase(); // Get the search term from the user input.
    var paragraphs = document.getElementsByTagName('p'); // Get all <p> elements, these are the only HTML elements I want the search bar to look through.

    var searchResults = document.getElementById('searchResults');
    searchResults.innerHTML = ''; // Clear previous search results so the user will only see results of what they are currently searching.

    // Performs the search function
    setTimeout(function() {
        for (var i = 0; i < paragraphs.length; i++) {
            var paragraphText = paragraphs[i].textContent.toLowerCase(); // Get the text content of each paragraph
            if (paragraphText.includes(searchTerm)) { // Check if the paragraph contains the search term
                var result = document.createElement('p');
                result.textContent = paragraphs[i].textContent;
                searchResults.appendChild(result); // Display the paragraph in search results
            }
        }
    }, 0);
}


