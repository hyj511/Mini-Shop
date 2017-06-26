// pages/productDetail/productDetail.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    swiper: {
      images: ['1', '2', '3', '4', '5', '6', '7']//TODO get data from server
    },
    users: ['1', '2'],
    modalRetreatHidden: true,
    modalFireHidden: true
  },
  /*
    Called when user click question mark in 七天包退, 十四天包换 to show modal
  */
  modalRetreat: function (e) {
    this.setData({
      modalRetreatHidden: false
    })
  },
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
  modalFireChange: function (e) {
    this.setData({
      modalFireHidden: true
    })
  },
})