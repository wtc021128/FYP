//click profile
let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("active");
});


//
function toggleSubMenu(id) {
  var submenu = document.getElementById(id);
  submenu.style.display = "block";
}

function hideSubMenu(id) {
  var submenu = document.getElementById(id);
  submenu.style.display = "none";
}

//
// 获取用户图像的URL
var adminImageUrl = document.getElementById('admin-image-url').value;

// 将用户图像的URL应用到.profile-img的背景中
document.querySelector('.profile-img').style.backgroundImage = 'url(' + adminImageUrl + ')';
