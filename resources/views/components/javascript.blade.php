<!-- Include the script for generating password -->
<script>
    document.getElementById('generatePassword').addEventListener('click', function () {
        // Make an AJAX request to the Laravel route
        axios.get('{{ route('generate.password') }}')
            .then(function (response) {
                // Update the password input field
                document.getElementById('password').value = response.data.password;
            })
            .catch(function (error) {
                console.error('Error generating password: ', error);
            });
    });
</script>