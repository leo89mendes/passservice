

var stateMenu = false;
document.getElementById('menuMobile').onclick = function(e){
    console.log(e)
    if(this.stateMenu)
    {
        this.stateMenu = false
        document.getElementById('menu_mobile').style.display = 'block';
        document.getElementById('close').style.display = 'block'
        document.getElementById('open').style.display = 'none'
    }else{
        this.stateMenu = true
        document.getElementById('menu_mobile').style.display = 'none';
        document.getElementById('open').style.display = 'block'
        document.getElementById('close').style.display = 'none'
    }
};

function scrollToSection(id) {
    const section = document.querySelector(id);
    window.scrollTo({
        behavior: 'smooth',
        top: section.offsetTop,
    });
}

// Attach click event listeners to menu items
document.querySelectorAll('.menu a').forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault(); // Prevent default anchor behavior
        const target = event.currentTarget.getAttribute('href');
        scrollToSection(target);
    });
});

