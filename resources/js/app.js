import './bootstrap';
import $ from 'jquery';
import Alpine from 'alpinejs';
import Choices from 'choices.js';

document.addEventListener('DOMContentLoaded', function () {
    const select = document.getElementById('existing_clients');
    const choices = new Choices(select);
});

window.Alpine = Alpine;

Alpine.start();
