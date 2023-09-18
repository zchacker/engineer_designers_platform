<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all forms on the page
        const forms = document.querySelectorAll("form");

        // Add a submit event listener to each form
        forms.forEach(function(form) {
            form.addEventListener("submit", function(event) {
                // Get the submit button within the current form
                const submitButton = form.querySelector("button[type=submit]");
                const submitInput = form.querySelector("input[type=submit]");

                
                // Disable the submit button
                submitButton.disabled = true;
                submitInput.disabled = true;
                
                // Prevent the default form submission behavior
                //event.preventDefault();
            });
        });
    });
</script>
        
        <!-- end of body  -->
        </div>
    </body>

</html>