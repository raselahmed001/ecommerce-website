"use strict";

document.addEventListener('DOMContentLoaded', function () {
    // Find the trigger
    const trigger = document.querySelector('#kt_header_user_menu_toggle');
    const menuElement = trigger?.nextElementSibling;

    // Only initialize if it hasn't already
    if (trigger && menuElement && !KTMenu.getInstance(menuElement)) {
        KTMenu.createInstances(); // Safe way to initialize all menus
    }
});
