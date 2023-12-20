function login(event) {
    event.preventDefault();

    // Get username and password from the form
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Perform a simple check (in a real application, use secure methods)
    if (username === "username" && password === "password") {
        alert("Login successful");
        // Redirect to a new page or perform other actions
    } else {
        alert("Login failed. Check your username and password.");
    }
}
