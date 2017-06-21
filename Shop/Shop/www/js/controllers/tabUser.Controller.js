angular.module('shop.controllers')

.controller('tabUserCtrl', function ($scope, $state, $ionicHistory) {
    /*
        Called when user click 'back' arrow
    */
    $scope.goBack = function () {
        $ionicHistory.goBack();
    };
    /*
        Called when user click 'list' item
    */
    $scope.goPage = function (_page) {
        switch (_page) {
            case 'store'://门店自提订单
                $state.go('storeOrder');
                break;
            case 'delivery': //快递配送订单
                $state.go('deliveryOrder');
                break;
            case 'user': //我的拼团
                $state.go('userGroup');
                break;
            case 'address': //管理收货地址

                break;
            case 'customer': //客服电话

                break;
        }
    };
})