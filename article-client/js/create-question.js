const question = document.getElementById("question");
const answer = document.getElementById("answer");

let protocol = "http://";
let server = "localhost:8080"; // http://15.188.77.241
let url =
  protocol + server + "/articles/article-server/apis/v1/createQuestion.php";

async function create_question() {
  const form = new FormData();

  form.append("id", localStorage.getItem("id"));
  form.append("question", question.value);
  form.append("answer", answer.value);

  const response = await axios.post(url, form);

  console.log(response.data);
  if (response.data[0].message == "success") {
    window.location.href = "./home.html";
  } else {
    alert("Failed to create FAQ: " + response.data[0].message);
  }
}

function logout() {
  localStorage.removeItem("id");
  localStorage.removeItem("full_name");
  window.location.href = "./index.html";
}
