// pages/productDetail/productDetail.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    swiper: {
      images: ['1', '2', '3', '4', '5', '6', '7']//TODO get data from server
    },
    users: [
      {
        id: '0',
        src: '../../images/user.png'
      },
      {
        id: '1',
        src: '../../images/user.png'
      },
    ],
    modalRetreatHidden: true,
    modalFireHidden: true,
    actionSheetHidden: true,
    commodityCount: 0
  },
  /*
    Called when user click question mark in 七天包退, 十四天包换 to show modal
  */
  modalRetreat: function (e) {
    this.setData({
      modalRetreatHidden: false
    })
  },
  /*
    Called when user click 确定 to hide modal
  */
  modalRetreatChange: function (e) {
    this.setData({
      modalRetreatHidden: true
    })
  },
  /*
    Called when user click question mark in 火热拼团 to show modal
  */
  modalFire: function (e) {
    this.setData({
      modalFireHidden: false
    })
  },
  /*
    Called when user click 确定 to hide modal
  */
  modalFireChange: function (e) {
    this.setData({
      modalFireHidden: true
    })
  },
  /*
    Called when user click 立即购买, 发起拼团, 去参团
  */
  actionSheetTap: function (e) {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden,
      commodityCount: 0
    })
  },
  /*
    Called when user click close button in actionsheet
  */
  actionSheetChange: function (e) {
    this.setData({
      actionSheetHidden: !this.data.actionSheetHidden
    })
  },
  /*
    Called when user click + in actionsheet
  */
  increaseCount: function (e) {
    this.setData({
      commodityCount: this.data.commodityCount + 1
    })
  },
  /*
    Called when user click - in actionsheet
  */
  decreaseCount: function (e) {
    if (this.data.commodityCount > 0) {
      this.setData({
        commodityCount: this.data.commodityCount - 1
      })
    }
  },
  /*
    Called when user click '下一步' button
  */
  goPending: function (e) {
    if (this.data.commodityCount == 0) {
      var that = this;
      wx.showModal({
        title: '提示',
        content: '请插入购买数量!',
        success: function (res) {
          if (res.confirm) {
            console.log('confirm')
          } else if (res.cancel) {
            that.setData({
              actionSheetHidden: !that.data.actionSheetHidden
            })
            console.log('cancel')
          }
        }
      })
    } else {
      this.setData({
        actionSheetHidden: !this.data.actionSheetHidden
      })
      wx.navigateTo({
        url: '../pendingOrder/pendingOrder'
      });
    }
  }
})