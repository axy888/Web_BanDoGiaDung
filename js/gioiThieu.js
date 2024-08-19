// document.getElementById("dk").onclick = function() {
//     document.getElementById("dangky").style.display = "block";
// };
// document.getElementById("btnHuy").onclick=function(){
//     document.getElementById("dangky").style.display="none";
// }
// document.getElementById("dangKy_background").onclick=function(){
//     document.getElementById("dangky").style.display="none";
// }
// Tìm kiếm

// const inputBox = document.getElementById("search_input");
// const suggBox = document.getElementById("history_search");
// let suggestList =["a","b","c","aa"];



// inputBox.onkeyup = (e) =>{
//     let result = e.target.value;
//     let list =[];
//     if (result)
//     {
//         list = suggestList.filter((data)=>{
//             return data.toLocaleLowerCase().startsWith(e.target.value);
//         });
//         list = list.map((data)=>{
//             return "<li>"+data+"</li>";
//         });
//         let allList = suggBox.querySelectorAll("li");
//         for(let i=0;i<allList.length;i++)
//         {
//             allList[i].setAttribute("onclik","select(this)");
//         }
//     }else{
        
//     }
//     showResult(list);
// }
// function select(element){
//     let selectData = element.textContent;
//     console.log(selectData);
// }

// function showResult(list){
//     let listData;
//     if(!list.length)
//     {
//         result = inputBox.value;
//         listData="<li>"+ result +" <li> ";
//     }else{
//         listData = list.join(' ');
//     }
//     suggBox.innerHTML=listData
// }



