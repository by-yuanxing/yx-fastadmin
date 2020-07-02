//index.js
//获取应用实例
const app = getApp()
var api = require('../../api/index.js');
Page({
  data: {
    banner:[],
    brand:[],
    category: [
      { id: 1, image: "../../image/about.png",catname:"公司简介",url:"../about/index"},
      { id: 2, image: "../../image/product.png", catname: "产品展示" ,url: "../product/index"},
      { id: 3, image: "../../image/case.png", catname: "案例展示",url:"../case/index" },
      { id: 4, image: "../../image/contact.png", catname: "联系我们" ,url: "../about/contact"}
      ]
  },
  onLoad: function () {
    api.app().then(re => {
      this.setData({
        app: re
      })
    })
  },
  onShow:function(){
    api.banner().then(re => {
      this.setData({
        banner: re
      })
    })
    api.brand().then(re => {
      this.setData({
        brand: re
      })
    })
    api.product().then(re => {
      this.setData({
        product: re
      })
    })
    api.about().then(re => {
      this.setData({
        about: re
      })
    })
    api.cases().then(re => {
      this.setData({
        cases: re
      })
    })
  },
 call:function(){
    wx.makePhoneCall({
      phoneNumber: this.data.app.phone
    })
  },
  nav:function(){
    var that=this;
    wx.openLocation({
      latitude: Number(that.data.app.lat), 
      longitude: Number(that.data.app.long),
      name: that.data.app.title,
      address: that.data.app.address 
    })
  },
  onShareAppMessage: function () {
    return {
      title: this.data.app.title,
      desc: this.data.app.address,
      path: '/pages/index/index',
      imageUrl: this.data.banner[0].image,
    }
  },
  guest:function(){
    wx.navigateTo({
      url: '/pages/guest/index',
    })
  }
})
