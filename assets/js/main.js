
const navItems = document.querySelector('.navbar-list');
const openNavBtn = document.querySelector('.open_nav-btn');
const closeNavBtn = document.querySelector('.close_nav-btn');

//  OPEN NAV 

const openNav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
};

//  CLOSE NAV 

const closeNav = () => {
    navItems.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';
};

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);

