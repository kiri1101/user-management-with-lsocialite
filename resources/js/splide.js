import '@splidejs/splide/css/skyblue';
import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';

// new Splide( '.splide' ).mount( { AutoScroll } );

new Splide( '#splide1', {
    gap: 10,
    arrows: false,
} ).mount();

new Splide( '#splide2', {
    gap: 2,
    perPage: 3,
    arrows: false,
    type   : 'loop',
    drag   : 'free',
    focus  : 'center',
    pagination: false,
    autoScroll: {
        speed: 0.35,
        pauseOnHover: true,
     }
} ).mount( { AutoScroll } );