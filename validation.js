function validateForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const feedback = document.getElementById('feedback').value.trim();
    const rating = document.getElementById('rating').value;

    if (name === '' || email === '' || feedback === '' || rating === '') {
        alert('All fields are required.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    if (rating < 1 || rating > 5) {
        alert('Rating must be between 1 and 5.');
        return false;
    }

    return true;
}

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(String(email).toLowerCase());
}
