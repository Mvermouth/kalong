//promise 语法
var promise = new Promise(function(resolve, reject) {
  var A=false;

  if (A){
    resolve("1");
  } else {
    reject("2");
  }
}).then((value)=>{
	console.log(value);
},(err)=>{
	console.log(err);
})