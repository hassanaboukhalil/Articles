let questions;
let filtered_questions;
let FAQs_grid = document.getElementById("FAQs_grid");

async function get_questions() {
    const response = await axios.get(
        "http://localhost:8080/articles/article-server/apis/v1/getQuestions.php",
        // "http://15.188.77.241/article-server/apis/v1/login.php"
    );

    console.log(response.data)
    if (response.data.message == 'success') {
        questions = response.data.questions
        filtered_questions = [...questions];
        insert_FAQs(questions);
    } else {
        alert("failed to get FAQs: " + response.data[1].message);
    }
}



function insert_FAQs(questions){
    FAQs_grid.innerHTML = ''
    for(let i = 0 ; i < questions.length ; i++){
        const question_tag = document.createElement("p")
        const question = document.createTextNode(questions[i].question)
        question_tag.appendChild(question)
        // add css classes to the element
        question_tag.classList.add("h3", "text-secondary", "font-bold")

        const answer_tag = document.createElement("p")
        const answer = document.createTextNode(questions[i].answer)
        answer_tag.appendChild(answer)
        // add css classes to the element
        answer_tag.classList.add("body1", "text-white")

        const div_tag = document.createElement('div')
        div_tag.appendChild(question_tag)
        div_tag.appendChild(answer_tag)
        // add css classes to the element
        div_tag.classList.add("bg-primary", "FAQs-grid-item")

        FAQs_grid.appendChild(div_tag);
    }
}



function filter_questions(element){
    text = element.value.toLowerCase();
    filtered_questions = questions.filter((item) => item.question.toLowerCase().includes(text))
    insert_FAQs(filtered_questions)
}


function capitalize_first_letter(str){
    str = str[0].toUpperCase() + str.slice(1, str.length)
    return str;
}