let quize=0;
let question=0;
$('#quize').on('click', () => {
    quize+=1;
    $('.form-quize').append ( `
        <div class="form col container p-4  my-4 card position-relative ${quize}quize" id='${quize}quize'>
            <h3 class="h3">
                Name Quize:
            </h3>
            <input class="form-name form-control w-75 my-3 " for="" name="${quize}quize" placeholder="Enter name quize" type="text ">

            <button type="button" class=" my-3 btn btn-outline-dark" onclick="appendQuestion('${quize}quize')">
                Create question
            </button>

            <button type="button" class="btn-close position-absolute m-2 end-0 top-0" aria-label="Закрыть"></button>
        </div>`);
    if(document.querySelectorAll('.form')){
        $('#submit').removeClass('visually-hidden');
    }
});
function appendQuestion(id) {
    question+=1
    $(`#${id}`).append (`
    <div class="form-question container card my-3 p-3  position-relative" id='${id+question}'>

        <div class="form-question-name col" id="answer">
            <h3 class="h3">
                Name question:
            </h3>
            <input class="question-name--input form-control w-75  my-3" for="form-control"  name="${id+question}" placeholder="Enter question" type="text">

        </div>

        <button type="button" class=" btn btn-outline-dark my-3 " onclick="appendAnsver('${id+question}');">
            Create answer
        </button>
        <button type="button" class="btn-close m-2 position-absolute end-0 top-0" aria-label="Закрыть"></button>
    </div>`);
};
function appendAnsver(id) {
    $(`#${id}`).append (`
    <div class="form-answer container py-3 col d-flex justify-content-end align-items-center">
        <input  class="form-answer--input form-control w-75 form-label my-3 me-0  name="${id}" placeholder="Enter answer" type="text">
        <input class="form-answer--radio mx-2" type="radio" name="${id}" id="flexRadioCheckedDisabled" >

        <button type="button" class="btn-close" aria-label="Закрыть"></button>
    </div> `);
};
$('body').on('click', '.btn-close', function(e) {
    $(this).closest('div').remove();
    if(!document.querySelector('.form')){
        $('#submit').addClass('visually-hidden');
    }
});
function Send(){
    let data = [];

    let quizzes = document.querySelectorAll('.form');
    for (quize of quizzes){
        let questions = quize.querySelectorAll('.form-question');
        let array_questions=[];
        for(question of questions){
            let answers = question.querySelectorAll('.form-answer');
            let array_answers=[];
            for (answer of answers){
                array_answers.push( {
                            value: answer.querySelector('.form-answer--input').value,
                            correct: answer.querySelector('.form-answer--radio').checked,
                        });

                }

            array_questions.push({
                name: question.querySelector('.question-name--input').value,
                answers: array_answers,
            });
        }
        data.push({
            name: quize.querySelector('.form-name').value,
            questions: array_questions,
        });
    }
    console.log(data);
}
