var api = require("../utils/request.js")
const product = re => {
  return api.$http.get("product/product", re)
}

const detail = re => {
  return api.$http.get("product/detail", re)
}

const cases = re => {
  return api.$http.get("product/cases", re)
}

const brand = re => {
  return api.$http.get("product/brand", re)
}

const product_cat = re => {
  return api.$http.get("product/product_cat", re)
}

const cases_cat = re => {
  return api.$http.get("product/cases_cat", re)
}

module.exports = {
  product: product,
  product_cat: product_cat,
  detail: detail,
  cases: cases,
  cases_cat: cases_cat,
  brand:brand
};