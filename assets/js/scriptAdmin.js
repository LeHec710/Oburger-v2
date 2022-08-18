
// ### POPOP ###
const closePopupEl = document.getElementById("close-popup");
const popupEl = document.getElementById("popup");
const popupContentEl = document.getElementById("popup-text");
const deleteBurgersEl = document.querySelectorAll(".deleteBurger");
const editBurgersEl = document.querySelectorAll(".editBurger");
const editingBurgerEl = document.querySelectorAll(".element.edit");

// close popup
closePopupEl.addEventListener("click", () => {
    popupEl.classList.toggle("hidden");
});

// show burger popup (delete)
deleteBurgersEl.forEach(function(deleteBurgerEl) {
    deleteBurgerEl.addEventListener("click", (e) => {
        const burgerId = e.target.getAttribute("burgerId");
        const popupContent = "<h2>Êtes-vous sûr de vouloir supprimer ce burger ?</h2><form method='post'><input type='hidden' name='burgerId' value='" +burgerId+ "'><input type='submit' name='deleteBurger' value='Confirmer' /></form>";
        popupContentEl.innerHTML = popupContent;
        popupEl.classList.toggle("hidden");
    });
})

// show edit burger el events
editBurgersEl.forEach(function(editBurgerEl) {
    editBurgerEl.addEventListener("click", (e) => {
        const burgerId = e.target.getAttribute("burgerId");
        showEditBurger(burgerId);
    });
})

// show edit burger el function
function showEditBurger(id) {
    editingBurgerEl.forEach(function(editingBurger) {
        if(editingBurger.getAttribute("editingBurger") == id) {
            editingBurger.classList.toggle("hidden");
        }
    });
}

// ### navbar ###
const menus = ["burgers", "users", "sales"];
const menusEl = document.querySelectorAll(".sidebar .nav ul li.extendable");
const urlParams = new URLSearchParams(window.location.search);

// active menus
menus.forEach(function(menu) {
    if(urlParams.has("menu") && urlParams.get("menu") == menu) {
        const activeMenu = document.getElementById(menu);
        activeMenu.classList.toggle("active");
    }
})

// submenus
menusEl.forEach(function(menu) {
    menu.addEventListener("mouseenter", (e) => {
        const submenu = menu.querySelector("#submenu");
        submenu.classList.toggle("hidden");
    });
    menu.addEventListener("mouseleave", (e) => {
        const submenu = menu.querySelector("#submenu");
        submenu.classList.toggle("hidden");
    });
})

