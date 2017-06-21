angular.module('shop.services')

.factory('groupUsers', function () {
    var groupUsers = [];//TODO should get data from server
    for (var i = 0; i < 2; i++) {
        groupUsers.push({//generate virtual data
            id: i,
            url: 'img/user.png',
        })
    };
    return {
        getAllUsers: function () {
            return groupUsers;
        },
        getUserById: function () {

        },
        getLength: function () {

        }
    }
})