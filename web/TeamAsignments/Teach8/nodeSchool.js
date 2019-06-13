//STEP 1 - Hello World - learnyounode verify nodeSchool.js

console.log('HELLO WORLD');
//STEP 2 - Baby Steps - learnyounode verify nodeSchool.js
var result = 0;

  for (var i = 2; i < process.argv.length; i++){
    result += Number(process.argv[i]);
}
  console.log(result);

  //OR different code

  var num = process.argv.slice(2).reduce(function(preVal, curVal){
      return preVal + Number(curVal);
  }, 0);
  console.log(num);


//STEP 3 - My first I/O - learnyounode verify nodeSchool.js
var fs = require('fs');
var result = fs.readFileSync(process.argv[2]).toString().split('\n').length - 1;
console.log(result);

  //OR different code
  var fs = require('fs');
  var result = fs.readFileSync(process.argv[2], 'utf8').split('\n').length - 1;
  console.log(result);
    
//STEP 4 - My first async I/O - learnyounode verify nodeSchool.js
var fs = require('fs');
var filename = process.argv[2];

fs.readFile(filename, 'utf8', function (err, data) {
var strFile = data.split('\n').length -1;
console.log(strFile);
});

//STEP 5 - Filtered ls - learnyounode verify nodeSchool.js
var fs = require('fs');
var path = require('path');

fs.readdir(process.argv[2], function(err, achv){
achv.forEach(function(achv){
    if(path.extname(achv) === '.' + process.argv[3]){
    console.log(achv);
}
});
});

// OR Diferrent code
var fs = require('fs');
var path = require('path');

fs.readdir(process.argv[2], function(err, achv){
    achv.filter(function(achv){ return path.extname(achv) === '.' + process.argv[3]; })
     .forEach(function(achv){ console.log(achv); });        
    
});


//STEP 6 - Make it modular - learnyounode verify nodeSchool.js