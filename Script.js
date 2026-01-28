
  document.querySelector(".hero-form form").addEventListener("submit", function(e) {
    e.preventDefault();
    alert("Form submitted successfully!");
  });


function scrollToForm() {
  const form = document.getElementById("appointment-form");
  if (form) {
    form.scrollIntoView({
      behavior: "smooth",
      block: "center"
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {

  const images = document.querySelectorAll(".simple-carousel img");
  const nextBtn = document.querySelector(".next-btn");
  const prevBtn = document.querySelector(".prev-btn");

  let current = 0;

  function showImage(index) {
    images.forEach(img => img.classList.remove("active"));
    images[index].classList.add("active");
  }

  nextBtn.addEventListener("click", () => {
    current = (current + 1) % images.length;
    showImage(current);
  });

  prevBtn.addEventListener("click", () => {
    current = (current - 1 + images.length) % images.length;
    showImage(current);
  });

  showImage(current);
});






