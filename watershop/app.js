var phone = document.querySelector('#phone');
var btnAjouter = document.querySelector('#btnAjouter');
//checking input length
phone.addEventListener("input", function(event) {
    if (event.target.value.length < 10) {
        btnAjouter.disabled = true;
        btnAjouter.classList.remove("btn-primary");
        btnAjouter.classList.add("btn-secondary");
    } else {
        phone.style.color = "black";
        btnAjouter.disabled = false;
        btnAjouter.classList.remove("btn-secondary");
        btnAjouter.classList.add("btn-primary");
    }
});
function colorinput(i)
{
	//useless function
    if(i.target.value.length <= 10){
        phone.style.color = "red";
    }
}
