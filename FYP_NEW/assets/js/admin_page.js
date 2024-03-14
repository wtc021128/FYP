//click profile
let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("active");
});

//
// Selecting the sidebar element
const sidebar = document.querySelector(".sidebar");

// Selecting the sidebar close button
const sidebarClose = document.querySelector("#sidebar-close");

// Selecting the menu list
const menu = document.querySelector(".menu-list");

// Selecting all submenu items
const menuItems = document.querySelectorAll(".submenu-item");

// Selecting all submenu titles
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");


sidebarClose.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

// Looping through each submenu item
menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");
    // Looping through all submenu items again to remove the "show-submenu" class from other items
    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
    // Removing the "show-submenu" class from the submenu item if it's not the clicked item
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});