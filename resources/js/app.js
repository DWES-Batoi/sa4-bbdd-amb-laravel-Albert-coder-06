import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


if (window.Echo) {
    console.log('Echo inicialitzat. Escoltant al canal "futbol-femeni"...');
    window.Echo.channel('futbol-femeni')
    .subscribed(() => {
        console.log('Subscrit correctament al canal "futbol-femeni"');
    })
    .error((error) => {
        console.error('Error en el canal "futbol-femeni":', error);
    })
    .listen('.PartitActualitzat', (e) => {
        console.log('PartitActualitzat rebut REVERB:', e);
        window.dispatchEvent(new CustomEvent('classificacio-delta', { detail: e.delta }));
    });
} else {
    console.warn('Echo no està inicialitzat (window.Echo no existeix).');
}