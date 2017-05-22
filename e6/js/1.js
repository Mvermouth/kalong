'use strict';

var E = Array.from('hello');
console.log(E);

var namesSet = new Set(['a', 'b']);
var H = Array.from(namesSet); // ['a', 'b']
console.log(namesSet);