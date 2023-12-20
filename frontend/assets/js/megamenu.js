let bgElems = document.querySelectorAll('.nav-item [data-bg]');

document.querySelectorAll('.megamenu[data-bg]').forEach(item => {
    item.style.setProperty('--bgimg', `url(${item.dataset.bg})`);
});

bgElems.forEach(el => {
    el.addEventListener('mouseenter', e => {
        if (e.target.classList.contains('megamenu')) {
            // parent Block 
            let img = e.target.closest('.megamenu').dataset.bg;
            e.target.closest('.megamenu').style.setProperty('--bgimg', `url(${img})`);
        }
        else {
            // Child Blocks
            let img = e.target.closest('[data-bg]').dataset.bg;
            e.target.closest('.megamenu').style.setProperty('--bgimg', `url(${img})`);
        }
    });
});