// page/personList/personlist.js
import {guest} from "../../api/index.js"
Page({
  /**
   * 页面的初始数据
   */
  data: {
    name:'',
    mobile:'',
    desc:'',
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
  },

  //输入保存
  inInput: function (e) {
    var that = this;
    var id = e.currentTarget.dataset.id;
    that.setData({
      [id]: e.detail.value
    })
  },
  //提交表单
  formSubmit: function (e) {
    var that = this;
    var name = that.data.name;
    var mobile = that.data.mobile;
    var desc = that.data.desc;
    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(19[0-9]{1}))+\d{8})$/;
    if (mobile == "" || name == "") {
      wx.showModal({
        title: '提示',
        content: '请完善您的信息',
        showCancel: false,
        success: function (res) {
          if (res.confirm) {

          }
        }
      })
    }else{
      if (!myreg.test(mobile)) {
        wx.showModal({
          title: '提示',
          content: '手机号格式有误',
          showCancel: false,
          success: function (res) {
            if (res.confirm) {
            }
          }
        })
        return false;
      }else{
        guest(e.detail.value).then(res=>{
          if (res.code == '1001') {
            wx.showModal({
              title: '提示',
              content: '预约成功',
              showCancel: false,
              success: function (res) {
                if (res.confirm) {
                  // wx.navigateBack({

                  // });
                }
              }
            })
          } else {
            wx.showModal({
              title: '提示',
              content: res.msg,
              showCancel: false,
              success: function (res) {
                if (res.confirm) {
                }
              }
            })
          }

        })
        
      }
    }
  
  }
})