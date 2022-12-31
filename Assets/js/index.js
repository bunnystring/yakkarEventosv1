window.sr = ScrollReveal();

    sr.reveal('.container__menu', {
        duration: 1000,
        origin: 'botton',
        distance: '-100px',
        scale: 0.10
    });

    sr.reveal('.content__slider', {
        duration: 4000,
        origin: 'bottom',
        distance: '-100px',
        rotate:{
            x: 10,
            y:150,
            z:10
        },
        delay: 1000,
    reset: true,
    useDelay: 'two'
    });

    sr.reveal('.slideshow .slider', { container: '.slider' });

  