<script>
    const validation = {
        show: function(id, text) {
            document.getElementById(id).innerHTML = text
        },
        hidden: function(id) {
            document.getElementById(id).innerHTML = ''
        },
        hiddenAll: function() {
            const errorElement = document.querySelectorAll('.error');
            for (let i = 0; i < errorElement.length; ++i) {
                document.getElementById(errorElement[i].id).innerHTML = ''
            }
        }
    }

    function validateHidden() {
        const inputElement = document.querySelectorAll('input');
        for (let i = 0; i < inputElement.length; ++i) {
            inputElement[i].addEventListener('focus', function() {
                validation.hiddenAll();
            });
        }
    }
</script>
