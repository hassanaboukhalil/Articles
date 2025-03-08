const email = document.getElementById("email");
const pass = document.getElementById("pass");



async function login() {
    const form = new FormData();

    form.append("email", email.value);
    form.append("pass", pass.value);


    const response = await axios.post(
        // "http://localhost:8080/articles/article-server/apis/v1/login.php",
        "http://15.188.77.241/article-server/apis/v1/login.php",
        form
    );

    console.log(response.data)
    if (response.data[0].message == 'success') {
        localStorage.setItem("id", response.data[0].user.id);
        localStorage.setItem("full_name", response.data[0].user.full_name);
        window.location.href = "./home.html";
    } else {
        alert("Login failed: " + response.data[0].message);
    }
}