    var leftElem = document.querySelector('#left input[name="number_from"]');
    leftElem.addEventListener('focus', function(){
        document.querySelector('#left > div.numbers').style.display = "block";
        document.querySelector('#right > div.numbers').style.display = "none";
    })

    var rightElem = document.querySelector('#right input[name="number_to"]');
    rightElem.addEventListener('focus', function(){
        document.querySelector('#right > div.numbers').style.display = "block";
        document.querySelector('#left > div.numbers').style.display = "none";
    })
    
/* number button - left*/
    var numbers = document.querySelectorAll('#left .numbers input');
    for (var i = 0; i < numbers.length; i++) {
           numbers[i].addEventListener('click', function(){
             number = this.value;
             console.log(number);
             var inputField = document.getElementById('number_from');
             var inputText = document.getElementById('number_from').value;
             console.log(inputText);
             inputField.value = inputText + number;
           })
       }   
/* number button - right*/
    var numbers = document.querySelectorAll('#right .numbers input');
    for (var i = 0; i < numbers.length; i++) {
           numbers[i].addEventListener('click', function(){
             number = this.value;
             var inputField = document.getElementById('number_to');
             var inputText = document.getElementById('number_to').value;
             inputField.value = inputText + number;
           })
       }

/* ajax query */
    var form = document.querySelector('.wrap form');
    form.addEventListener('submit', function(e){
        $.ajax({
            type: 'GET',
            url: 'php/calc.php',
            data: $(".wrap form").serialize(),
            dataType: 'text',
            success: function(data){
                if (!isNaN(data)) {
                    document.querySelector('.result').innerHTML = "Результат: " + data;
                    document.getElementById('number_from').value = data;
                    document.getElementById('number_to').value = '';
                }
            }
        })
        e.preventDefault();
    })