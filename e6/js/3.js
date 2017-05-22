"use strict";

//promise 语法
var promise = new Promise(function (resolve, reject) {
  var A = false;

  if (A) {
    resolve("1");
  } else {
    reject("2");
  }
}).then(function (value) {
  console.log(value);
}, function (err) {
  console.log(err);
});