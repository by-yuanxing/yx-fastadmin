// pages/brand/index.js
var api = require('../../api/product.js');
Page({
  /**
   * 页面的初始数据
   */
  data: {
    height: wx.getSystemInfoSync().windowHeight,
    list: [],
    total: 0,
    curPage: 1,
    pageSize: 6,
    totalPage: 0,
    tip: "false"
  },
  /**
  * 生命周期函数--监听页面加载
  */
  onLoad: function (options) {
    this.loading();
  },
  onPullDownRefresh: function () {
    this.setData({
      list: [],
      total: 0,
      curPage: 1,
      pageSize: 0,
      last_page: 0
    })
    this.loading();  //下拉刷新 
    wx.showToast({
      title: '已刷新',
      icon: "none"
    })
  },
  onReachBottom: function (event) {
    this.loading();  //下拉刷新
  },
  /**
    * 下拉加载跟多
    * 
    */
  loading: function (e) {
    let that = this;
    api.brand({ page: that.data.curPage }).then(re => {
      var list = that.data.list, curpage = that.data.curPage;
      that.setData({
        total: re.data.total,
        pageSize: re.data.per_page,
        last_page: re.data.last_page
      })
      // console.log(curpage, that.data.last_page)
      if (curpage <= that.data.last_page) {
        re.data.data.forEach(function (v, index) {
          list.push(v)
        })
        ++curpage
        that.setData({
          list: list,
          curPage: curpage,
          tip: curpage > that.data.last_page ? "true" : "false"
        })
      } else {
        throw Error("没有数据了")
      }
    }).catch((re) => {
      wx.showToast({
        title: '没有数据了',
        icon: "none"
      })
    })
  }
})