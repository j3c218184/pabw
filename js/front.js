$(function () {

    'use strict';

    lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true,
          'disableScrolling' :true
     });

     $('[data-toggle="tooltip"]').tooltip();

     /* =========================================
      * Leaflet map
      *  =======================================*/
     map();

});