// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('shop', ['ionic', 'shop.controllers', 'shop.services', 'shop.directives'])

.run(function ($ionicPlatform) {
    $ionicPlatform.ready(function () {
        // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
        // for form inputs)
        if (cordova.platformId === "ios" && window.cordova && window.cordova.plugins && window.cordova.plugins.Keyboard) {
            cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
            cordova.plugins.Keyboard.disableScroll(true);
        }
        if (window.StatusBar) {
            // org.apache.cordova.statusbar required
            StatusBar.styleDefault();
        }
    });
})

.config(function ($stateProvider, $urlRouterProvider, $ionicConfigProvider) {
    $ionicConfigProvider.tabs.position('bottom');
    // Ionic uses AngularUI Router which uses the concept of states
    // Learn more here: https://github.com/angular-ui/ui-router
    // Set up the various states which the app can be in.
    // Each state's controller can be found in controllers.js
    $stateProvider
    // setup an abstract state for the tabs directive
    .state('tab', {
        url: '/tab',
        abstract: true,
        templateUrl: 'templates/main/tabs.html',
        controller: 'tabCtrl'
    })
    .state('tab.home', {
        url: '/home',
        views: {
            'tab-home': {
                templateUrl: 'templates/main/tabHome.html',
                controller: 'tabHomeCtrl'
            }
        }
    })
    .state('tab.user', {
        url: '/user',
        views: {
            'tab-user': {
                templateUrl: 'templates/main/tabUser.html',
                controller: 'tabUserCtrl'
            }
        }
    })
    .state('commodityDetail', {
        url: '/commodityDetail',
        templateUrl: 'templates/main/commodityDetail.html',
        controller: 'commodityDetailCtrl'
    })
    .state('storeOrder', {
        url: '/storeOrder',
        templateUrl: 'templates/main/storeOrder.html',
        controller: 'storeOrderCtrl'
    })
    .state('deliveryOrder', {
        url: '/deliveryOrder',
        templateUrl: 'templates/main/deliveryOrder.html',
        controller: 'deliveryOrderCtrl'
    })
    .state('userGroup', {
        url: '/userGroup',
        templateUrl: 'templates/main/userGroup.html',
        controller: 'userGroupCtrl'
    })
    .state('pendingOrder', {
        url: '/pendingOrder',
        templateUrl: 'templates/main/pendingOrder.html',
        controller: 'pendingOrderCtrl'
    })
    .state('shppingAddress', {
        url: '/shippingAddress',
        templateUrl: 'templates/main/shippingAddress.html',
        controller: 'shippingAddressCtrl'
    })
    // if none of the above states are matched, use this as the fallback
    $urlRouterProvider.otherwise('/tab/home');
});
