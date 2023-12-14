const Editt = document.getElementById("Edit");
const overlayEditt = document.getElementById("overlayEdit");

function updatteForm() {
  overlayEditt.classList.toggle("hidden");
  Editt.classList.toggle("hidden");
}

editLinks.addEventListener("click", function (e) {
  console.log("first-test");
  e.preventDefault();
  updatteForm();
});

document.addEventListener("DOMContentLoaded", function () {
  const editLinks = document.querySelectorAll(".edit-link");

  // Attach click event listener to the edit link
  editLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      // Prevent the default link behavior (page reload)
      event.preventDefault();

      // Get the user_id from the data attribute
      const userId = link.getAttribute("data-user-id");

      // Call the updateForm function with the user_id
      updatteForm();
    });
  });
});
