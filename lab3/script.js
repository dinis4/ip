var previous = document.getElementById("btnPrev");
var next = document.getElementById("btnNext");
var gallery = document.getElementById("image-gallery");
var pageIndicator = document.getElementById("page");
var galleryDots = document.getElementById("gallery-dots");
// https://wallpaperaccess.com/500x500
var images = [];
for (var i = 0; i < 12; i++) {
  images.push({
    source: `img/${i}.jpg`,
  });
}

var perPage = 8;
var page = 1;
var pages = Math.ceil(images.length / perPage);

for (var i = 0; i < pages; i++) {
  var dot = document.createElement("button");
  var dotSpan = document.createElement("span");
  var dotNumber = document.createTextNode(i + 1);
  dot.classList.add("gallery-dot");
  dot.setAttribute("data-index", i);
  dotSpan.classList.add("sr-only");

  dotSpan.appendChild(dotNumber);
  dot.appendChild(dotSpan);

  dot.addEventListener("click", function (e) {
    var self = e.target;
    goToPage(self.getAttribute("data-index"));
  });

  galleryDots.appendChild(dot);
}

previous.addEventListener("click", function () {
  if (page === 1) {
    page = 1;
  } else {
    page--;
    showImages();
  }
});

next.addEventListener("click", function () {
  if (page < pages) {
    page++;
    showImages();
  }
});

function goToPage(index) {
  index = parseInt(index);
  page = index + 1;

  showImages();
}

function showImages() {
  while (gallery.firstChild) gallery.removeChild(gallery.firstChild);

  var offset = (page - 1) * perPage;
  var dots = document.querySelectorAll(".gallery-dot");

  for (var i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  dots[page - 1].classList.add("active");

  for (var i = offset; i < offset + perPage; i++) {
    if (images[i]) {
      var template = document.createElement("div");
      var title = document.createElement("p");
      var img = document.createElement("img");

      template.classList.add("template");
      img.setAttribute("src", images[i].source);
      img.setAttribute("alt", images[i].title);

      template.appendChild(img);
      template.appendChild(title);
      gallery.appendChild(template);
    }
  }

  var galleryItems = document.querySelectorAll(".template");
  for (var i = 0; i < galleryItems.length; i++) {
    var onAnimateItemIn = animateItemIn(i);
    setTimeout(onAnimateItemIn, 100);
  }

  function animateItemIn(i) {
    var item = galleryItems[i];
    return function () {
      item.classList.add("animate");
    };
  }

  pageIndicator.textContent = "Страница " + page + " из " + pages;
}

showImages();
