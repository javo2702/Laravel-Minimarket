// import './bootstrap';
function opencloseMobileMenu() {
    var links = document.getElementById('links');
    if (links.classList.contains('none')) {
        links.classList.add('flex');
        links.classList.remove('none');
    } else {
        links.classList.remove('flex');
        links.classList.add('none');
    }
}
function opencloseCartPopup() {
    var links = document.getElementById('cart_popup');
    if (links.classList.contains('none')) {
        links.classList.add('block');
        links.classList.remove('none');
    } else {
        links.classList.remove('block');
        links.classList.add('none');
    }
}
function opencloseSearchBar() {
    var links = document.getElementById('search_bar');
    if (links.classList.contains('none')) {
        links.classList.add('flex');
        links.classList.remove('none');
    } else {
        links.classList.remove('flex');
        links.classList.add('none');
    }
}

