angular.module('shop.controllers')

.controller('deliveryOrderCtrl', function ($scope, $state, $ionicHistory) {
    /*
        Called when user click 'back' arrow
    */
    $scope.goBack = function () {
        $ionicHistory.goBack();
    };
})