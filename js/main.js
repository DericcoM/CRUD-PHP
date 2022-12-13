
//Отображение выбранного изображения для загрузки
let inputs = document.querySelectorAll('.input__file');
Array.prototype.forEach.call(inputs, function (input) {
    let label = input.nextElementSibling,
        labelVal = label.querySelector('.input__file-button-text').innerText;

    input.addEventListener('change', function (e) {
        let countFiles = '';
        if (this.files && this.files.length >= 1)
            countFiles = this.files.length;

        if (countFiles)
            label.querySelector('.input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
        else
            label.querySelector('.input__file-button-text').innerText = labelVal;
    });
});

$(".btn_soc").click(function(){
    $(".input").toggleClass("active").focus;
    $(this).toggleClass("animate");
    $(".input").val("");
});

/* Личный кабинет */
/* nav bar */

function openPersonality(evt, navName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("personality__column__main");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("personality__column__nav__item");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(navName).style.display = "block";
    evt.currentTarget.className += " active";
}

/* комментарии */

let acc = document.getElementsByClassName("comments__btn");
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        console.log(1);
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
