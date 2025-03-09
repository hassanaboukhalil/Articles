const question = document.getElementById("question")
const answer = document.getElementById("answer")



async function create_question(){
    const form = new FormData();

    form.append("id", localStorage.getItem("id"));
    form.append("question", question.value);
    form.append("answer", answer.value);



    const response = await axios.post(
        "http://localhost:8080/articles/article-server/apis/v1/createQuestion.php",
        // "http://15.188.77.241/article-server/apis/v1/createQuestion.php",
        form
    );

    console.log(response.data)
    if (response.data[0].message == 'success') {
        window.location.href = "./home.html";
    } else {
        alert("Failed to create FAQ: " + response.data[0].message);
    }
}


function logout(){
    localStorage.removeItem("id");
    localStorage.removeItem("full_name");
    window.location.href = "./index.html";
}