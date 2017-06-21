angular.module('shop.services')

.factory('slideImages', function () {
    var homeImages = [];//TODO should get data from server
    var commodityImages = [];//TODO should get data from server
    for (var i = 0; i < 8; i++) {
        homeImages.push({
            id: i,
            url: 'img/home.png',
        });
        commodityImages.push({
            id: i,
            url: 'img/commodity-detail.png',
        });
    }
    return {
        getAllHomeImages: function () {
            return homeImages;
        },
        getAllCommodityImages: function () {
            return commodityImages;
        }
    }
})