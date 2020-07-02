const baseUrl = 'http://test.com/addons/weapp/api.';

const apiUrl = str => {
    return baseUrl + str;
}
let api = {
    $http: {
        get(url, params) {
            return this.com(url, params, "GET")
        },
        post(url, params) {
            return this.com(url, params, "POST")
        },
        com: function (url, params, method) {
            wx.showNavigationBarLoading();
            return new Promise(function (resolve, reject) {
                wx.request({
                    url: apiUrl(url),
                    data: params,
                    method: method,
                    header: {
                        token: wx.getStorageSync("token"),
                        'content-type': 'application/x-www-form-urlencoded'
                    },
                    success: function (res) {
                        resolve(res.data)
                    }
                    , fail: function (res) {
                        reject(res)
                    },
                    complete: function (res) {
                        wx.hideNavigationBarLoading();
                    }
                })
            })
        }
    }
}
module.exports = api;
