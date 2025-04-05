let hamburger = document.getElementById('toggleBtn');
let dSideBar = document.getElementById('dashboard-sidebar');
let dMainContainer = document.getElementById('dashboard-content-container');
let dLogo = document.getElementById('dashboard-logo');
let dUserImg = document.getElementById('dashboard-user-img');
let dLinkText = document.getElementsByClassName('dashboard-link-text');
let dMenu = document.getElementById('dashboard-menu');
let dLinkIcon = document.getElementsByClassName('dashboard-link')
let dUsername = document.getElementById('dashboard-user-name');
var sidebarIsOpen = true;

hamburger.addEventListener("click", (e) => {
    e.preventDefault();

    if(sidebarIsOpen) {
        dSideBar.style.width = '10%';
        dSideBar.style.transition = '.3s all';

        dMainContainer.style.width = '90%';
        dMainContainer.style.transition = '.3s all';
        
        dLogo.style.fontSize = '35px';
        dUserImg.style.marginRight = 0;

        dUsername.style.marginTop = '10px';

        
        for (var i = 0; i < dLinkText.length; i++) {
            dLinkText[i].style.display = "none";
            dLinkIcon[i].style.justifyContent = 'center';
            dLinkIcon[i].style.padding = '10px';
        }
        sidebarIsOpen = false;
    } else {
        dSideBar.style.width = '20%';
        dSideBar.style.transition = '.3s all';

        dMainContainer.style.width = '80%';
        dMainContainer.style.transition = '.3s all';

        dLogo.style.fontSize = '60px';
        dUserImg.style.marginRight = "10px";

        dUsername.style.marginTop = '10px';


        for (var i = 0; i < dLinkText.length; i++) {
            dLinkText[i].style.display = "flex";
            dLinkIcon[i].style.justifyContent = 'start';
            dLinkIcon[i].style.padding = '10px 10px 10px 30px';
        }

        sidebarIsOpen = true;
    }  
    

});
