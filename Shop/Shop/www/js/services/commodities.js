angular.module('shop.services')

.factory('commodities', function () {
    var commodities = [];//TODO should get datas from server
    for (var i = 0; i < 20; i++) {
        commodities.push({//generate virtual data
            id: i,
            url: 'img/commodity.png',
            description: '奶油味夏威夷果 奶油口味特产干货干果 坚果零食小吃袋装',
            price1: '69.00',
            price2: '59.00'
        })
    }
    
    return {
        getAll: function () {
            return commodities;
        },
        getById: function () {

        },
        getLength: function () {

        },
    }
})