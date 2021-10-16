<?php include('header.php'); ?>
<div class="container">
        <div class="row">
            <div class="col-12 jumbotron my-5 bg-adp ">
                <h3>Send message</h3>
                <form method="post" name="google-sheet">
                    <input type="text" class="form-control my-3" name="Name" placeholder="your Name" required>
                    <input type="text" class="form-control my-3" name="Subject" placeholder="subject" required>
                    <input type="text" class="form-control my-3" name="Email" placeholder="email" required>
                    <textarea class="form-control my-3" name="Message" id="" cols="30" rows="10" placeholder="message type here.." required></textarea>
                    <input type="submit" class="btn btn-block btn-light my-3" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

 <script>
         const scriptURL = 'https://script.google.com/macros/s/AKfycbzEusN2p9fxmYnycV65ltTrfn7Yrtz8dPjyjCKQ5M4hQ5HD6Xo4GVPXL3ok06Wa9KSc/exec'
            const form = document.forms['google-sheet']
          
            form.addEventListener('submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                .then(response => alert("You have successfully submitted."))
                .catch(error => console.error('Error!', error.message))
            });
   
</script>
<?php include('footer.php'); ?>
