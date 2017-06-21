angular.module('shop.controllers')

.controller('pendingOrderCtrl', function ($scope, $state, $ionicHistory) {
    $scope.deliveryClass = 'active';
    $scope.storeClass = '';
    /*
        Called when user click 'back' arrow
    */
    $scope.goBack = function () {
        $ionicHistory.goBack();
    };
    /*
        Called when user click '快递配送' button
    */
    $scope.goDelivery = function () {
        if ($scope.storeClass == 'active') {
            $scope.storeClass = '';
            $scope.deliveryClass = 'active';
        }
    };
    /*
        Called when user click '门店自提' button
    */
    $scope.goStore = function () {
        if ($scope.deliveryClass == 'active') {
            $scope.deliveryClass = '';
            $scope.storeClass = 'active';
        }
    };
    /*
        Called when user click '编辑' button
    */
    $scope.goShippingAddress = function () {
        $state.go('shppingAddress');
    };
})