//index.js
//获取应用实例
var app = getApp()
Page({
  data: {
    swiper: {
      images: [//TODO get data from server
        {
          id: '0',
          src: '../../images/home.png'
        },
        {
          id: '1',
          src: '../../images/home.png'
        },
        {
          id: '2',
          src: '../../images/home.png'
        },
        {
          id: '3',
          src: '../../images/home.png'
        },
        {
          id: '4',
          src: '../../images/home.png'
        },
        {
          id: '5',
          src: '../../images/home.png'
        },
      ]
    },
    buttons: [//TODO get data from server,
      {
        id: '0',
        name: '肉蛋'
      },
      {
        id: '1',
        name: '千货'
      },
      {
        id: '2',
        name: '特饮'
      },
      {
        id: '3',
        name: '速食'
      },
      {
        id: '4',
        name: '肉蛋'
      },
      {
        id: '5',
        name: '千货'
      },
      {
        id: '6',
        name: '特饮'
      },
    ],
    products: [//TODO get data from server
      {
        id: '0',
        src: '../../images/commodity.png',
        description: '奶油味夏威夷果 奶油口味特产干货干果 坚果零食小吃袋装',
        price1: '69.00',
        price2: '59.00'
      },
      {
        id: '1',
        src: '../../images/commodity.png',
        description: '奶油味夏威夷果 奶油口味特产干货干果 坚果零食小吃袋装',
        price1: '43.00',
        price2: '35.00'
      },
      {
        id: '2',
        src: '../../images/commodity.png',
        description: '奶油味夏威夷果 奶油口味特产干货干果 坚果零食小吃袋装',
        price1: '89.00',
        price2: '69.00'
      },
      {
        id: '3',
        src: '../../images/commodity.png',
        description: '奶油味夏威夷果 奶油口味特产干货干果 坚果零食小吃袋装',
        price1: '169.00',
        price2: '159.00'
      },
      {
        id: '4',
        src: '../../images/commodity.png',
        description: '奶油味夏威夷果 奶油口味特产干货干果 坚果零食小吃袋装',
        price1: '29.00',
        price2: '19.00'
      },
    ]
  },
  detailClick: function (e) {
    wx.navigateTo({
      url: '../productDetail/productDetail'
      
      //url: '../waitingOrder/waitingOrder'
      //url: '../retreatOrder/retreatOrder'
    });
  },
  /**
   * 生命周期函数--监听页面加载
   */
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
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})