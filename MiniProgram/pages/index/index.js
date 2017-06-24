//index.js
//获取应用实例
var app = getApp()
Page({
  data: {
    swiper: {
      images: ['1', '2', '3', '4', '5', '6', '7']//TODO get data from server
    },
    buttons: ['肉蛋', '千货', '特饮', '速食', '肉蛋', '千货', '特饮', '速食'],//TODO get data from server,
    products: ['1', '2', '3', '4', '5', '6', '7']
  },
  detailClick: function(e){
    wx.navigateTo({
      url: '../productDetail/productDetail'
    });
  },
  //事件处理函数
  onLoad: function () {
    console.log('onLoad')
    var that = this
    //调用应用实例的方法获取全局数据
    app.getUserInfo(function (userInfo) {
      //更新数据
      that.setData({
        //userInfo:userInfo
      })
    })
  }
})