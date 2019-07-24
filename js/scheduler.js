const schedulerConfig = function ($routeProvider) {
    $routeProvider
    .when('/', {
        controller : 'home',
        templateURL : 'views/home.html'
    })
    .when('/businessUnits', {
        controller : 'businessUnits',
        templateURL : 'views/businessUnits.html'
    })
    .when('/businessUnits/:businessUnitId', {
        controller : 'businessUnits',
        templateUrl : 'views/businessUnit.html'
    })
    .when('/salons', {
        controller: 'salon',
        templateUrl : 'views/salons.html'
    })
    .when('/salons/:salonId', {
        controller: 'salon',
        templateUrl : 'views/salon.html'
    })
    .when('/stylists', {
        controller : 'stylist',
        templateUrl : 'views/stylists.html'
    })
    .when('/stylists/:stylistId', {
        controller : 'stylist',
        templateUrl : 'views/stylist.html'
    })
    .when('/clients', {
        controller : 'client',
        templateUrl : 'views/clients.html'
    })
    .when('/clients/:clientId', {
        controller : 'client',
        templateUrl : 'views/client.html'
    })
    .when('/appointments/:salonId/:stylistId', {
        controller : 'appointment',
        templateUrl : 'views/appointments.html'
    })
    .when('/appointments/:appointmentId', {
        controller : 'appointment',
        templateUrl : 'views/appointment.html'
    })
};

const scheduler = angular.module('scheduler', ['ngRoute']).config(schedulerConfig);