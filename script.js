let slideIndex = 1;

function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showInfo(info) {
    const lightbox = document.getElementById('lightbox');
    const content = document.getElementById('lightbox-content');
    const closeBtn = document.getElementById('close-btn');

    lightbox.style.display = 'flex';
    
    content.innerHTML = info;

    lightbox.onclick = function (event) {
        if (event.target === lightbox) {
            lightbox.style.display = 'none';
        }
    };

    closeBtn.onclick = function () {
        lightbox.style.display = 'none';
    };
}

document.addEventListener("DOMContentLoaded", function () {
    showSlides(slideIndex);
});

function toggleRegistrationForm() {
    var registrationForm = document.querySelector('.registration-container');
    registrationForm.style.display = registrationForm.style.display === 'none' ? 'block' : 'none';
}

function validateForm() {
    var newPassword = document.getElementById("new_password").value;
    var confirmNewPassword = document.getElementById("confirm_password").value;

    if (newPassword !== confirmNewPassword) {
        alert("Nieuwe wachtwoorden komen niet overeen.");
        return false;
    }

    return true;
}

function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;

    $.ajax({
        type: 'POST',
        url: 'google_signin.php',
        data: { id_token: id_token },
        success: function(response) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId());
            console.log('Name: ' + profile.getName());
            console.log('Email: ' + profile.getEmail());
        },
        error: function(error) {
            console.error(error);
        }
    });
}

let slideIndexx = 0;

function showSlidess() {
    let i;
    const slidess = document.getElementsByClassName("mySlides");
    
    for (i = 0; i < slidess.length; i++) {
        slidess[i].style.display = "none";
    }
    
    slideIndexx++;
    
    if (slideIndexx > slidess.length) {
        slideIndexx = 1;
    }
    
    slidess[slideIndexx - 1].style.display = "block";
    setTimeout(showSlidess, 4000); // Change slide every 3 seconds
}

showSlidess();

document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('scroll', function () {
    const productList = document.getElementById('productList');
    const productListRect = productList.getBoundingClientRect();

    // Trigger animation when the product list is in the viewport
    if (productListRect.top < window.innerHeight - 100) {
        productList.style.opacity = '1';
    }
});
});

function addToCart(productName, price) {
        // For simplicity, you can implement your shopping cart logic here
        alert(`Added ${productName} to the shopping cart. Price: $${price}`);
    }


    // JavaScript to trigger the fade-in animation when the user scrolls
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('scroll', function () {
            const productList = document.getElementById('productList');
            const productListRect = productList.getBoundingClientRect();

            // Trigger animation when the product list is in the viewport
            if (productListRect.top < window.innerHeight - 100) {
                productList.style.opacity = '1';
                productList.style.transform = 'translateX(0)';
            }
        });
    });

    // JavaScript function to add a product to the shopping cart
    function addToCart(productId) {
        // AJAX request to add the product to the cart (simulated in this example)
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.open('GET', 'add_to_cart.php?id=' + productId, true);
        xhr.send();
    }

    function removeFromCart(index) {
        // Send an AJAX request to remove the product from the session
        // You can use XMLHttpRequest or fetch API for this purpose
        // For simplicity, I'll use a simple confirmation and page reload
        if (confirm("Are you sure you want to remove this product?")) {
            window.location.href = 'remove_from_cart.php?index=' + index;
        }
    }