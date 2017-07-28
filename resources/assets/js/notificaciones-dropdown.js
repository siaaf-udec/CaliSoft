/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'
import Vue from 'vue';
import Notifications from '../components/notifications/notifications'


window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: window.pusherKey,
    cluster: 'mt1',
    encrypted: true
});

new Vue({
    el: '#notificaciones',
    render(h) {
        return h(Notifications);
    }
})
