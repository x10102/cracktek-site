var path = window.location.pathname;
var current = path.split("/").pop();

var pages = {'index.html': 'Hlavní Strana',
            'contact.html': 'Kontakty',
            'login.php': 'Přihlášení',
            'personal.html': 'Profil Majitele'
            };

navbar = document.getElementById("navbar");

var pagecount = Object.keys(pages).length;
var index = 0;

for(const [page, name] of Object.entries(pages)) {
    if(current == page) {
        navbar.innerHTML += `<a href="${page}" style="font-weight: 600;">${name}</a> `;
    } else {
        navbar.innerHTML += `<a href="${page}">${name}</a> `;
    }
    index++;
    if(index !== pagecount) {
        navbar.innerHTML += "/ ";
    }
}
