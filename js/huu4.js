document.getElementById('xemCT_detailProduct').addEventListener('click',function(){
    var detail = document.getElementById('detail');
    detail.scrollIntoView({ behavior: 'smooth' });
})

var minus = document.getElementById('minus');
var plus = document.getElementById('plus');
var input = document.getElementById('input_minus-plus')

var kq = input.value

minus.addEventListener('click',function(){
    if(kq<=1){
        input.value = 1;
    }else{
        kq--;
        input.value = kq;
    }
})
plus.addEventListener('click',function(){
   kq++;
   input.value = kq;
})
input.addEventListener('input',function(){
    console.log(input.value = kq);
})