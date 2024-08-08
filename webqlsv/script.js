document.addEventListener("DOMContentLoaded", function() {
    // Handle login form submission
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var username = document.getElementById("login-username").value;
        var password = document.getElementById("login-password").value;

        if ((username === "sv132" && password === "sv1234") || (username === "gv132" && password === "gv1234")) {
            localStorage.setItem("username", username);
            localStorage.setItem("role", username.startsWith("sv") ? "student" : "teacher");
            window.location.href = "posts.html";
        } else {
            alert("Invalid username or password!");
        }
    });

    // Handle signup form submission
    document.getElementById("signupForm").addEventListener("submit", function(event) {
        event.preventDefault();
        // Implementation for handling signup
        alert("Signup successful!");
    });

    // Load posts if on posts page
    if (document.getElementById("posts")) {
        loadPosts();
        if (localStorage.getItem("role") === "teacher") {
            document.getElementById("adminActions").style.display = "block";
        } else {
            document.getElementById("adminActions").style.display = "none";
        }
    }

    // Handle search
    document.getElementById("searchBtn").addEventListener("click", function() {
        var query = document.getElementById("search").value.toLowerCase();
        var posts = document.querySelectorAll(".post");
        posts.forEach(function(post) {
            if (post.textContent.toLowerCase().includes(query)) {
                post.style.display = "block";
            } else {
                post.style.display = "none";
            }
        });
    });
});

function loadPosts() {
    // Simulate loading posts from the database
    var posts = [
        { title: "Post 1", content: "This is the content of post 1" },
        { title: "Post 2", content: "This is the content of post 2" },
        { title: "Post 3", content: "This is the content of post 3" },
    ];
    var postsContainer = document.getElementById("posts");
    posts.forEach(function(post) {
        var postElement = document.createElement("div");
        postElement.className = "post";
        postElement.innerHTML = "<h2>" + post.title + "</h2><p>" + post.content + "</p>";
        postsContainer.appendChild(postElement);
    });
}
